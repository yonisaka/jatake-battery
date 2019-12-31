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

    public function pagination($page,$perPage,$search="")
    {
        $page = !empty($page)?$page:1;
        $perPage = !empty($perPage)?$perPage:10;
        $search = !empty($perPage)?$search:"";
        $curr = ($page-1)*$perPage;
        if ($page > 1) {
            $data = $this->like('name',$search)->likeOr('desc',$search)->skip($curr)->paginate($perPage);
        } else {
            $data = $this->like('name',$search)->likeOr('desc',$search)->paginate($perPage);
        }
        return $data;
    }

    public  function scopeLike($query, $field, $value){
        return $query->where($field, 'LIKE', "%$value%");
    }

    public  function scopeLikeOr($query, $field, $value){
        return $query->whereOr($field, 'LIKE', "%$value%");
    }
}
