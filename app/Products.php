<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use \Okipa\LaravelModelJsonStorage\ModelJsonStorage;
    //
    protected $fillable = [
        'code','name',
        'merk','description',
        'capacity','dimention',
        'type','img',
        'price','status'
    ];
}
