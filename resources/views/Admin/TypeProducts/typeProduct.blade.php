@extends("Layout.masterAdmin")
@section("content")
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Danh sách loại sản phẩm
            <small>Danh sách</small>
        </h1>
    </div>
                
    <!-- /.col-lg-12 -->
    <table class="table table-striped table-bordered table-hover" id="dataTables-typeproduct">
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
            <tr align="center" style="text-align: center;">
                <th style="vertical-align: middle;">Mã sản phẩm</th>
                <th style="vertical-align: middle;">Tên loại sản phẩm</th>
                <th style="vertical-align: middle;">Mô tả</th>
                <th class="center">Hình</th>
                <th style="vertical-align: middle;">Cập nhật</th>
                <th style="vertical-align: middle;">Xóa</th>
            </tr>
        </thead>
        <tbody>
            @foreach($typeProduct as $typeOfProduct)
                <tr class="odd gradeX" align="center" >
                    <td style="vertical-align: middle;">{{$typeOfProduct->id}}</td>
                    <td style="vertical-align: middle;">{{$typeOfProduct->name}}</td>
                    <td width="250" style="vertical-align: middle;">{{$typeOfProduct->description}}</td>
                    <td style="vertical-align: middle;"><img src="resources/FrontEnd/image/product/{{$typeOfProduct->image}}" alt="Hình sản phẩm" width="150"></td>
                    <td class="center" style="vertical-align: middle;"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('edittypeproduct', $typeOfProduct->id)}}">Edit</a></td>
                    <td class="center" style="vertical-align: middle;"><i class="fa fa-trash-o  fa-fw" style="color:red"></i><a href="{{route('removetypeproduct', $typeOfProduct->id)}}"> Delete</a></td>
                    <!-- <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('editbill', $typeOfProduct->id)}}">Cập nhật</a></td> -->
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<!-- /.row -->
@endsection
