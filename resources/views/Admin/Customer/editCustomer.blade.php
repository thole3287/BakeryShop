@extends("Layout.masterAdmin")
@section("content")
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Sửa thông tin khách hàng
            <small>Loại {{$customers->name}}</small>
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
        <form action="{{route('editcustomer', $customers->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Tên khách hàng</label>
                <input class="form-control" name="name" value="{{$customers->name}}" />
            </div>
            <div class="form-group">
                <label>Giới tính</label>
                <input class="form-control" name="gender" value="{{$customers->gender}}" />
            </div>
            <div class="form-group">
                <label>Địa chỉ</label>
                <input class="form-control" name="address" value="{{$customers->address}}" />
            </div>
            <div class="form-group">
                <label>Số điện thoai</label>
                <input class="form-control" name="phone" value="{{$customers->phone_number}}" />
            </div>
            <div class="form-group">
                <label>Ghi chú</label>
                <textarea class="form-control" rows="4"  name="note">{{$customers->note}}</textarea>
            </div>
            <button type="submit" class="btn btn-success">Cập nhật</button>
            <button type="reset" class="btn btn-success">Nhập lại</button>
            <form>
    </div>
</div>
@endsection