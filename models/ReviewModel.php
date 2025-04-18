<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewModel extends Model
{
    use HasFactory;

    protected $table = 'reviews';
    protected $primaryKey = 'reviewId';
    
    protected $fillable = [
        'reviewImage',
        'reviewDesc'
    ];

    protected $casts = [
        'reviewDesc' => 'string',
    ];

    public $timestamps = false;
}