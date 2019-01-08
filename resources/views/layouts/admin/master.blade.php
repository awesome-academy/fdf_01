<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="">
    <title>Admin - Food & Drink</title>

    {{ Html::style(asset('/layouts/admin/bower_components/bootstrap/dist/css/bootstrap.min.css')) }}
    {{ Html::style(asset('/layouts/admin/bower_components/metisMenu/dist/metisMenu.min.css')) }}
    {{ Html::style(asset('/layouts/admin/dist/css/sb-admin-2.css')) }}
    {{ Html::style(asset('/layouts/admin/bower_components/font-awesome/css/font-awesome.min.css')) }}
    {{ Html::style(asset('/layouts/admin/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css')) }}
    {{ Html::style(asset('/layouts/admin/bower_components/datatables-responsive/css/dataTables.responsive.css')) }}
</head>

<body>

    <div id="wrapper">
    	<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            @include('layouts.admin.header')
    		@include('layouts.admin.left-bar')
    	</nav>
    		@yield('content')
    </div>

    {{ Html::script(asset('/layouts/admin/bower_components/jquery/dist/jquery.min.js')) }}
    {{ Html::script(asset('/layouts/admin/bower_components/bootstrap/dist/js/bootstrap.min.js')) }}
    {{ Html::script(asset('/layouts/admin/bower_components/metisMenu/dist/metisMenu.min.js')) }}
    {{ Html::script(asset('/layouts/admin/dist/js/sb-admin-2.js')) }}
    {{ Html::script(asset('/layouts/admin/bower_components/datatables/media/js/jquery.dataTables.min.js')) }}
    {{ Html::script(asset('/layouts/admin/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js')) }}

    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>

</body>

</html>
