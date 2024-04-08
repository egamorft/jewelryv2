<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdvertisementProductModel extends Model
{
    use HasFactory;
    protected $table = 'advertisement_product';
    protected $guarded = [];

    public static function createAdvertisementProduct ($advertisement_id,$product_id)
    {
        $advertisement_product = new AdvertisementProductModel([
            'advertisement_id' => $advertisement_id,
            'product_id' =>$product_id
        ]);
        $advertisement_product->save();
        return $advertisement_product;
    }

}