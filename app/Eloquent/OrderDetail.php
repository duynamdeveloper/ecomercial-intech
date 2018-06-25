<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = 'order_details';

    public function order()
    {
        return $this->belongsTo('App\Eloquent\Order');
    }
    public function product()
    {
        return $this->belongsTo('App\Eloquent\Product');
    }
}
