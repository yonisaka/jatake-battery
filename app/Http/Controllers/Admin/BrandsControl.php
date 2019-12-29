<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Flugg\Responder\Facades\Responder;
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
            if(!$req->expectsJson())
                return Responder::error("unauthorized","unauthorized")->respond(401);
            if(!empty(session('admin_token')))
            {
                $this->token = session('admin_token');
            }
            else
            {
                return redirect(route('admin.login'));
            }
            return $next($req);
        })->except(['show','index']);
    }

    public function index()
    {
        abort(404);
    }

    public function store(Request $req){
        try
        {
            $data = $req->all();
            $product = new Brand($data);
            $product->save();
            return Responder::success($product)->respond(201);
        }
        catch(Exception $e)
        {
            Responder::error("product_create_fail","Fail to Create Product")->data($e)->respond();
        }
    }

    public function show(Request $req){
        $data = $req->all();
        if($req->expectsJson())
        {
            return $this->lib->model(function() use ($req,&$data,&$model){
                return ['data'];
            });
        }
    }
}
