@extends('backend.layouts.index')
@section('title','Danh mục sản phẩm')
@section('page-title','Danh mục sản phẩm')
@section('parent-breadcrumb','Catalog')
@section('child-breadcrumb','Danh mục sản phẩm')
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
                        <th>Anchor</th>
                        <th>Độ ưu tiên</th>
                        <th>Edit</th>
                    </thead>
                    <table>
                        @foreach($categories as $category)
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->meta_anchor }}</td>
                            <td>{{ $category->display_order }}</td>
                            <td><a href="{{ route(be.category.edit) }}"><button class="btn btn-default"></button></a><i class="fa fa-pen"></i></td>
                        @endforeach
                    </table>
                </table>
            </div>
        </div>
    </div>
@endsection