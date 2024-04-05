<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoModel extends Model
{
    use HasFactory;
    protected $table = 'video';
    protected $guarded = [];

    public static function createVideo ($bodyData, $video, $display)
    {
        $video = new VideoModel([
            'title' => $bodyData['title'],
            'describe' =>$bodyData['describe'],
            'src' => $video,
            'link' => $bodyData['link'],
            'display' =>$display,
        ]);
        $video->save();
        return $video;
    }

    public static function updateVideo ($video, $bodyData, $src, $display)
    {
        $video->title = $bodyData['title'];
        $video->describe = $bodyData['describe'];
        $video->link = $bodyData['link'];
        $video->src = $src ?? $video->src;
        $video->display = $display;
        $video->save();
        return $video;
    }
}