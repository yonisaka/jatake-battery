<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;

class ProductsController extends Controller
{
    //
    public function index()
    {
        abort(404);
    }

    public function detail($code)
    {
        $data = Products::detail($code)->first();
        if(empty($data))
            abort(404);
        return $data;
    }

}
