<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@lang('home_page.title') </title>
    <link href='http://fonts.googleapis.com/css?family=Dosis:300,400' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
    {{ Html::style(asset('http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css')) }}
    {{ Html::style(asset('/source/assets/dest/css/font-awesome.min.css')) }}
    {{ Html::style(asset('/source/assets/dest/vendors/colorbox/example3/colorbox.css')) }}
    {{ Html::style(asset('/source/assets/dest/rs-plugin/css/settings.css')) }}
    {{ Html::style(asset('/source/assets/dest/rs-plugin/css/responsive.css')) }}
    {{ Html::style(asset('/source/assets/dest/css/style.css')) }}
    {{ Html::style(asset('/source/assets/dest/css/animate.css')) }}
    {{ Html::style(asset('/source/assets/dest/css/huong-style.css')) }}
    {{ Html::style(asset('/css/login.css')) }}
    {{ Html::style(asset('/css/history.css')) }}
    {{ Html::style(asset('/css/style.css')) }}
</head>
<body>

    @include('layouts.user.header')

    <div class="rev-slider">
        @yield('content')
    </div>

    @include('layouts.user.footer')

    {{ Html::script(asset('/source/assets/dest/js/jquery.js')) }}
    {{ Html::script(asset('/source/assets/dest/vendors/jqueryui/jquery-ui-1.10.4.custom.min.js')) }}
    {{ Html::script(asset('http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js')) }}
    {{ Html::script(asset('/source/assets/dest/vendors/bxslider/jquery.bxslider.min.js')) }}
    {{ Html::script(asset('/source/assets/dest/vendors/colorbox/jquery.colorbox-min.js')) }}
    {{ Html::script(asset('/source/assets/dest/vendors/animo/Animo.js')) }}
    {{ Html::script(asset('/source/assets/dest/vendors/dug/dug.js')) }}
    {{ Html::script(asset('/source/assets/dest/js/scripts.min.js')) }}
    {{ Html::script(asset('/source/assets/dest/rs-plugin/js/jquery.themepunch.tools.min.js')) }}
    {{ Html::script(asset('/source/assets/dest/rs-plugin/js/jquery.themepunch.revolution.min.js')) }}
    {{ Html::script(asset('/source/assets/dest/js/waypoints.min.js')) }}
    {{ Html::script(asset('/source/assets/dest/js/wow.min.js')) }}
    {{ Html::script(asset('/source/assets/dest/js/custom2.js')) }}
    {{ Html::script(asset('/source/assets/dest/js/jqueryfooter.js')) }}

</body>
</html>
