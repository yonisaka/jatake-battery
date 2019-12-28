<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Products;

class HomeController extends Controller
{
    //
    public function index()
    {
        $limit = 8;
        $data['products'] = Products::orderBy('id')->limit($limit)->get();
        $data['page'] = 'home';
        return view("index",$data);
    }

    public function motor()
    {
        $data['page'] = 'motor';
        $limit = 12;
        $data['products'] = Products::orderBy('id')->where('type','motor')->limit($limit)->get();
        return view("result",$data);
    }
    public function mobil()
    {
        $data['page'] = 'mobil';
        $limit = 12;
        $data['products'] = Products::orderBy('id')->where('type','mobil')->limit($limit)->get();
        return view("result",$data);
    }

    public function search(Request $req)
    {
        $s = $req->query("s");
        $data['page'] = 'search';
        $data['s'] = $s;
        $data['products'] = Products::orderBy('id')->where('name','like','%'.$s.'%')->get();
        return view("result",$data);
    }
}
