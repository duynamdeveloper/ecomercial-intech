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
    public function related_products()
    {
        return $this->belongsToMany('App\Eloquent\Product', 'related_products', 'product_id', 'related_product_id');
    }
    public function attribute_values()
    {
        return $this->hasMany('App\Eloquent\AttributeValue');
    }
    public function attributes()
    {
        return $this->hasManyThrough('App\Eloquent\Attribute','App\Eloquent\AttributeValue');
    }
}
