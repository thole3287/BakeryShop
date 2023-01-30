@extends("Layout.masterAdmin")
@section("content")
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Danh sách slide
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
                <th>Mã slide</th>
                <th>Đường link</th>
                <th>Hình</th>
                <th>Sửa</th>
                <th>Xóa</th>
            </tr>
        </thead>
        <tbody>
            @foreach($slideList as $slide_List)
                <tr class="odd gradeX" align="center">
                    <td  style="vertical-align: middle;">{{$slide_List->id}}</td>
                    <td style="vertical-align: middle;"><a href="{{$slide_List->link}}"></a>{{$slide_List->link}}</td>
                    <td style="vertical-align: middle;"><img src="resources/FrontEnd/image/slide/{{$slide_List->image}}" alt="{{$slide_List->image}}" width="150"></td>
                    <td class="center" style="vertical-align: middle;"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('editslide', $slide_List->id)}}">Edit</a></td>
                    <td class="center" style="vertical-align: middle;" width="80"><i class="fa fa-trash-o  fa-fw" style="color:red"></i><a href="{{route('removeslide', $slide_List->id)}}"> Delete</a></td>
                    <!-- <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('editbill',   $slide_List->id)}}">Cập nhật</a></td> -->
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<!-- /.row -->
@endsection