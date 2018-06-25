@extends('backend.layouts.index')
@section('title','Edit thông tin khách hàng')
@section('page-title','Edit thông tin KH')
@section('parent-breadcrumb','Khách hàng')
@section('child-breadcrumb','Chỉnh sửa')
@section('content')
<div class="col-lg-12">
        <form method="post" action="{{ route('be.customer.update',$customer->id) }}">
            @method('patch')
            @csrf
    <div class="card">
        <div class="card-header">
            <span class="font-weight-bold">Edit</span>
            <div class="pull-right">
                <button class="btn btn-info" type="submit" name="save"><i class="fa fa-save"></i> Lưu</button>
                <button class="btn btn-info" type="submit" name="save-continue"><i class="fa fa-save"></i> Lưu và Tiếp tục sửa</button>
            </div>
        </div>
        <div class="card-body  p-t-20">
            <div class="form-group row">
                <label class="control-label col-sm-3 text-right">
                    Tên khách hàng
                </label>
                <div class="col-sm-8">
                    <input type="text" name="name" required class="form-control" value="{{ $customer->name }}">
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-sm-3 text-right">
                    Loại hình
                </label>
                <div class="col-sm-8">
                    <select name="type" class="form-control">
                        <option value="{{ Config::get('customer.type.personal') }}" @if($customer->type ==  Config::get('customer.type.personal')) selected="true" @endif>Cá nhân</option>
                        <option value="{{ Config::get('customer.type.company') }}" @if($customer->type ==  Config::get('customer.type.company')) selected="true" @endif>Doanh nghiệp</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-sm-3 text-right">
                    Email
                </label>
                <div class="col-sm-8">
                    <input type="email" name="email" class="form-control" value="{{ $customer->email }}">
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-sm-3 text-right">
                    SĐT
                </label>
                <div class="col-sm-8">
                    <input type="text" name="phone" class="form-control" value="{{ $customer->phonenumber }}">
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-sm-3 text-right">
                   Địa chỉ
                </label>
                <div class="col-sm-8">
                    <input type="text" name="address" class="form-control" value="{{ $customer->address }}">
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-sm-3 text-right">
                   Địa chỉ giao hàng
                </label>
                <div class="col-sm-8">
                    <input type="text" name="shipping_address"class="form-control" value="{{ $customer->shipping_address }}">
                </div>
            </div>

        </div>
    </form>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $('#categoryFormTab a').on('click', function (e) {
        e.preventDefault()
        $(this).tab('show')
    });
</script>

@endsection