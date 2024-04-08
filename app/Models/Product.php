<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'products';
    protected $fillable = [
        'name',
        'photos',
        'thumbnail_img',
        'price',
        'current_stock',
        'min_qty',
        'discount',
        'discount_type',
        'rating',
        'installment',
        'spec_n_details',
        'delivery_n_notice',
        'exchange',
        'published'
    ];

    // Relationship with ProductCategory model
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_category', 'product_id', 'category_id');
    }
}
