<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductInterestModel extends Model
{
    use HasFactory;
    protected $table = 'product_interest';
    protected $fillable = [
        'user_id', 
        'product_id'
    ];
}