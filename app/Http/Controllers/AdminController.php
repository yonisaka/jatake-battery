<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ApiProducts as Products;
class AdminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(function($req,$next){
            if(!empty(session('admin_token')))
                $this->token = session('admin_token');
            else
                return redirect(route('login'));
            $this->products = new Products($this->token);
            return $next($req);
        })->except(['login']);
    }
    public function index()
    {
        $products = $this->products->getAll();
        return view('admin',['products'=>$products]);
    }

    public function login(Request $req)
    {
        return view('login');
    }

    public function logout()
    {
        session()->flush();
        return redirect(route('login'));
    }
}
