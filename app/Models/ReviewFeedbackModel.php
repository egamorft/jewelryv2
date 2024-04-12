<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewFeedbackModel extends Model
{
    use HasFactory;
    protected $table = 'review_feedback';
    protected $guarded = [];
}