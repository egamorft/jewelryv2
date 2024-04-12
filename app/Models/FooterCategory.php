<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FooterCategory extends Model
{
    use HasFactory;
    protected $table = 'footer_categories';
    protected $fillable = [
        'name',
        'slug',
        'parent_id'
    ];

    public function children()
    {
        return $this->hasMany(FooterCategory::class, 'parent_id');
    }
}
