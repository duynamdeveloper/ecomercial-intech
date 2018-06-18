<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Manufacture extends Model
{
    public function country()
    {
        return $this->belongsTo('App\Eloquent\Country');
    }
}
