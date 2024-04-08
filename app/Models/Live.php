<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Live extends Model
{
    use HasFactory;
    protected $table = 'lives';
    protected $fillable = [
        'view',
        'title',
        'target_url',
        'description',
        'thumbnail'
    ];
}
