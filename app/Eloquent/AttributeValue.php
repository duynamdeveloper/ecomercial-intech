<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class AttributeValue extends Model
{
    protected $table = 'attribute_value';
    
    public function product(){
        return $this->belongsTo('App\Eloquent\Product');
    }
    public function attribute()
    {
        return $this->belongsTo('App\Eloquent\Attribute');
    }
}
