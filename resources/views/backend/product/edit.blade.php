@extends('backend.layouts.index')
@section('title','Edit sản phẩm')
@section('page-title','Edit sản phẩm - '.$product->name)
@section('parent-breadcrumb','Sản phẩm')
@section('child-breadcrumb','Cập nhật')
@section('styles')
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')
<div class="col-lg-12">
    <form method="post" enctype="multipart/form-data" action="{{ route('be.product.update',$product->id) }}">
        @csrf @method('patch')
        <div class="card p-0">
            <div class="card-header">
                <span class="card-title">Cập nhật</span>
                <div class="pull-right">
                    <button class="btn btn-info" type="submit" name="save">
                        <i class="fa fa-save"></i> Lưu</button>
                    <button class="btn btn-info" type="submit" name="save-continue">
                        <i class="fa fa-save"></i> Lưu và Tiếp tục sửa</button>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteProductModal">
                        <i class="fa fa-trash-o"></i> Xóa</button>
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
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#attribute">Thuộc tính <i class="fa fa-question-circle text-warning" data-toggle="tooltip" data-placement="top" title="Ngoài các thuộc tính cố định, bản có thể bổ sung thêm một số thông tin cho sản phẩm. VD: Màu sắc, điện áp..."></i></a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active container bg-ash" id="info">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-header">
                                        <span>Thông tin chung</span>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label for="product_name" class="col-sm-3 col-form-label text-right">Tên sản phảm:</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="product_name" name="product_name" value="{{ $product->name }}" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="sku" class="col-sm-3 col-form-label text-right">SKU:
                                                <i class="fa fa-question-circle text-warning" data-toggle="tooltip" data-placement="top" title="Mã sản phẩm, nên đặt theo quy tắc nhất định đễ dễ quản lý."></i>
                                            </label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="sku" name="sku" value="{{ $product->sku }}" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="sku" class="col-sm-3 col-form-label text-right">Giới thiệu ngắn:</label>
                                            <div class="col-sm-8">
                                                <textarea class="summernote" name="short_description" rows="20">{{ $product->short_description }}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="sku" class="col-sm-3 col-form-label text-right">Giới thiệu:</label>
                                            <div class="col-sm-8">
                                                <textarea class="summernote" name="description">{{ $product->description }}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="category_id" class="col-sm-3 col-form-label text-right">Danh mục:</label>
                                            <div class="col-sm-8">
                                                <select class="form-control" name="category_id">
                                                    @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}" @if($category->id == $product->category_id) selected="true" @endif>{{ $category->name
                                                        }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="manufacture_id" class="col-sm-3 col-form-label text-right">Nhãn hiệu:</label>
                                            <div class="col-sm-8">
                                                <select class="form-control" name="manufacture_id">
                                                    @foreach ($manufactures as $manufacture)
                                                    <option value="{{ $manufacture->id }}" @if($manufacture->id == $product->manufacture_id) selected="true" @endif>{{ $manufacture->name
                                                        }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="parent_id" class="col-sm-3 col-form-label text-right">Made in:</label>
                                            <div class="col-sm-8">
                                                <select class="form-control" name="country_id">
                                                    @foreach ($countries as $country)
                                                    <option value="{{ $country->id }}" @if($country->id == $product->country_id) selected="true" @endif>{{ $country->country_name
                                                        }} - {{ $country->country_code }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-3 offset-sm-3">
                                                <img src="{{ Storage::url($product->image_1) }}" class="img img-fluid">
                                            </div>

                                        </div>
                                        <div class="form-group row">
                                            <label for="image" class="col-sm-3 col-form-label text-right">Hình ảnh</label>
                                            <div class="col-sm-8">
                                                <input type="file" id="inputGroupFile01" name="image_1">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="display_order" class="col-sm-3 col-form-label text-right">Ưu tiên hiển thị
                                                <i class="fa fa-question-circle text-warning" data-toggle="tooltip" data-placement="top" title="Điểm ưu tiên để sắp xếp thứ tự sản phẩm trên website"></i>
                                            </label>
                                            <div class="col-sm-8">
                                                <input type="number" class="form-control" name="display_order" id="display_order" value="{{ $product->display_order }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="is_new" class="col-sm-3 col-form-label text-right">Hàng mới
                                                <i class="fa fa-question-circle text-warning" data-toggle="tooltip" data-placement="top" title="Đánh dấu đây là sản phẩm mới"></i>
                                            </label>
                                            <div class="col-sm-8">
                                                <input type="checkbox" name="is_new" id="is_new" value="1" @if($product->is_new == 1) checked="true" @endif>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="is_available" class="col-sm-3 col-form-label text-right">Hiển thị
                                                <i class="fa fa-question-circle text-warning" data-toggle="tooltip" data-placement="top" title="Có hiển thị sản phẩm này trên shop hay không?"></i>
                                            </label>
                                            <div class="col-sm-8">
                                                <input type="checkbox" name="is_available" id="is_available" value="1" @if($product->is_available)checked="true"@endif>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="is_available" class="col-sm-3 col-form-label text-right">Sản phẩm tương tự
                                                <i class="fa fa-question-circle text-warning" data-toggle="tooltip" data-placement="top" title="Hiển thị gợi ý những sản phẩm tương tự khi khách hàng xem sản phẩm này"></i>
                                            </label>
                                            <div class="col-sm-8">
                                                <select name="related_products[]" class="select-2 form-control" multiple="multiple">
                                                    @foreach($product->related_products as $r_product)
                                                    <option value="{{ $r_product->id }}" selected>{{ $r_product->name }}</option>
                                                    @endforeach @foreach ($products as $a_product)
                                                    <option value="{{ $a_product->id }}">{{ $a_product->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header">
                                        <span>Thông số kỹ thuật</span>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group-row">
                                            <div class="form-group row">
                                                <label for="weight" class="col-sm-6 col-form-label text-right">Trọng lượng

                                                </label>
                                                <div class="col-sm-6">
                                                    <input type="number" class="form-control" name="weight" id="weight" value="{{ $product->weight }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="height" class="col-sm-6 col-form-label text-right">Chiều cao
                                                </label>
                                                <div class="col-sm-6">
                                                    <input type="number" class="form-control" name="height" id="height" value="{{ $product->height }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="width" class="col-sm-6 col-form-label text-right">Chiều rộng
                                                </label>
                                                <div class="col-sm-6">
                                                    <input type="number" class="form-control" name="width" id="width" value="{{ $product->width }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="length" class="col-sm-6 col-form-label text-right">Chiều dài
                                                </label>
                                                <div class="col-sm-6">
                                                    <input type="number" class="form-control" name="length" id="length" value="{{ $product->length }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="warranty_period" class="col-sm-6 col-form-label text-right">Thời gian bảo hành (tháng)
                                                </label>
                                                <div class="col-sm-6">
                                                    <input type="number" class="form-control" name="warranty_period" id="warranty_period" value="0">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="can_ship" class="col-sm-6 col-form-label text-right">Có thể ship?
                                                    <i class="fa fa-question-circle text-warning" data-toggle="tooltip" data-placement="top" title="Sản phẩm này có thể ship"></i>
                                                </label>
                                                <div class="col-sm-6">
                                                    <input type="checkbox" name="can_ship" id="can_ship" value="1" @if($product->can_ship == 1) checked="true" @endif>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="free_ship" class="col-sm-6 col-form-label text-right">Free ship
                                                    <i class="fa fa-question-circle text-warning" data-toggle="tooltip" data-placement="top" title="Sản phẩm này có áp dụng miễn phí ship?"></i>
                                                </label>
                                                <div class="col-sm-6">
                                                    <input type="checkbox" name="free_ship" id="free_ship" value="1" @if($product->free_ship == 1)checked="true" @endif>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-header">
                                        <span>Giá cả</span>
                                    </div>
                                    <div class="card-body pt-2">
                                        <div class="form-group row">
                                            <label class="control-label col-sm-3 text-right">Giá
                                                <i class="fa fa-question-circle text-warning" data-toggle="tooltip" data-placement="top" title="Giá sản phẩm, nếu để mục này là 0, website sẽ hiển thị sản phẩm này là Giá liên hệ"></i>
                                                
                                            </label>
                                            <div class="col-sm-4">
                                                <input type="number" class="form-control" value="{{ $product->price }}" name="price">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="control-label col-sm-3 text-right"> Giá cũ
                                                <i class="fa fa-question-circle text-warning" data-toggle="tooltip" data-placement="top" title="Giá bán cũ, nếu mục này được điền khác 0, website sẽ hiển thị sản phầm này đang được discount"></i>
                                               
                                            </label>
                                            <div class="col-sm-4">
                                                <input type="number" class="form-control" value="{{ $product->old_price }}" name="old_price">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="tab-pane container pt-2" id="seo">
                        <div class="form-group row">
                            <label for="meta_keywords" class="col-sm-3 col-form-label text-right">Meta keywords:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="meta_keywords" name="meta_keywords" value="{{ $product->meta_keywords }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="meta_description" class="col-sm-3 col-form-label text-right">Meta description:</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" rows="4" name="meta_description" width="100%">{{ $product->meta_description }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="meta_title" class="col-sm-3 col-form-label text-right">Meta title:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="meta_title" value="{{ $product->meta_title }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="meta_anchor" class="col-sm-3 col-form-label text-right">SEO Friendly URL:
                                <i class="fa fa-question-circle text-warning" data-toggle="tooltip" data-placement="top" title="Đường dẫn tới danh mục. VD: http://vattusanxuat.net/may-han-cong-nghiep, nếu bỏ trống, phần này sẽ được tự sinh dựa vào tên danh mục"></i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="meta_anchor" value="{{ $product->meta_anchor }}">
                            </div>
                        </div>
                    </div>
    </form>
    <div class="tab-pane container pt-2" id="attribute">
        <table class="table" id="attributes_table">
            <thead>
                <th>#</th>
                <th>Tên thuộc tính</th>
                <th>Giá trị</th>
                <th>Sắp xếp</th>
                <th>Control</th>
            </thead>
            <tbody>

            </tbody>
        </table>
        <form class="add_attribute_form">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card" id="attribute_form">
                        <div class="card-header" id="form_header">Thêm thuộc tính cho sản phẩm</div>
                        <div class="card-body p-t-5">
                            <div class="form-group row">
                                <label class="control-label text-right col-lg-3">Tên thuộc tính</label>
                                <div class="col-lg-7">
                                    <select class="form-control select-2" name="attribute_id" id="attribute_id">
                                        @foreach($attributes as $attribute)
                                        <option value="{{ $attribute->id }}">{{ $attribute->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label text-right col-lg-3">Giá trị</label>
                                <div class="col-lg-7">
                                    <input type="text" id="attribute_value" name="attribute_value" class="form-control" required/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label text-right col-lg-3">Thứ tự sắp xếp</label>
                                <div class="col-lg-7">
                                    <input type="text" name="display_order" id="display_order" class="form-control" value="1" required/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-10">
                                    <button class="btn btn-info float-right" type="button" id="save_attribute" action="add">
                                        <i class="fa fa-save"></i> Thêm thuộc tính</button>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>
    </div>
    </div>

    </div>
</div>
<div class="modal fade" id="deleteProductModal" tabindex="-1" role="dialog" aria-labelledby="deleteProductModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteProductModalLabel">Xóa danh mục:
                    <span class="text-danger">{{ $product->name }}</span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('be.product.destroy',$product->id) }}" method="post">
                @csrf @method('delete')
                <div class="modal-body">
                    <span>Sản phẩm này sẽ vĩnh viễn bị xóa khỏi cửa hàng. Bạn chắc chắn muốn xóa?</span>
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
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script>
    
$('.summernote').summernote({
  height: 300,                 // set editor height
  minHeight: null,             // set minimum height of editor
  maxHeight: null,             // set maximum height of editor
  focus: true                  // set focus to editable area after initializing summernote
});
$('.select-2').select2();
var att_table = $("#attributes_table");
var ATT = {};
var product_id = {{ $product->id }};
var ATT = {
    API :    {
    get : '{{ route('be.product.attribute.get') }}',
    add : '{{ route('be.product.attribute.add') }}',
    update: '{{ route('be.product.attribute.update') }}',
    destroy: '{{ route('be.product.attribute.destroy') }}',
    getSingle: '{{ route('be.product.attribute.getsingle') }}'
}
}
ATT.getAttributes = function(){
    att_table.find('tbody').html('<tr><td colspan="5" class="text-center text-warning">Loading...</td></tr>');
    $.ajax({
        url: ATT.API.get,
        method: 'post',
        data:{
            product_id: product_id
        },
        success: function(data){
            att_table.find('tbody').html('');
            $.each(data.data, function(i, att){
                var row = '<tr data-id="'+att.id+'">'
                        +'<td>'+(i+1)+'</td>'
                        +'<td>'+att.attribute.name+'</td>'
                        +'<td class="att_value">'+att.value+'</td>'
                        +'<td class="att_display_order">'+att.display_order+'</td>'
                        +'<td class="control_cell"><i class="fa fa-pencil enable_pointer edit_attribute" data-id="'+att.id+'"></i> <i class="fa fa-times text-danger enable_pointer del_attribute" data-id="'+att.id+'"></i></td>'
                        +'</tr>';
            att_table.find('tbody').append(row);
            });          
        }
    });
}
ATT.addAttribute = function(){
    var display_order = $("#display_order").val();
    var attribute_id = $("#attribute_id").val();
    var attribute_value = $("#attribute_value").val();
    $.ajax({
        url: ATT.API.add,
        method: 'post',
        data: {
            product_id: product_id,
            att_id: attribute_id,
            att_value: attribute_value,
            att_display_order: display_order
        },
        success: function(data){
            ATT.getAttributes();
        }
    });
}
ATT.getSingleAttribute = function(att_id){
    $.ajax({
        url: ATT.API.getSingle,
        method: 'post',
        data:{
            att_id: att_id
        },
        success: function(data){
            $("#attribute_id").val(data.data.attribute_id).attr('disabled','disabled');
            $("#attribute_value").val(data.data.value);
            $("#display_order").val(data.data.display_order);
            $("#form_header").html('Chỉnh sửa thuộc tính:' + data.data.attribute.name);
            $("#save_attribute").attr('action','edit');
        }
    })
}
ATT.updateAttibute = function(att_id, att_value, display_order){
    $.ajax({
        url: ATT.API.update,
        method: 'post',
        data:{
            att_value_id: att_id,
            att_value: att_value,
            display_order: display_order
        },
        success: function(data){
            ATT.getAttributes();
        }
    })
}
ATT.destroyAttribute = function(att_id){
    $.ajax({
        url: ATT.API.destroy,
        method: 'post',
        data:{
            att_value_id: att_id,
        },
        success: function(data){
            ATT.getAttributes();
        }
    });
}
$(document).ready(function(){
    ATT.getAttributes();
    $("#add_attribute").click(function(){
        $("#attribute_form").slideDown('slow');
    });
    $("#save_attribute").click(function(){
        if($(this).attr('action') == 'edit'){

        }
        ATT.addAttribute();
        
    });
    att_table.on('click','.edit_attribute', function(){
       var tr = $(this).closest('tr');
       var att_value = tr.find('td.att_value').html();
       var display_order = tr.find('td.att_display_order').html();
       var att_id = tr.attr('data-id');
       tr.find('td.att_value').html('<input type="text" name="cell_att_value" value="'+att_value+'">');
       tr.find('td.att_display_order').html('<input type="text" name="cell_display_order" value="'+display_order+'">');
       tr.find('td.control_cell').html('<button type="button" class="btn btn-default btn-save-edit" data-id="'+att_id+'"><i class="fa fa-save"> Save</i></button><button type="button" class="btn btn-default btn-cancel">Cancel</button>');

    });
    att_table.on('click', '.btn-save-edit', function(){
        var att_id = $(this).attr('data-id');
        var att_value = $(this).closest('tr').find('td.att_value > input').val();
        var display_order = $(this).closest('tr').find('td.att_display_order > input').val();
        ATT.updateAttibute(att_id,att_value,display_order);
        
    });
    att_table.on('click','.btn-cancel', function(){
        ATT.getAttributes();
    });
    att_table.on('click','.del_attribute', function(){
        var att_id = $(this).attr('data-id');
        swal({
  title: "Are you sure?",
  text: "Bạn chắc chắn muốn xóa?",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    ATT.destroyAttribute(att_id);
    swal("Thuộc tính đã bị xóa!", {
      icon: "success",
    });
  } else {
    swal("Hủy thao tác thành công!");
  }
});
        
    });
});
</script>


@endsection