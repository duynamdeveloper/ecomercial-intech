@extends('backend.layouts.index')
@section('title','Sản phẩm')
@section('page-title','Sản phẩm')
@section('parent-breadcrumb','Catalog')
@section('child-breadcrumb','Sản phẩm')
@section('content')

    <div class="col-lg-12">

        <div class="card">
            <div class="card-header">
                <span class="font-weight-bold">Sản phẩm</span>
                <a href="{{ route('be.product.create') }}"><button class="btn btn-success pull-right"><i class="fa fa-plus"></i> Tạo mới</button></a>

            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <th>#</th>
                        <th>SKU</th>
                        <th>Tên</th>
                        <th>Danh mục</th>
                        <th>Hình ảnh</th>
                        <th>Slug <i class="fa fa-question-circle text-warning" data-toggle="tooltip" data-placement="top"
                            title="Đường dẫn tới sản phẩm. VD: http://vattusanxuat.net/san-pham/slug"></i></th>
                        <th>Độ ưu tiên</th>
                        <th>Edit</th>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->sku }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->category->name }}</td>
                            <td><img src="{{ Storage::url($product->image_1) }}" width="75px" height="75px"></td>
                            <td>{{ $product->meta_anchor }}</td>
                            <td>{{ $product->display_order }}</td>

                            <td><a href="{{ route('be.product.edit',$product->id) }}"><i class="fa fa-pencil"></i></a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection