<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Products;

class Home extends Controller
{
    //
    public function index()
    {

        $products = new Products();
        dd($products->first());
        return view("index");
    }

}
