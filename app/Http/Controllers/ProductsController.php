<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ApiProducts as Products;

class ProductsController extends Controller
{
    //

    public function __construct()
    {
        $this->products = new Products();
        $this->middleware(function($req,$next){
            if(!empty(session('admin_token')))
            {
                $this->token = session('admin_token');
                $this->products = new Products(['token'=>$this->token,]);
            }
            else
            {
                if($req->expectsJson())
                    return response()->json(['message'=>'Unauthorized',],403);
                return redirect(route('admin.login'));
            }
            return $next($req);
        })->except(['show','index']);
    }

    public function index()
    {
        abort(404);
    }

    public function show(Request $req, $id)
    {
        $resp = $this->products->getProductsById($id);
        if($req->expectsJson())
        {
            if(empty($resp->data))
                return response()->json(['message'=>'Terjadi kesalahan','err'=>$resp],404);
            return response()->json($resp,200);
        }

        if(empty($resp->data))
            abort(404);
        $data['page'] = 'detail';
        $data['recomends'] = $this->products->getProductsRecomend($resp->data->id)->data;
        // dd($data);
        $data['product']=$resp->data;
        return view('detail',$data);
    }

    public function store(Request $req){
        $data = $req->all();
        if($req->expectsJson())
        {
            $resp = $this->products->createProduct($data);
            if(empty($resp->status))
                return response()->json(['message'=>'Terjadi kesalahan','err'=>$resp],400);
            return response()->json($resp,200);
        }
    }

    public function update(Request $req, $id)
    {
        if($req->expectsJson())
        {
            $data = $req->all();
            $resp = $this->products->updateProduct($id,$data);
            if(empty($resp->data))
                return response()->json(['message'=>'Terjadi kesalahan','err'=>$resp],400);
            return response()->json($resp,200);
        }
    }

    public function destroy(Request $req,$id)
    {
        $resp = $this->products->deleteProduct($id);
        if($req->expectsJson())
        {
            if(empty($resp->status))
                return response()->json(['message'=>'Terjadi kesalahan','err'=>$resp],400);
            return response()->json($resp,200);
        }
    }
}
