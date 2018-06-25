@extends('backend.layouts.index')
@section('title','Thêm khách hàng')
@section('page-title','Thêm khách hàng')
@section('parent-breadcrumb','Khách hàng')
@section('child-breadcrumb','Tạo mới')
@section('content')
<div class="col-lg-12">
        <form method="post" action="{{ route('be.customer.store') }}">
            @csrf
    <div class="card">
        <div class="card-header">
            <span class="font-weight-bold">Tạo mới</span>
            <div class="pull-right">
                <button class="btn btn-info" type="submit" name="save"><i class="fa fa-save"></i> Lưu</button>
                <button class="btn btn-info" type="submit" name="save-continue"><i class="fa fa-save"></i> Lưu và Tiếp tục sửa</button>
            </div>
        </div>
        <div class="card-body p-t-20">
            <div class="form-group row">
                <label class="control-label col-sm-3 text-right">
                    Tên khách hàng
                </label>
                <div class="col-sm-8">
                    <input type="text" name="name" required class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-sm-3 text-right">
                    Loại hình
                </label>
                <div class="col-sm-8">
                    <select name="type" class="form-control">
                        <option value="{!! Config::get('constants.customer.type.personal') !!}">Cá nhân</option>
                        <option value="{!! Config::get('constants.customer.type.company') !!}">Doanh nghiệp</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-sm-3 text-right">
                    Email
                </label>
                <div class="col-sm-8">
                    <input type="email" name="email" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-sm-3 text-right">
                    SĐT
                </label>
                <div class="col-sm-8">
                    <input type="text" name="phone" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-sm-3 text-right">
                   Địa chỉ
                </label>
                <div class="col-sm-8">
                    <input type="text" name="address" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-sm-3 text-right">
                   Địa chỉ giao hàng
                </label>
                <div class="col-sm-8">
                    <input type="text" name="shipping_address"class="form-control">
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