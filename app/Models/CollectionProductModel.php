<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CollectionProductModel extends Model
{
    use HasFactory;
    protected $table = 'collection_product';
    protected $guarded = [];

    public static function createCollectionProduct ($collection_id,$product_id)
    {
        $collection_product = new CollectionProductModel([
            'collection_id' => $collection_id,
            'product_id' =>$product_id
        ]);
        $collection_product->save();
        return $collection_product;
    }
}