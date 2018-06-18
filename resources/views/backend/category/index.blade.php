@extends('backend.layouts.index')
@section('title','Danh mục sản phẩm')
@section('page-title','Danh mục sản phẩm')
@section('parent-breadcrumb','Catalog')
@section('child-breadcrumb','Danh mục sản phẩm')
@section('styles')
    
<link href="{{ asset('ElaAdmin/css/lib/sweetalert/sweetalert.css') }}" rel="stylesheet">

@endsection
@section('content')

    <div class="col-lg-12">

        <div class="card">
            <div class="card-header">
                <span class="font-weight-bold">Danh mục sản phẩm</span>
                <a href="{{ route('be.category.create') }}"><button class="btn btn-success pull-right"><i class="fa fa-plus"></i> Tạo mới</button></a>

            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <th>#</th>
                        <th>Tên</th>
                        <th>Slug <i class="fa fa-question-circle text-warning" data-toggle="tooltip" data-placement="top"
                            title="Đường dẫn tới Danh mục. VD: http://vattusanxuat.net/slug"></i></th>
                        <th>Độ ưu tiên</th>
                        <th>Edit</th>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->meta_anchor }}</td>
                            <td>{{ $category->display_order }}</td>
                            <td><a href="{{ route('be.category.edit',$category->id) }}"><i class="fa fa-pencil"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection