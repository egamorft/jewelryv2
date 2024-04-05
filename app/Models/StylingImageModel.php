<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StylingImageModel extends Model
{
    use HasFactory;
    protected $table = 'styling_image';
    protected $guarded = [];

    public static function createStylingImage ($styling_id,$src)
    {
        $styling = new StylingImageModel([
            'styling_id' => $styling_id,
            'src' =>$src,
        ]);
        $styling->save();
        return $styling;
    }
}