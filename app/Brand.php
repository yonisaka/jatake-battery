<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use League\Fractal\Pagination\Cursor;

class Brand extends Model
{
    //
    protected $fillable = [
        'name','desc','link','img'
    ];

    public function pagination($page,$perPage)
    {
        $page = !empty($page)?$page:1;
        $perPage = !empty($perPage)?$perPage:10;
        $curr = ($page-1)*$perPage;
        if ($page > 1) {
            $data = $this->skip($curr)->paginate($perPage);
        } else {
            $data = $this->paginate($perPage);
        }
        return $data;
    }

}
