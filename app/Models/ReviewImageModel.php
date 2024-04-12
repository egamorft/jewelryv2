<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewImageModel extends Model
{
    use HasFactory;
    protected $table = 'review_image';
    protected $guarded = [];
}