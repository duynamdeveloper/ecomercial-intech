@extends('backend.layouts.index')
@section('title','Cập nhật nhãn hiệu')
@section('page-title','Cập nhật nhãn hiệu - '.$manufacture->name)
@section('parent-breadcrumb','nhãn hiệu sản phẩm')
@section('child-breadcrumb','Cập nhật')
@section('content')
<div class="col-lg-12">
        <form method="post" enctype="multipart/form-data" action="{{ route('be.manufacture.update',$manufacture->id) }}">
            @method('put')
            @csrf
    <div class="card p-0">
        <div class="card-header">
            <span class="font-weight-bold">Cập nhật</span>
            <div class="pull-right">
                <button class="btn btn-info" type="submit" name="save"><i class="fa fa-save"></i> Lưu</button>
                <button class="btn btn-info" type="submit" name="save-continue"><i class="fa fa-save"></i> Lưu và Tiếp tục sửa</button>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteManufactureModal"><i class="fa fa-trash-o"></i> Xóa</button>
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
                        <label for="manufacturename" class="col-sm-3 col-form-label text-right">Tên nhãn hiệu:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="manufacturename" name="manufacturename" required value={{ $manufacture->name }}>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="parent_id" class="col-sm-3 col-form-label text-right">Quốc gia</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="country_id">
                                @foreach ($countries as $country)
                                <option value="{{ $country->id }}" @if($country->id == $manufacture->country_id) selected="true" @endif>{{ $country->country_name }} - {{ $country->country_code }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                            <div class="col-sm-3 offset-sm-3">
                                <img src="{{ Storage::url($manufacture->image) }}" class="img img-fluid">
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
                                title="Điểm ưu tiên để sắp xếp thứ tự nhãn hiệu"></i>
                        </label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" name="display_order" id="display_order" value="{{ $manufacture->display_order }}">
                        </div>
                    </div>
                </div>
                <div class="tab-pane container pt-2" id="seo">
                        <div class="form-group row">
                            <label for="meta_keywords" class="col-sm-3 col-form-label text-right">Meta keywords:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="meta_keywords" name="meta_keywords" value="{{ $manufacture->meta_keywords }}">
                            </div>
                        </div>
                        <div class="form-group row">
                                <label for="meta_description" class="col-sm-3 col-form-label text-right">Meta description:</label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" rows="4" name="meta_description" width="100%">{{ $manufacture->meta_description }}</textarea>   
                                </div>
                        </div>
                        <div class="form-group row">
                                <label for="meta_title" class="col-sm-3 col-form-label text-right">Meta title:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="meta_title" value="{{ $manufacture->meta_title }}">
                                </div>
                        </div>
                        <div class="form-group row">
                                <label for="meta_anchor" class="col-sm-3 col-form-label text-right">SEO Friendly URL: 
                                        <i class="fa fa-question-circle text-warning" data-toggle="tooltip" data-placement="top"
                                        title="Đường dẫn tới nhãn hiệu. VD: http://vattusanxuat.net/nhan-hieu/sam-sung.html, nếu bỏ trống, phần này sẽ được tự sinh dựa vào tên nhãn hiệu"></i>
                                </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="meta_anchor" value="{{ $manufacture->meta_anchor }}">
                                </div>
                        </div>
                </div>
            </div>    
        </div>
    </form>
    </div>
</div>
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="deleteManufactureModal" tabindex="-1" role="dialog" aria-labelledby="deleteManufactureModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="deleteManufactureModalLabel">Xóa nhãn hiệu <span class="text-danger">{{ $manufacture->name }}</span></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="{{ route('be.manufacture.destroy',$manufacture->id) }}" method="post">
                @csrf
                @method('delete')
            <div class="modal-body">
                <span>Nhãn hiệu của tất cả sản phẩm thuộc nhãn hiệu này sẽ chuyển về "Không rõ". Bạn chắc chắn muốn xóa?</span>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submmit" class="btn btn-danger">Xóa</button>
            </div>
        </form>
          </div>
        </div>
      </div>
@endsection 
@section('scripts')
<script>
    $('#manufactureFormTab a').on('click', function (e) {
        e.preventDefault()
        $(this).tab('show')
    });
</script>

@endsection