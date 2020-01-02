<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\Brand;
use App\Library\Libs;

class HomeController extends Controller
{
    //
    public function __construct(Request $req)
    {
        $this->products = new Product();
        $this->brand = new Brand();
        $this->lib = new Libs();

    }
    public function index(Request $req)
    {
        $param = [];
        $param = arr2obj($req->all());
        $brand = function() use ($param)
        {
            return $this->brand->pagination(@$param->page,@$param->per_page,@$param->search);
        };
        try
        {
            $data['brands'] = $brand();
            $data['page'] = 'home';
            return view("index",$data);
            // return \Responder::success($product())->with('draw',empty($param->draw)?null:$param->draw)->respond();
        }
        catch(\Exception $e)
        {
            throw $e;
            // return \Responder::error("product_get_fail","Fail to Get Product")->data([$e->__toString()])->respond();
        }

    }

    public function motor()
    {
        $data['page'] = 'motor';
        $limit = 12;
        $data['products'] = Product::orderBy('id')->where('type','motor')->limit($limit)->get();
        return view("result",$data);
    }
    public function mobil()
    {
        $data['page'] = 'mobil';
        $limit = 12;
        $data['products'] = Product::orderBy('id')->where('type','mobil')->limit($limit)->get();
        return view("result",$data);
    }

    public function search(Request $req)
    {
        $s = $req->query("s");
        $data['page'] = 'search';
        $data['s'] = $s;
        $data['products'] = Product::orderBy('id')->where('name','like','%'.$s.'%')->get();
        return view("result",$data);
    }
}
