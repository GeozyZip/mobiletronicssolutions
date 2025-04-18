<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceModel extends Model
{
    use HasFactory;

    // If your table is named "admins" (non-standard primary key)
    protected $table = 'services';

    protected $primaryKey = 'serviceId';
    public $incrementing = true; // set to false if it's not auto-increment
    protected $keyType = 'int'; 
    protected $fillable = [
        'serviceName',
        'serviceImage'
    ];

    // If you don't have created_at and updated_at columns
    public $timestamps = false;
}