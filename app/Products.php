<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Okipa\LaravelModelJsonStorage\ModelJsonStorage;

class Products extends Model
{
    // use ModelJsonStorage;

    protected $fillable = [
        'short','name',
        'brand','deskripsi',
        'link',
        'type','img',
        'qty',
        'price','status'
    ];

    public function scopeDetail($q,$id)
    {
        return $q->where('id',$id)->orWhere('short',$id);
    }
}
