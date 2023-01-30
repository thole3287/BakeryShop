@extends("Layout.masterAdmin")
@section("content")
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Danh sách khách hàng
            <small>Danh sách</small>
        </h1>
    </div>
    <!-- /.col-lg-12 -->
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
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
        <thead>
            <tr align="center">
                <th>Mã khách hàng</th>
                <th >Tên khách hàng</th>
                <th>Giới tính</th>
                <th>Email</th>
                <th>Địa chỉ</th>
                <th>Số điện thoại</th>
                <th>Ghi chú</th>
                <th>Chỉnh sửa</th>
                <th>Xóa</th>
            </tr>
        </thead>
        <tbody>
            @foreach($customers as $customer)
                <tr class="odd gradeX" align="center">
                    <td style="vertical-align: middle;">{{$customer->id}}</td>
                    <td style="vertical-align: middle;">{{$customer->name}} </td>
                    <td style="vertical-align: middle;">{{$customer->gender}} </td>
                    <td style="vertical-align: middle;">{{$customer->email}}</td>
                    <td style="vertical-align: middle;">{{$customer->address}}</td>
                    <td style="vertical-align: middle;">{{$customer->phone_number}}</td>
                    <td style="vertical-align: middle;">{{$customer->note}}</td>
                    <td class="center" style="vertical-align: middle;" width="80"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('editcustomer',$customer->id)}}">Edit</a></td>
                    <td class="center" style="vertical-align: middle;" width="80"><i class="fa fa-trash-o  fa-fw" style="color:red"></i><a href="{{route('removsecustomer',$customer->id)}}"> Delete</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<!-- /.row -->
@endsection