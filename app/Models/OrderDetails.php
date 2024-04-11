<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    use HasFactory;
    protected $table = 'order_details';
    protected $fillable = [
        'order_id',
        'product_id',
        'product_name',
        'quantity',
        'price'
    ];

    public function order()
    {
        return $this->belongsTo(Orders::class, 'order_id');
    }

    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}