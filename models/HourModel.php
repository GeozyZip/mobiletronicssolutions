<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HourModel extends Model
{
    use HasFactory;

    protected $table = 'hours';
    protected $primaryKey = 'hourID';
    public $timestamps = false;

    protected $fillable = [
        'hourDay',
        'opHour',
        'noTel',
        'email',
    ];
}
