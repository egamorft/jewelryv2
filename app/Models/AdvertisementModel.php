<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdvertisementModel extends Model
{
    use HasFactory;
    protected $table = 'advertisement';
    protected $guarded = [];

    public static function createAdvertisement ($bodyData,$src)
    {
        $advertisement = new AdvertisementModel([
            'title' => $bodyData['title'],
            'link' =>$bodyData['link'],
            'src' =>$src,
        ]);
        $advertisement->save();
        return $advertisement;
    }

    public static function updateAdvertisement ($advertisement, $bodyData, $src)
    {
        $advertisement->title = $bodyData['title'];
        $advertisement->link = $bodyData['link'];
        $advertisement->src = $src??$advertisement->src;
        $advertisement->save();
        return $advertisement;
    }
}