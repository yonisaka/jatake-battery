<?php

namespace App\Observers;
use App\Brand;

class BrandObserver
{
    //

    public function creating(Brand $brand)
    {
        // $product->dimention = json_encode($product->dimention);
        $brand->img = json_encode($brand->img);
        $brand->link = json_encode($brand->link);
        // $product->type = strtoupper($product->type);
    }

    public function updating(Brand $brand)
    {
        // $product->dimention = json_encode($product->dimention);
        $brand->img = json_encode($brand->img);
        $brand->link = json_encode($brand->link);
        // $product->type = strtoupper($product->type);
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
