<?php

namespace App\Http\Controllers\Api;

use App\products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductsApi extends Controller
{
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
        return $req->all();
        $data = $req->all();
        $product = new Products($data);
        $save = $product->save();
        if(!$save)
            return response()->json(['message'=>'Terjadi kesalahan','err'=>$save],400);
        else
            return response()->json(['data'=>$save],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(products $products)
    {
        return Products::findOrFail($id);
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit(products $products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, products $products)
    {
        //
        $data = $req->all();
        // return response()->json($data,400);
        $update = $product->update($data);
        if(!$update)
            return response()->json(['message'=>'Terjadi kesalahan','err'=>$update],400);
        else
            return response()->json(['data'=>$update],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(products $products)
    {
        //
        $delete = $product->delete();
        if(!$delete)
            return response()->json(['message'=>'Terjadi kesalahan','err'=>$update],400);
        else
            return response()->json(['data'=>$delete],200);
    }
}
