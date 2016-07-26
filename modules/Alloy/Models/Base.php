<?php

namespace Alloy\Models;

use GuzzleHttp\Psr7\Uri;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class Base extends Model {

    public function scopeGetList($query, $sort, $keyword) {
        //---------- only keyword ----------
        if (!empty($keyword['fields']) && !empty($keyword['value'])) {
            foreach ($keyword['fields'] as $key => $field) {
                if (!$key) {
                    $query->where($field, 'like', '%' . $keyword['value'] . '%');
                }

                $query->orWhere($field, 'like', '%' . $keyword['value'] . '%');
            }
        }

        if (!empty($sort['by']) && !empty($sort['is'])) {
            $query->orderBy($sort['by'], $sort['is']);
        }

        $query->orderBy('created_at', 'desc');

        return $query;
    }

    public function getImage($folder,$filename,$w,$h,$fit='crop'){
    	if($filename != null){
		    $images = Url::to('/img/'.$folder.'/'.$filename.'?w='.$w.'&h='.$h.'&fit='.$fit);
	    }else{
		    $images = Url::to('/img/no-thumb.jpg?w='.$w.'&h='.$h.'&fit='.$fit);
	    }

        return $images;
    }

}
