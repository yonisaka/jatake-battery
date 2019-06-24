<?php

namespace App\Observers;
use App\Products;

class ProductsOberver
{
    //

    public function creating(Products $product)
    {
        $product->img = json_encode($product->img);
    }

    /**
     * Handle the Products "retrieved" event.
     *
     * @param  \App\Products  $product
     * @return void
     */

    public function retrieved(Products $product)
    {
        $product->dimention = json_decode($product->dimention);
        $product->img = json_decode($product->img);
    }

}
