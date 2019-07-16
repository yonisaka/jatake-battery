<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;

class AdminController extends Controller
{
    //
    public function index()
    {
        $products = Products::get()->where('status',1);
        return view('admin',['products'=>$products]);
    }
    public function login()
    {
        return 'Login';
    }
}
