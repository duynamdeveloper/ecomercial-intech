<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function category()
    {
        return $this->belongsTo('App\Eloquent\Category');
    }
    public function manufacture()
    {
        return $this->belongsTo('App\Eloquent\Manufacture');
    }
    public function country()
    {
        return $this->belongsTo('App\Eloquent\Country');
    }
}
