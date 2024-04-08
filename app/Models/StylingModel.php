<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StylingModel extends Model
{
    use HasFactory;
    protected $table = 'styling';
    protected $guarded = [];

    public static function createStyling ($bodyData,$display)
    {
        $styling = new StylingModel([
            'title' => $bodyData['title'],
            'describe' =>$bodyData['describe'],
            'content' =>$bodyData['content'],
            'display' =>$display,
        ]);
        $styling->save();
        return $styling;
    }

    public static function updateStyling ($styling, $bodyData, $display)
    {
        $styling->title = $bodyData['title'];
        $styling->describe = $bodyData['describe'];
        $styling->content = $bodyData['content'];
        $styling->display = $display;
        $styling->save();
        return $styling;
    }
}