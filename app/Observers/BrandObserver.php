<?php

namespace App\Observers;
use App\Brand;
class BrandObserver
{
    //

    public function creating(Brand $brand)
    {
        // $product->dimention = json_encode($product->dimention);
        if(!empty($brand->img))
        {
            $img = $brand->img;
            $img = array_filter($img,function($val){
                if(!empty($val))
                    return true;
                return false;
            });
            $brand->img = json_encode($img);
        }

        if(!empty($brand->link))
        {

            $link = $brand->link;
            $link = array_map(function($val){
                if(!empty($val))
                    return $val;
            },$link);
            $brand->link = json_encode($link);
        }
        // $product->type = strtoupper($product->type);
    }

    public function updating(Brand $brand)
    {
        // $product->dimention = json_encode($product->dimention);
        if(!empty($brand->img))
        {

            $img = $brand->img;
            $img = array_filter($img,function($val){
                if(!empty($val))
                    return true;
                return false;
            });
            $brand->img = json_encode($img);
        }

        if(!empty($brand->link))
        {
            $link = $brand->link;
            $link = array_map(function($val){
                if(!empty($val))
                    return $val;
            },$link);
            $brand->link = json_encode($link);
        }
    }

    /**
     * Handle the Products "retrieved" event.
     *
     * @param  \App\Brand  $brand
     * @return void
     */

    public function retrieved(Brand $brand)
    {
        // $product->dimention = json_decode($product->dimention);
        $brand->img = json_decode($brand->img);
        $brand->link = json_decode($brand->link);
        // $product->type = strtolower($product->type);
    }

}
