<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Okipa\LaravelModelJsonStorage\ModelJsonStorage;

class Products extends Model
{
    // use ModelJsonStorage;

    protected $fillable = [
        'code','name',
        'merk','description',
        'capacity','dimention',
        'type','img',
        'price','status'
    ];

    public function scopeDetail($q,$id)
    {
        return $q->where('id',$id)->orWhere('code',$id);
    }
}
