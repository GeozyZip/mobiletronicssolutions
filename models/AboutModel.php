<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutModel extends Model
{
    use HasFactory;

    protected $table = 'abouts';
    protected $primaryKey = 'aboutId';
    public $timestamps = false;

    protected $fillable = [
        'aboutImage',
        'aboutDesc',
    ];
}
