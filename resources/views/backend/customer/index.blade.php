@extends('backend.layouts.index')
@section('title','Danh sách khách hàng')
@section('page-title','Khách hàng')
@section('parent-breadcrumb','Quản lý khách hàng')
@section('child-breadcrumb','Danh sách')
@section('content')

    <div class="col-lg-12">

        <div class="card">
            <div class="card-header">
                <span class="font-weight-bold">Quản lý khách hàng</span>
                <a href="{{ route('be.customer.create') }}"><button class="btn btn-success pull-right"><i class="fa fa-plus"></i> Tạo mới</button></a>

            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <th>#</th>
                        <th>Loại</th>
                        <th>Tên</th>       
                        <th>Email</th>
                        <th>SĐT</th>
                        <th>Địa chỉ</th>
                        <th>Control</th>
                    </thead>
                    <tbody>
                        @foreach($customers as $customer)
                        <tr>
                            <td>{{ $customer->id }}</td>
                            <td>{{ $customer->type }}</td>
                            <td>{{ $customer->name }}</td>
                            <td>{{ $customer->email }}</td>
                            <td>{{ $customer->phone }}</td>
                            <td>{{ $customer->address }}</td>
                            <td><a href="{{ route('be.customer.edit',$attribute->id) }}"><i class="fa fa-pencil"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection