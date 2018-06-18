<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public function manufactures()
    {
        return $this->hasMany('App\Eloquent\Manufacture');
    }
}
