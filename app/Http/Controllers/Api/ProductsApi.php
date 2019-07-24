<?php

namespace App\Http\Controllers\Api;

use App\products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductsApi extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api')->except(['index','show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Products::all();
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        //

        try{
            $data = $req->all();
            $product = new Products($data);
            $save = $product->save();
            return response()->json(['data'=>$save,'status'=>true],200);
        }
        catch(\Exception $e)
        {
            return errApi($e);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(Request $req, $product)
    {
        try{
            $product = Products::detail($product)->firstOrFail();
            return response()->json(['data'=>$product,'status'=>true],200);
        }
        catch(\Exception $e)
        {
            return errApi($e);
        }
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, products $product)
    {
        //
        try{
            $data = $req->all();
            $update = $product->update($data);
            return response()->json(['data'=>$update,'status'=>true],200);
        }
        catch(\Exception $e)
        {
            return errApi($e);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(products $product)
    {
        //
        try{
            $delete = $product->delete();
            return response()->json(['status'=>$delete],200);
        }
        catch(\Exception $e)
        {
            return errApi($e);
        }
    }
}
