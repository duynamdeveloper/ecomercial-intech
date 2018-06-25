@extends('backend.layouts.index')
@section('title','Tạo mới đơn hàng')
@section('page-title','Tạo mới đơn hàng')
@section('parent-breadcrumb','Quản lý đơn hàng')
@section('child-breadcrumb','Tạo mới')
@section('content')
<div class="col-lg-12">
        <form method="post" enctype="multipart/form-data" action="{{ route('be.order.store') }}">
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
            <!-- Nav tabs -->
            <ul class="nav nav-tabs customtab">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#info">Thông tin</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#shipping">SEO</a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane active container pt-2" id="info">
                    <div class="form-group row">
                        <label for="categoryname" class="col-sm-3 col-form-label text-right">Tên danh mục:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="categoryname" name="categoryname" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="description" class="col-sm-3 col-form-label text-right">Mô tả</label>
                        <div class="col-sm-8">
                            <textarea class="form-control" name="description" id="description" placeholder="Mô tả"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="parent_id" class="col-sm-3 col-form-label text-right">Danh mục cha</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="parent_id">
                                <option value="0">[None]</option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="image" class="col-sm-3 col-form-label text-right">Hình ảnh</label>
                        <div class="col-sm-8">
                            <input type="file" id="inputGroupFile01" name="image">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="display_order" class="col-sm-3 col-form-label text-right">Ưu tiên hiển thị
                            <i class="fa fa-question-circle text-warning" data-toggle="tooltip" data-placement="top"
                                title="Điểm ưu tiên để sắp xếp thứ tự danh mục trên menu và trên trang chủ"></i>
                        </label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" name="display_order" id="display_order" value="1">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="display_on_homepage" class="col-sm-3 col-form-label text-right">Hiển thị trên Trang chủ
                            <i class="fa fa-question-circle text-warning" data-toggle="tooltip" data-placement="top"
                                title="Hiện thị sản phẩm của danh mục này trên trang chủ"></i>
                        </label>
                        <div class="col-sm-8">
                            <input type="checkbox" name="display_on_homepage" id="display_on_homepage" value="1">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="display_on_sidebar" class="col-sm-3 col-form-label text-right">Hiển thị trên Menu trái
                            <i class="fa fa-question-circle text-warning" data-toggle="tooltip" data-placement="top"
                                title="Hiện thị danh mục này trên menu trái"></i>
                        </label>
                        <div class="col-sm-8">
                            <input type="checkbox" name="display_on_sidebar" id="display_on_sidebar" value="1">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="display_on_topbar" class="col-sm-3 col-form-label text-right">Hiển thị trên Menu Top
                            <i class="fa fa-question-circle text-warning" data-toggle="tooltip" data-placement="top"
                                title="Hiện thị danh mục này trên menu top"></i>
                        </label>
                        <div class="col-sm-8">
                            <input type="checkbox" name="display_on_topbar" id="display_on_topbar" value="1">
                        </div>
                    </div>

                </div>
                <div class="tab-pane container pt-2" id="seo">
                        <div class="form-group row">
                            <label for="meta_keywords" class="col-sm-3 col-form-label text-right">Meta keywords:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="meta_keywords" name="meta_keywords">
                            </div>
                        </div>
                        <div class="form-group row">
                                <label for="meta_description" class="col-sm-3 col-form-label text-right">Meta description:</label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" rows="4" name="meta_description" width="100%"></textarea>   
                                </div>
                        </div>
                        <div class="form-group row">
                                <label for="meta_title" class="col-sm-3 col-form-label text-right">Meta title:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="meta_title">
                                </div>
                        </div>
                        <div class="form-group row">
                                <label for="meta_anchor" class="col-sm-3 col-form-label text-right">SEO Friendly URL: 
                                        <i class="fa fa-question-circle text-warning" data-toggle="tooltip" data-placement="top"
                                        title="Đường dẫn tới danh mục. VD: http://vattusanxuat.net/may-han-cong-nghiep, nếu bỏ trống, phần này sẽ được tự sinh dựa vào tên danh mục"></i>
                                </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="meta_anchor">
                                </div>
                        </div>
                </div>
            </div>    
        </div>
    </form>
    </div>
</div>
@endsection @section('scripts')
<script>
    $('#categoryFormTab a').on('click', function (e) {
        e.preventDefault()
        $(this).tab('show')
    });
</script>

@endsection