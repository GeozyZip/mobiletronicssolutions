<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    use HasFactory;

    // If your table is named "admins" (non-standard primary key)
    protected $table = 'products';

    protected $primaryKey = 'productId';
    public $incrementing = true; // set to false if it's not auto-increment
    protected $keyType = 'int'; 
    protected $fillable = [
        'productName',
        'price',
        'productImage'
    ];

    // If you don't have created_at and updated_at columns
    public $timestamps = false;
}