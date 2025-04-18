<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $table = 'admins'; // Optional if your table is already named 'admins'
    protected $primaryKey = 'adminId'; // ✅ Important since it's not 'id'

    public $timestamps = false; // ✅ Optional: set to true if you have timestamps

    protected $fillable = ['email', 'password'];

    protected $hidden = ['password'];
}
