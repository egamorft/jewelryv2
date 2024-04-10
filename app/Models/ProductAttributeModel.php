<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAttributeModel extends Model
{
    use HasFactory;
    protected $table = 'product_attribute';
    protected $guarded = [];
}