@extends("Layout.masterAdmin")
@section("content")
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Thêm sản phẩm
            <small>Thêm</small>
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
        <form action="{{route('addproduct')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Loại sản phẩm</label>
                <select class="form-control" name="loaisanpham">
                    @foreach($typeProduct as $typeProduct)
                        <option value="{{$typeProduct->id}}">{{$typeProduct->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Tên sản phẩm</label>
                <input class="form-control" name="name" placeholder="Please Enter Category Name" />
            </div>
            <div class="form-group">
                <label>Mô tả</label>
                <textarea class="form-control" name="description" rows="3" placeholder="Please Enter Category Description"></textarea>            </div>
            <div class="form-group">
                <label>Giá gốc</label>
                <input class="form-control" name="unitprice" placeholder="Please Enter Unit Price" />
            </div>
            <div class="form-group">
                <label>Giá khuyến mãi</label>
                <input class="form-control" name="promotionprice" placeholder="Please Enter Promotion Price" />
            </div>
            <div class="form-group">
                <label>Hình</label>
                <input type="file" class="form-control" name="image" placeholder="Choose file" />
            </div>
            <div class="form-group">
                <label>Hình thức</label>
                <select class="form-control" name="unit">
                        <option value="hộp" selected>Hộp</option>
                        <option value="cái">Cái</option>
                </select>
            </div>
            <!-- <div class="form-group">
                <label>Hình thức</label>
                <input class="form-control" name="unit" placeholder="Please Enter Unit" />
            </div> -->
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
            <!-- <div class="form-group">
                <label>Sản phẩm mới (1 hoặc 0)</label>
                <input class="form-control" name="new" placeholder="Please Enter New Product" />
            </div> -->
            <button type="submit" class="btn btn-success">Thêm sản phẩm</button>
            <button type="reset" class="btn btn-success">Nhập lại</button>
            <form>
    </div>
</div>
@endsection