<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CollectionModel extends Model
{
    use HasFactory;
    protected $table = 'collection';
    protected $guarded = [];

    public static function createCollection ($bodyData, $image,$banner, $display)
    {
        $collection = new CollectionModel([
            'title' => $bodyData['title'],
            'describe' =>$bodyData['describe'],
            'src' => $image,
            'banner' => $banner,
            'index' =>$bodyData['index'],
            'display' =>$display,
        ]);
        $collection->save();
        return $collection;
    }

    public static function updateCollection ($collection, $bodyData, $src,$banner, $display)
    {
        $collection->title = $bodyData['title'];
        $collection->describe = $bodyData['describe'];
        $collection->banner = $banner ?? $collection->banner;
        $collection->src = $src ?? $collection->src;
        $collection->index = $bodyData['index'];
        $collection->display = $display;
        $collection->save();
        return $collection;
    }
}