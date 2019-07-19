<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use PHPUnit\Runner\Exception;

class ProductsController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware(function($req,$next){
            // echo "should login";
            return $next($req);
        })->except(['show','index']);
    }

    public function index()
    {
        abort(404);
    }

    public function show($id)
    {
        $data = Products::detail($id)->firstOrFail();
        if(empty($data))
            abort(404);

        return view('detail',['product'=>$data]);
    }

    public function store(Request $req){
        $data = $req->all();
        $product = new Products($data);
        $save = $product->save();
        if(!$save)
            return response()->json(['message'=>'Terjadi kesalahan','err'=>$save],400);
        else
            return response()->json(['data'=>$save],200);
    }

    public function update(Request $req, Products $product)
    {
        $data = $req->all();
        // return response()->json($data,400);
        $update = $product->update($data);
        if(!$update)
            return response()->json(['message'=>'Terjadi kesalahan','err'=>$update],400);
        else
            return response()->json(['data'=>$update],200);
    }

    public function destroy(Products $product)
    {
        $delete = $product->delete();
        if(!$delete)
            return response()->json(['message'=>'Terjadi kesalahan','err'=>$update],400);
        else
            return response()->json(['data'=>$delete],200);
    }

    public function json(Request $req, $func,$id=null)
    {
        $res = $this->$func($id);
        return response()->json(['data'=>$res],200);
    }

    private function getAll(){
        return Products::all();
    }

    private function get($id){
        return Products::findOrFail($id);
    }
}
