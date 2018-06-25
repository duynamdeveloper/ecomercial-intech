@extends('backend.layouts.index')
@section('title','Thuộc tính sản phẩm')
@section('page-title','Thuộc tính sản phẩm')
@section('parent-breadcrumb','Catalog')
@section('child-breadcrumb','Thuộc tính sản phẩm')
@section('content')

    <div class="col-lg-12">

        <div class="card">
            <div class="card-header">
                <span class="font-weight-bold">Thuộc tính sản phẩm</span>
                <a href="{{ route('be.attribute.create') }}"><button class="btn btn-success pull-right"><i class="fa fa-plus"></i> Tạo mới</button></a>

            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <th>#</th>
                        <th>Tên</th>
                        <th>Edit</th>
                    </thead>
                    <tbody>
                        @foreach($attributes as $attribute)
                        <tr>
                            <td>{{ $attribute->id }}</td>
                            <td>{{ $attribute->name }}</td>
                            <td><a href="{{ route('be.attribute.edit',$attribute->id) }}"><i class="fa fa-pencil"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection