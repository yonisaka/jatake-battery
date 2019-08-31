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
        return view("index",$data);
    }

    public function search(Request $req)
    {
        $s = $req->query("s");
        $data['page'] = 'search';
        $data['s'] = $s;
        $data['products'] = Products::orderBy('id')->where('name','like','%'.$s.'%')->get();
        return view("index",$data);
    }
}
