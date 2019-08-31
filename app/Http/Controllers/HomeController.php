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
        $data['page'] = 'home';
        return view("index",$data);
    }

    public function motor()
    {
        $data['page'] = 'motor';
        $data['products'] = Products::orderBy('id')->where('type','motor')->get();
        return view("motor",$data);
    }
}
