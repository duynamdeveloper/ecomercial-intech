<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;
use App\Eloquent\Payment;
use App\Eloquent\Shipment;
use App\Eloquent\OrderDetail;

class Order extends Model
{
    protected $appends = ['label_status','payment_status','shipment_status'];

    public function payments()
    {
        return $this->hasMany('App\Eloquent\Payment');
    }
    public function shipments()
    {
        return $this->hasMany('App\Eloquent\Shipment');
    }
    public function orderDetails()
    {
        return $this->hasMany('App\Eloquent\OrderDetail');
    }
    public function getLabelStatusAttribute()
    {
        switch($this->status){
            case Config::get('constants.order.status.canceled'):
                return '<label class="badge badge-danger">Đã hủy</label>';
            case Config::get('constants.order.status.pending'):
                return '<label class="badge badge-warning">Đang chờ</label>';
            case Config::get('constant.order.status.processing'):
                return '<label class="badge badge-info">Đang xử lý</label>';
            case Config::get('constant.order.status.completed'):
                return '<label class="badge badge-success">Đã hoàn thành</label>';
            default:
                return 'UNKNOWN';
        }
    }
    public function getPaymentStatusAttribute()
    {

    }
}
