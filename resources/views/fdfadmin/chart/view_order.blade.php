@extends('layouts.admin.master')
@section('content')
<div id="page-wrapper">
    {{ Html::style(asset('/css/chart/pie.css')) }}
    {{ Html::script('https://code.jquery.com/jquery-3.1.1.min.js') }}
    {{ Html::script('https://code.highcharts.com/highcharts.js') }}
    {{ Html::script('https://code.highcharts.com/modules/exporting.js') }}
    {{ Html::script('https://code.highcharts.com/modules/export-data.js') }}

    <div id="container" data-order="{{ $productBuy }}" class="pie-style"></div>
    <div>
        <h4 class="style-center">@lang('chart.name') {{ $date_range }} </h4>
    </div>

    {{ Html::script('/js/chart/pie.js') }}
</div>
@endsection
