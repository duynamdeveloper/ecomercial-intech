@extends('backend.layouts.index')
@section('title','Chỉnh sửa thuộc tính')
@section('page-title','Chỉnh sửa thuộc tính')
@section('parent-breadcrumb','Thuộc tính')
@section('child-breadcrumb','Chỉnh sửa')
@section('content')
<div class="col-lg-12">
        <form method="post" action="{{ route('be.attribute.update',$attribute->id) }}">
            @csrf
            @method('patch')
    <div class="card p-0">
        <div class="card-header">
            <span class="font-weight-bold">Chỉnh sửa thuộc tính</span>
            <div class="pull-right">
                <button class="btn btn-info" type="submit" name="save"><i class="fa fa-save"></i> Lưu</button>
                <button class="btn btn-info" type="submit" name="save-continue"><i class="fa fa-save"></i> Lưu và Tiếp tục sửa</button>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteAttributeModal"><i class="fa fa-trash-o"></i> Xóa</button>
            </div>
        </div>
        <div class="card-body">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs customtab">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#info">Thông tin</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#products">Sản phẩm đang sử dụng</a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane active container p-t-2" id="info">
                    <div class="form-group row">
                        <label for="categoryname" class="col-sm-3 col-form-label text-right">Tên thuộc tính:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="name" name="name" value="{{ $attribute->name }}" required>
                        </div>
                    </div>

                </div>
                <div class="tab-pane container p-t-2" id="products">
                    <table class="table">
                        <thead>
                            <th>#</th>
                            <th>SKU</th>
                            <th>Tên</th>
                            <th>Danh mục</th>
                        </thead>
                        <tbody>
                            @php $i = 1 @endphp
                            @foreach ($attribute->attribute_values as $attribute_value)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{$attribute_value->product->sku }}</td>
                                    <td>{{ $attribute_value->product->name }}</td>
                                    <td>{{ $attribute_value->product->category->name }}</td>
                                </tr>
                               @php $i++ @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>    
        </div>
    </form>
    </div>
</div>

<div class="modal fade" id="deleteAttributeModal" tabindex="-1" role="dialog" aria-labelledby="deleteAttributeModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="deleteAttributeModalLabel">Xóa danh mục: <span class="text-danger">{{ $attribute->name }}</span></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="{{ route('be.attribute.destroy',$attribute->id) }}" method="post">
                @csrf
                @method('delete')
            <div class="modal-body">
                <span>Thuộc tính này sẽ bị xóa khỏi danh sách thuộc tính của các sản phẩm đã có thuộc tính này. Bạn chắc chắn muốn xóa?</span>
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

@endsection