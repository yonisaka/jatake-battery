<?php

namespace App\Observers;
use App\Products;

class ProductsOberver
{
    //

    public function creating(Products $product)
    {
        // $product->dimention = json_encode($product->dimention);
        $product->img = json_encode($product->img);
        $product->link = json_encode($product->link);
        $product->type = strtoupper($product->type);
    }

    public function updating(Products $product)
    {
        // $product->dimention = json_encode($product->dimention);
        $product->img = json_encode($product->img);
        $product->link = json_encode($product->link);
        $product->type = strtoupper($product->type);
    }

    /**
     * Handle the Products "retrieved" event.
     *
     * @param  \App\Products  $product
     * @return void
     */

    public function retrieved(Products $product)
    {
        // $product->dimention = json_decode($product->dimention);
        $product->img = json_decode($product->img);
        $product->link = json_decode($product->link);
        $product->type = strtolower($product->type);
    }

}
