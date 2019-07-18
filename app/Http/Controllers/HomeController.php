<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Products;

class HomeController extends Controller
{
    //
    public function index()
    {
        $data['products'] = Products::orderBy('id')->get();
        return view("index",$data);
    }

}
