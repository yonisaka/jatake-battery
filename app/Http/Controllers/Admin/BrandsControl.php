<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Brand;
use App\Library\Libs;

class BrandsControl extends Controller
{
    //
    public function __construct()
    {
        $this->brand = new Brand();
        $this->lib = new Libs();
        $this->middleware(function($req,$next){
            if(!empty(session('admin_token')))
            {
                $this->token = session('admin_token');
            }
            else
            {
                if(!$req->expectsJson())
                    return redirect(route('admin.login'));
                return $this->lib->jsonUnauth();
            }
            return $next($req);
        })->except(['show','index']);

        // secure spesific method
        $this->middleware(function($req,$next){
            if(!$req->expectsJson())
                return $this->lib->jsonUnauth();

            return $next($req);
        })->only(['store']);

    }

    public function index(Request $req)
    {
        $data = $req->all();
        $brand = function()
        {
            return $this->brand->paginate();
        };
        if($req->expectsJson())
        {
            try
            {
                return \Responder::success($brand())->respond();
            }
            catch(\Exception $e)
            {
                return \Responder::error("brand_create_fail","Fail to Create Brand")->data([$e])->respond();
            }
        }
        else
        {
            return view('admin.brands',['page'=>'Brands']);
        }
    }

    public function store(Request $req){
        try
        {
            $data = $req->all();
            $product = new Brand($data);
            $product->save();
            return \Responder::success($product)->respond(201);
        }
        catch(\Exception $e)
        {
            return \Responder::error("brand_create_fail","Fail to Create Brand")->data([$e])->respond();
        }
    }

    public function show(Request $req){
        try
        {
            return \Responder::success($product)->respond(201);
        }
        catch(\Exception $e)
        {
            return \Responder::error("brand_create_fail","Fail to Create Brand")->data([$e])->respond();
        }
    }
}
