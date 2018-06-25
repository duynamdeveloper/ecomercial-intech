@extends('backend.layouts.index')
@section('title','Danh sách đơn hàng')
@section('page-title','Đơn hàng')
@section('parent-breadcrumb','Quản lý đơn hàng')
@section('child-breadcrumb','Danh sách')
@section('content')

    <div class="col-lg-12">

        <div class="card">
            <div class="card-header">
                <span class="font-weight-bold">Quản lý đơn hàng</span>
                <a href="{{ route('be.customer.create') }}"><button class="btn btn-success pull-right"><i class="fa fa-plus"></i> Tạo mới</button></a>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <th>#</th>
                        <th>Trạng thái</th>
                        <th>Thanh toán</th>       
                        <th>Vận chuyển</th>
                        <th>Khách hàng</th>
                        <th>Ngày tạo</th>
                        <th>Total</th>
                        <th>Control</th>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->status }}</td>
                            <td>{{ $order->payment_status }}</td>
                            <td>{{ $order->shipment }}</td>
                            <td>{{ $order->customer->name }}</td>
                            <td>{{ $order->created_at }}</td>
                            <td><a href="{{ route('be.order.edit',$attribute->id) }}"><i class="fa fa-pencil"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection