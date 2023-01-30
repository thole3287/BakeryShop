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
        <style>
            .center{
                vertical-align: middle !important;
            }
        </style>
</head>

<body>
    <div id="wrapper">
        <!-- Navigation -->
        @include('Layout.navigation')
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                @yield("content")
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="resources/BackEnd/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="resources/BackEnd/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="resources/BackEnd/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="resources/BackEnd/dist/js/sb-admin-2.js"></script>

    <!-- DataTables JavaScript -->
    <script src="resources/BackEnd/bower_components/DataTables/media/js/jquery.dataTables.min.js"></script>
    <script
        src="resources/BackEnd/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js">
    </script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true,
        });
        $('#dataTables-typeproduct').DataTable({
            responsive: true,
            pageLength: 4,
            order: [[0, 'asc']],
            lengthMenu: [4, 5, 10, 20, 50, 100, 200, 500],
            'columnDefs': [
                {
                    "targets": 0, // your case first column
                    "className": "text-center",
                    // "width": "15%"
            },
            {
                    "targets": 2,
                    "className": "text-justify",
            }
            ]
        });
        $('#dataTables-productlist').DataTable({
            responsive: true,
            pageLength: 4,
            order: [[0, 'asc']],
            lengthMenu: [4, 5, 10, 20, 50, 100, 200, 500],
        });
    });
    </script>
    
</body>

</html>