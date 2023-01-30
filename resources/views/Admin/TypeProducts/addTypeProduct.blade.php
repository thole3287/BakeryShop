@extends("Layout.masterAdmin")
@section("content")
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Thêm loại sản phẩm
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
        @elseif(Session::has("loi"))
            <div class="alert alert-danger">{{Session::get("loi")}}</div>
        @endif
        <form action="{{route('addtypeproduct')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Tên Phân Loại</label>
                <input class="form-control" name="name" placeholder="Please Enter Category Name" />
            </div>
            <div class="form-group">
                <label>Mô Tả</label>
                <input class="form-control" name="description" placeholder="Please Enter Category Decription" />
            </div>
            <div class="form-group">
                <label>Hình Loại Sản Phẩm</label>
  
                <input type="file" class="form-control" name="image" placeholder="Choose file" />
            </div>
            <button type="submit" class="btn btn-success">Thêm Phân Loại</button>
            <button type="reset" class="btn btn-success">Nhập Lại</button>
            <form>
    </div>
</div>
@endsection