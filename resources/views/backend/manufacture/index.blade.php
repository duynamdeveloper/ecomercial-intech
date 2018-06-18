@extends('backend.layouts.index')
@section('title','Nhãn hiệu')
@section('page-title','Nhãn hiệu')
@section('parent-breadcrumb','Catalog')
@section('child-breadcrumb','Nhãn hiệu')
@section('content')

    <div class="col-lg-12">

        <div class="card">
            <div class="card-header">
                <span class="font-weight-bold">Nhãn hiệu</span>
                <a href="{{ route('be.manufacture.create') }}"><button class="btn btn-success pull-right"><i class="fa fa-plus"></i> Tạo mới</button></a>

            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <th>#</th>
                        <th>Tên</th>
                        <th>Slug <i class="fa fa-question-circle text-warning" data-toggle="tooltip" data-placement="top"
                            title="Đường dẫn tới thương hiệu. VD: http://vattusanxuat.net/thuong-hieu/slug"></i></th>
                        <th>Độ ưu tiên</th>
                        <th>Quốc gia</th>
                        <th>Edit</th>
                    </thead>
                    <tbody>
                        @foreach($manufactures as $manufacture)
                        <tr>
                            <td>{{ $manufacture->id }}</td>
                            <td>{{ $manufacture->name }}</td>
                            <td>{{ $manufacture->meta_anchor }}</td>
                            <td>{{ $manufacture->display_order }}</td>
                            <td>{{ $manufacture->country->country_name }}</td>
                            <td><a href="{{ route('be.manufacture.edit',$manufacture->id) }}"><i class="fa fa-pencil"></i></a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection