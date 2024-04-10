<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductValueModel extends Model
{
    use HasFactory;
    protected $table = 'product_value';
    protected $guarded = [];
}