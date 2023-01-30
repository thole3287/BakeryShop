@extends("Layout.masterAdmin")
@section("content")
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Sửa Thông Tin
            <small>Danh sách</small>
        </h1>
    </div>
    <!-- /.col-lg-12 -->
    <div class="col-lg-7" style="padding-bottom:120px">
        @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
            {{$error}} <br />
            @endforeach
        </div>
        @endif
        @if(Session::has("thongbao"))
        <div class="alert alert-success">{{Session::get("thongbao")}}</div>
        @endif
        @if(Session::has("loi"))
        <div class="alert alert-danger">{{Session::get("loi")}}</div>
        @endif
        <form action="{{route('editproduct', $editProduct->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Tên Sản Phẩm</label>
                <input class="form-control" name="name" value="{{$editProduct->name}}" />
            </div>
            <div class="form-group">
                <label>Mô Tả</label>
                <textarea class="form-control" rows="4" name="description">{{$editProduct->description}}</textarea>
            </div>
            <div class="form-group">
                <label>Giá gốc</label>
                <input class="form-control" name="unitprice" value="{{$editProduct->unit_price}}" />
            </div>
            <div class="form-group">
                <label>Giá khuyến mãi</label>
                <input class="form-control" name="promotionprice" value="{{$editProduct->promotion_price}}" />
            </div>
            <div class="form-group">
                <label>Hình ảnh</label>
                <p>
                    <img src="resources/FrontEnd/image/product/{{$editProduct->image}}" height="250px"
                        alt="{{$editProduct->image}}" />
                </p>
                <input type="file" class="form-control" name="image" />
            </div>
            <div class="form-group">
                <label>Hình thức</label>
                <select class="form-control" name="unit">
                    <option value="hộp" selected>Hộp</option>
                    <option value="cái">Cái</option>
                </select>
            </div>
            <div class="form-group">
                <label>Sản phẩm mới?</label>
                <div class="form-group">
                    <label class="radio-inline">
                        <input name="new" value="1" checked="" type="radio" selected>Sản phẩm mới
                    </label>
                    <label class="radio-inline">
                        <input name="new" value="0" type="radio">Sản phẩm cũ
                    </label>
                </div>
            </div>
            <button type="submit" class="btn btn-success">Cập nhật</button>
            <button type="reset" class="btn btn-success">Nhập lại</button>
        </form>
    </div>
</div>
@endsection