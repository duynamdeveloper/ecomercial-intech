<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    protected $table = 'attribute';
    public function attribute_values(){
        return $this->hasMany('App\Eloquent\AttributeValue');
    }
}
