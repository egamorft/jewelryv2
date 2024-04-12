<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FooterBlog extends Model
{
    use HasFactory;
    protected $table = 'footer_blogs';
    protected $fillable = [
        'title',
        'description',
        'category_id'
    ];

    public function categories()
    {
        return $this->belongsTo(FooterCategory::class, 'category_id');
    }
}
