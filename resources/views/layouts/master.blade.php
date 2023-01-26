<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title','laravel')</title>

    <!-- Core CSS - Include with every page -->
    <link href="{{url('')}}/admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{url('')}}/admin/font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Page-Level Plugin CSS - Dashboard -->
    <link href="{{url('')}}/admin/css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">
    <link href="{{url('')}}/admin/css/plugins/timeline/timeline.css" rel="stylesheet">

    <!-- SB Admin CSS - Include with every page -->
    <link href="{{url('')}}/admin/css/sb-admin.css" rel="stylesheet">
    {{-- datatale  --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">


</head>

<body>

    <div id="wrapper">
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Admin panel</a>
            </div>

            @include('layouts.inc.navbar')

            @include('layouts.inc.sidebar')

        </nav>
        @yield('content')

    </div>
    <!-- /#wrapper -->

    <!-- Core Scripts - Include with every page -->
    <script src="{{url('')}}/admin/js/jquery-1.10.2.js"></script>
    <script src="{{url('')}}/admin/js/bootstrap.min.js"></script>
    <script src="{{url('')}}/admin/js/plugins/metisMenu/jquery.metisMenu.js"></script>

    <!-- Page-Level Plugin Scripts - Dashboard -->
    <script src="{{url('')}}/admin/js/plugins/morris/raphael-2.1.0.min.js"></script>
    <script src="{{url('')}}/admin/js/plugins/morris/morris.js"></script>

    <!-- SB Admin Scripts - Include with every page -->
    <script src="{{url('')}}/admin/js/sb-admin.js"></script>

    <!-- Page-Level Demo Scripts - Dashboard - Use for reference -->
    {{-- <script src="{{url('')}}/admin/js/demo/dashboard-demo.js"></script> --}}

    {{-- datatable  --}}
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

    <script>
       $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script>

    
</body>

</html>
