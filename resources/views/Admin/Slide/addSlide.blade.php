@extends("Layout.masterAdmin")
@section("content")
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Thêm hình ảnh slide
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
        <form action="{{route('addslide')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Đường link</label>
                <input class="form-control" name="link" placeholder="Please Enter Link" />
            </div>
            <div class="form-group">
                <label>Hình</label>
                <input type="file" class="form-control" name="image" placeholder="Choose file" />
            </div>
            <button type="submit" class="btn btn-success">Thêm ảnh slide mới</button>
            <button type="reset" class="btn btn-success">Nhập lại</button>
            <form>
    </div>
</div>
@endsection