<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StylingProductModel extends Model
{
    use HasFactory;
    protected $table = 'styling_product';
    protected $guarded = [];

    public static function createStylingProduct($styling_id,$product_id)
    {
        $styling = new StylingProductModel([
            'styling_id' => $styling_id,
            'product_id' =>$product_id,
        ]);
        $styling->save();
        return $styling;
    }
}