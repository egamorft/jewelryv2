<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\AdvertisementModel;
use App\Models\AdvertisementProductModel;
use App\Models\AlbumModel;
use App\Models\BannerModel;
use App\Models\Category;
use App\Models\CollectionModel;
use App\Models\CollectionProductModel;
use App\Models\FooterBlog;
use App\Models\PostsModel;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductInterestModel;
use App\Models\ReviewFeedbackModel;
use App\Models\Searches;
use App\Models\ReviewImageModel;
use App\Models\ReviewModel;
use App\Models\StylingImageModel;
use App\Models\StylingModel;
use App\Models\StylingProductModel;
use App\Models\VideoModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function home()
    {
        $banner = BannerModel::where('display', 1)->orderBy('index', 'asc')->limit(9)->get();
        $video = VideoModel::where('display', 1)->orderBy('created_at', 'desc')->get();
        $styling = StylingModel::where('display', 1)->orderBy('created_at', 'desc')->limit(10)->get();
        foreach ($styling as $item_styling) {
            $item_styling->src = StylingImageModel::where('styling_id', $item_styling->id)->first()->src;
        }
        $advertisement = AdvertisementModel::orderBy('created_at', 'desc')->get();
        foreach ($advertisement as $val) {
            $val->product = AdvertisementProductModel::where('advertisement_id', $val->id)->orderBy('created_at', 'desc')->take(2)->get();
            foreach ($val->product as $item_product) {
                $item_product->info = Product::find($item_product->product_id);
            }
        }
        $collection = CollectionModel::where('display', 1)->orderBy('index', 'asc')->take(2)->get();
        $album = AlbumModel::orderBy('created_at', 'desc')->get();
        //Top 3 category
        $topCategories = Category::orderBy('popular', 'desc')->take(3)->get();
        //Product
        $products = Product::whereHas('categories', function ($query) use ($topCategories) {
            $query->whereIn('category_id', $topCategories->pluck('id'));
        })->get();
        // Retrieve products from the top 3 categories and group them by category
        $productsByCategory = [];
        foreach ($topCategories as $category) {
            $products = Product::where('published', 1)->whereHas('categories', function ($query) use ($category) {
                $query->where('category_id', $category->id);
            })->take(4)->get();
            foreach ($products as $item) {
                $product_interest = ProductInterestModel::where('product_id', $item->id)->first();
                $item->interest = $product_interest ? 1 : 0;
            }
            $productsByCategory[$category->name] = $products;
        }
        $post_brand = PostsModel::where('type',2)->first();

        return view('user.home.index', compact('banner', 'video', 'topCategories', 'productsByCategory', 'styling', 'advertisement',
         'album', 'collection','post_brand'));
    }

    public function detailCollection(Request $request,$id)
    {
        $data_collection = CollectionModel::where('display', 1)->orderBy('index', 'asc')->get();
        $collection = CollectionModel::find($id);
        $sortBy = $request->input('sort_by');

        $collection_product = DB::table('collection_product')
        ->select('collection_product.*', 'products.price')
        ->join('products', 'collection_product.product_id', '=', 'products.id')
        ->where('collection_id', $id);
        switch ($sortBy) {
            case 'latest':
                $collection_product->orderByDesc('collection_product.created_at');
                break;
            case 'low_to_high':
                $collection_product->orderBy('products.price');
                break;
            case 'high_to_low':
                $collection_product->orderByDesc('products.price');
                break;
            default:
                $collection_product->orderByDesc('collection_product.created_at');
                break;
        }
        $collection_product = $collection_product->paginate(32);
        foreach ($collection_product as $item) {
            $item->info = Product::find($item->product_id);
            $product_interest = ProductInterestModel::where('product_id', $item->product_id)->first();
            $item->interest = $product_interest ? 1 : 0;
        }
        return view('user.collection.index', compact('collection', 'data_collection', 'collection_product'));
    }

    public function detailProduct($id)
    {
        $product = Product::find($id);
        $product->interest = ProductInterestModel::where('product_id',$id)->first()?1:0;
        $category = ProductCategory::where('product_id',$id)->pluck('category_id');
        $arr_id = ProductCategory::whereIn('category_id',$category)->pluck('product_id');
        $related_products = Product::whereIn('id',$arr_id)->where('published',1)->take(8)->get();
        $star = $this->starReview($product);
        $star_five = ReviewModel::where('product_id', $product->id)->where('star', 5)->count();
        $star_four = ReviewModel::where('product_id', $product->id)->where('star', 4)->count();
        $star_three = ReviewModel::where('product_id', $product->id)->where('star', 3)->count();
        $star_two = ReviewModel::where('product_id', $product->id)->where('star', 2)->count();
        $star_one = ReviewModel::where('product_id', $product->id)->where('star', 1)->count();
        $percent_5 = 0;
        $percent_4 = 0;
        $percent_3 = 0;
        $percent_2 = 0;
        $percent_1 = 0;
        if ($star_five > 0){
            $percent_5 = round(($star_five / count($star)) * 100,0);
        }
        if ($star_four > 0){
            $percent_4 = round(($star_four / count($star)) * 100,0);
        }
        if ($star_three > 0){
            $percent_3 = round(($star_three / count($star)) * 100,0);
        }
        if ($star_two > 0){
            $percent_2 = round(($star_two / count($star)) * 100,0);
        }
        if ($star_one > 0){
            $percent_1 = round(($star_one / count($star)) * 100,0);
        }
        $feedback = ReviewFeedbackModel::all();
        return view('user.product.index',compact('product','related_products','star_five','star_four',
    'star_three','star_two','star_one','percent_5','percent_4','percent_3','percent_2','percent_1','feedback'));
    }

    public function starReview($product)
    {
        $product->star = 0;
        $star = ReviewModel::where('product_id', $product->id)->orderBy('created_at','desc')->get();
        if (!$star->isEmpty()) {
            $total_score =  ReviewModel::where('product_id', $product->id)->sum('star');
            $total_votes = count($star);
            $product->star = round($total_score/$total_votes, 1);
        }
        return $star;
    }

    public function saveReview(Request $request)
    {
        $review = new ReviewModel([
            'product_id'=>$request->product_id,
            'user_name'=>$request->name,
            'content'=>$request->content,
            'star'=>$request->star,
            'type_age'=>$request->type_age,
        ]);
        $review->save();
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            foreach ($file as $value) {
                $image_name = 'upload/album/' . Str::random(40);
                $ext = strtolower($value->getClientOriginalExtension());
                $image_full_name = $image_name . '.' . $ext;
                $path = 'upload/album';
                $value->move($path, $image_full_name);
                $review_image = new ReviewImageModel([
                    'review_id' =>$review->id,
                    'src' =>$image_full_name,
                ]);
                $review_image->save();
            }
        }
        toastr()->success('Successful assessment');
        return back();
    }

    public function saveReviewFeedback(Request $request)
    {
        $review = ReviewModel::find($request->review_id);
        $feedback = new ReviewFeedbackModel([
            'review_id'=>$review->id,
            'name'=>$request->name,
            'content'=>$request->content,
        ]);
        $feedback->save();
       
        toastr()->success('Successful feedback');
        return back();
    }

    public function getReview(Request $request)
    { 
        $review = ReviewModel::query();
        $review = $review->where('product_id',$request->product_id);
        if($request->keyword){
            $review = $review->where('content','like','%'.$request->keyword.'%');
        }
        if($request->star){
            $review = $review->where('star',$request->star);
        }
        if($request->age){
            $review = $review->where('type_age',$request->age);
        }
        $review = $review->orderBy('created_at','desc')->paginate(10);
        foreach($review as $item){
            $item->image = ReviewImageModel::where('review_id',$item->id)->get();
            $item->feedback = ReviewFeedbackModel::where('review_id',$item->id)->get();
        }
        return response()->json(['error' => 0, 'data' => $review]);
    }

    public function searchProduct(Request $request)
    {
        $q = $request->query('q');
        $orderBy = $request->query('orderBy');
        $category = $request->query('category');
        $minPrice = doubleval($request->query('minPrice'));
        $maxPrice = doubleval($request->query('maxPrice'));

        $query = Product::query();

        if ($q) {
            //Store hot search
            Searches::updateOrCreate(
                ['query' => $q],
                ['count' => DB::raw('count + 1')]
            );
            $query->where('name', 'like', '%' . $q . '%');
        }

        if ($category && $category != 'all') {
            $query->whereHas('categories', function ($query) use ($category) {
                $query->where('categories.id', $category);
            });
        }

        if ($orderBy) {
            switch ($orderBy) {
                case 'latest':
                    $query->orderBy('id', 'desc');
                    break;
                case 'oldest':
                    $query->orderBy('id', 'asc');
                    break;
                case 'lowPrice':
                    $query->orderBy('price', 'asc');
                    break;
                case 'highPrice':
                    $query->orderBy('price', 'desc');
                    break;
            }
        } else {
            $query->orderBy('id', 'desc');
        }

        if (is_numeric($minPrice) && is_numeric($maxPrice) && $maxPrice > 0) {
            $query->whereBetween('price', [$minPrice, $maxPrice]);
        }

        $products = $query->paginate(8);
        foreach($products as $val){
            $product_interest = ProductInterestModel::where('product_id', $val->id)->first();
            $val->interest = $product_interest ? 1 : 0;
        }

        // Append filter
        $products->appends(['q' => $q, 'orderBy' => $orderBy, 'category' => $category, 'minPrice' => $minPrice, 'maxPrice' => $maxPrice]);

        $topSearches = Searches::orderBy('count', 'desc')->take(4)->get();

        $listCategory = Category::orderBy('popular', 'desc')->take(5)->get();

        return view('user.product.search')->with(compact('products', 'listCategory', 'topSearches'));
    }

    public function detailBlog($id)
    {   
        $blog = FooterBlog::where('category_id',$id)->first();
        
        return view('user.blog.index',compact('blog'));
    }

    public function detailPost($id)
    {   
        $post = PostsModel::find($id);
        
        return view('user.blog.post',compact('post'));
    }
}