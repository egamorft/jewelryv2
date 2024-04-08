<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BannerModel extends Model
{
    use HasFactory;
    protected $table = 'banner';
    protected $guarded = [];

    public static function createBanner ($bodyData, $image, $display)
    {
        $banner = new BannerModel([
            'title' => $bodyData['title'],
            'describe' =>$bodyData['describe'],
            'src' => $image,
            'link' => $bodyData['link'],
            'index' =>$bodyData['index']??0,
            'display' =>$display,
        ]);
        $banner->save();
        return $banner;
    }

    public static function updateBanner ($banner, $bodyData, $src, $display)
    {
        $banner->title = $bodyData['title'];
        $banner->describe = $bodyData['describe'];
        $banner->link = $bodyData['link'];
        $banner->src = $src ?? $banner->src;
        $banner->index = $bodyData['index']??0;
        $banner->display = $display;
        $banner->save();
        return $banner;
    }
}