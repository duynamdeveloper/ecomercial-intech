@extends('backend.layouts.index')
@section('title','Tạo mới thuộc tính')
@section('page-title','Tạo mới thuộc tính')
@section('parent-breadcrumb','Thuộc tính sản phẩm')
@section('child-breadcrumb','Tạo mới')
@section('content')
<div class="col-lg-12">
        <form method="post" action="{{ route('be.attribute.store') }}">
            @csrf
    <div class="card p-0">
        <div class="card-header">
            <span class="font-weight-bold">Tạo mới</span>
            <div class="pull-right">
                <button class="btn btn-info" type="submit" name="save"><i class="fa fa-save"></i> Lưu</button>
                <button class="btn btn-info" type="submit" name="save-continue"><i class="fa fa-save"></i> Lưu và Tiếp tục sửa</button>
            </div>
        </div>
        <div class="card-body">
            <div class="form-group row">
                <label class="control-label col-sm-4">
                    Tên thuộc tính
                </label>
                <div class="col-sm-8">
                    <input type="text" name="name" required class="form-control">
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