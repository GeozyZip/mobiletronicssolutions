<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductModel;

class PublicController extends Controller
{
    public function index()
    {
        return view('home2');
    }
}