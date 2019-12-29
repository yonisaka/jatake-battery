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
        })->only(['store,data']);

    }

    public function index(Request $req)
    {
        return view('admin.brands',['page'=>'Brands']);
    }

    public function data(Request $req)
    {
        $param = arr2obj($req->all());
        $brand = function() use ($param)
        {
            return $this->brand->pagination((empty($param->page))?null:$param->page,(empty($param->per_page))?null:$param->per_page);
        };
            try
            {
                return \Responder::success($brand())->with('draw',$param->draw)->respond();
            }
            catch(\Exception $e)
            {
                return \Responder::error("brand_get_fail","Fail to Get Brand")->data([$e->__toString()])->respond();
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
