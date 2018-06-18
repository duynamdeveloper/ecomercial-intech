@extends('backend.layouts.index')
@section('title','Cập nhật danh mục')
@section('page-title','Cập nhật danh mục - '.$category->name)
@section('parent-breadcrumb','Danh mục sản phẩm')
@section('child-breadcrumb','Cập nhật')
@section('content')
<div class="col-lg-12">
        <form method="post" enctype="multipart/form-data" action="{{ route('be.category.update',$category->id) }}">
            @method('put')
            @csrf
            
    <div class="card p-0">
        <div class="card-header">
            <span class="font-weight-bold">Cập nhật</span>
            <div class="pull-right">
                <button class="btn btn-info" type="submit" name="save"><i class="fa fa-save"></i> Lưu</button>
                <button class="btn btn-info" type="submit" name="save-continue"><i class="fa fa-save"></i> Lưu và Tiếp tục sửa</button>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteCategoryModal"><i class="fa fa-trash-o"></i> Xóa</button>
            </div>
        </div>
        <div class="card-body">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs customtab">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#info">Thông tin</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#seo">SEO</a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane active container pt-2" id="info">
                    <div class="form-group row">
                        <label for="categoryname" class="col-sm-3 col-form-label text-right">Tên danh mục:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="categoryname" name="categoryname" value="{{ $category->name }}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="description" class="col-sm-3 col-form-label text-right">Mô tả</label>
                        <div class="col-sm-8">
                            <textarea class="form-control" name="description" id="description" placeholder="Mô tả">{{ $category->description }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="parent_id" class="col-sm-3 col-form-label text-right">Danh mục cha</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="parent_id">
                                <option value="0">[None]</option>
                                @foreach ($categories as $a_category)
                                <option value="{{ $a_category->id }}" @if($a_category->id == $category->parent_id) selected="true" @endif >{{ $a_category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                            <div class="col-sm-3 offset-sm-3">
                                <img src="{{ Storage::url($category->image) }}" class="img img-fluid">
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
                            <input type="number" class="form-control" name="display_order" id="display_order" value="{{ $category->display_order }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="display_on_homepage" class="col-sm-3 col-form-label text-right">Hiển thị trên Trang chủ
                            <i class="fa fa-question-circle text-warning" data-toggle="tooltip" data-placement="top"
                                title="Hiện thì sản phẩm của danh mục này trên trang chủ"></i>
                        </label>
                        <div class="col-sm-8">
                            <input type="checkbox" name="display_on_homepage" id="display_on_homepage" value="1"  @if($category->display_in_homepage==1) checked="true" @endif>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="display_on_sidebar" class="col-sm-3 col-form-label text-right">Hiển thị trên Menu trái
                            <i class="fa fa-question-circle text-warning" data-toggle="tooltip" data-placement="top"
                                title="Hiện thì sản phẩm của danh mục này trên menu trái"></i>
                        </label>
                        <div class="col-sm-8">
                            <input type="checkbox" name="display_on_sidebar" id="display_on_sidebar" value="1"  @if($category->display_in_sidebar == 1) checked="true" @endif>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="display_on_topbar" class="col-sm-3 col-form-label text-right">Hiển thị trên Menu Top
                            <i class="fa fa-question-circle text-warning" data-toggle="tooltip" data-placement="top"
                                title="Hiện thì sản phẩm của danh mục này trên menu top"></i>
                        </label>
                        <div class="col-sm-8">
                            <input type="checkbox" name="display_on_topbar" id="display_on_topbar" value="1" @if($category->display_in_topbar == 1) checked="true" @endif>
                        </div>
                    </div>

                </div>
                <div class="tab-pane container pt-2" id="seo">
                        <div class="form-group row">
                            <label for="meta_keywords" class="col-sm-3 col-form-label text-right">Meta keywords:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="meta_keywords" name="meta_keywords" value="{{ $category->meta_keywords }}">
                            </div>
                        </div>
                        <div class="form-group row">
                                <label for="meta_description" class="col-sm-3 col-form-label text-right">Meta description:</label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" rows="4" name="meta_description" width="100%">{{ $category->meta_description }}</textarea>   
                                </div>
                        </div>
                        <div class="form-group row">
                                <label for="meta_title" class="col-sm-3 col-form-label text-right">Meta title:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="meta_title"  value="{{ $category->meta_title }}">
                                </div>
                        </div>
                        <div class="form-group row">
                                <label for="meta_anchor" class="col-sm-3 col-form-label text-right">SEO Friendly URL: 
                                        <i class="fa fa-question-circle text-warning" data-toggle="tooltip" data-placement="top"
                                        title="Đường dẫn tới danh mục. VD: http://vattusanxuat.net/may-han-cong-nghiep, nếu bỏ trống, phần này sẽ được tự sinh dựa vào tên danh mục"></i>
                                </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="meta_anchor" value="{{ $category->meta_anchor }}">
                                </div>
                        </div>
                </div>
            </div>    
        </div>
    </form>
    </div>
</div>
<div class="modal fade" id="deleteCategoryModal" tabindex="-1" role="dialog" aria-labelledby="deleteCategoryModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="deleteCategoryModalLabel">Xóa danh mục: <span class="text-danger">{{ $category->name }}</span></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="{{ route('be.category.destroy',$category->id) }}" method="post">
                @csrf
                @method('delete')
            <div class="modal-body">
                <span>Tất cả sản phẩm thuộc danh mục này sẽ ẩn khỏi cửa hàng. Bạn chắc chắn muốn xóa?</span>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submmit" class="btn btn-danger">Xóa</button>
            </div>
        </form>
          </div>
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