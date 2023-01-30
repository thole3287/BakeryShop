<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Khóa Học Lập Trình Laravel Framework 5.x Tại Trung Tâm">
    <meta name="author" content="">
    <title>Admin - Trung Tâm</title>
    <base href="{{asset('')}}">
    <!-- Bootstrap Core CSS -->
    <link href="resources/BackEnd/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="resources/BackEnd/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="resources/BackEnd/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="resources/BackEnd/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet"
        type="text/css">

    <!-- DataTables CSS -->
    <link href="resources/BackEnd/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css"
        rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="resources/BackEnd/bower_components/datatables-responsive/css/dataTables.responsive.css"
        rel="stylesheet">
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Vui Lòng Đăng Nhập</h3>
                        @if(Session::has('matb'))
							@if(Session::get('matb')=='0')
								<div class="alert alert-danger">{{Session::get('noidung')}}</div>
							@endif
                        @endif
                    </div>
                    <div class="panel-body">
                        <form role="form" action="{{route('adminlogin')}}" method="POST">
                            {{csrf_field()}}
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Địa chỉ hộp thư" name="email" type="email"
                                        autofocus>
                                    @if($errors->has('email'))
                                    <label style="color:red">{{$errors->first('email')}}</label>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Mật Khẩu" name="password" type="password"
                                        value="">
                                    @if($errors->has('password'))
                                    <label style="color:red">{{$errors->first('password')}}</label>
                                    @endif
                                </div>
                                <button type="submit" class="btn btn-lg btn-success btn-block">Đăng Nhập</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>