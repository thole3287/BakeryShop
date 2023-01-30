@extends("Layout.masterAdmin")
@section("content")
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Danh sách sản phẩm
            <small>Danh sách</small>
        </h1>
    </div>
    <!-- /.col-lg-12 -->
    <table class="table table-striped table-bordered table-hover" id="dataTables-productlist">
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
        <thead>
            <tr align="center">
                <th>Mã SP</th>
                <th>Tên sản phẩm</th>
                <th>Mô tả</th>
                <th>Giá gốc</th>
                <th>Giá khuyến mãi</th>
                <th>Hình</th>
                <th>Hình thức</th>
                <th>Sửa</th>
                <th>Xóa</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productList as  $product_List)
                <tr class="odd gradeX" align="center">
                    <td  style="vertical-align: middle;">{{ $product_List->id}}</td>
                    <td style="vertical-align: middle;">{{ $product_List->name}}</td>
                    <td style="vertical-align: middle;" width="250">{{ $product_List->description}}</td>
                    <td style="vertical-align: middle;" width="120">{{number_format( $product_List->unit_price)}} đồng</td>
                    <td style="vertical-align: middle;" width="120">{{number_format( $product_List->promotion_price)}} đồng</td>
                    <td style="vertical-align: middle;"><img src="resources/FrontEnd/image/product/{{$product_List->image}}" alt="{{$product_List->image}}" width="150"></td>
                    <td style="vertical-align: middle;" width="50">{{ $product_List->unit}}</td>
                    <td class="center" style="vertical-align: middle;"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('editproduct', $product_List->id)}}">Edit</a></td>
                    <td class="center" style="vertical-align: middle;" width="80"><i class="fa fa-trash-o  fa-fw" style="color:red"></i><a href="{{route('removeproduct', $product_List->id)}}"> Delete</a></td>
                    <!-- <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('editbill',  $product_List->id)}}">Cập nhật</a></td> -->
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<!-- /.row -->
@endsection