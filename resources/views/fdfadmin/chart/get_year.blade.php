@extends('layouts.admin.master')
@section('content')
<div id="page-wrapper">
    {{ Html::style(asset('/css/chart/bar.css')) }}
    {{ Html::script('https://code.jquery.com/jquery-3.1.1.min.js') }}
    {{ Html::script('https://code.highcharts.com/highcharts.js') }}
    {{ Html::script('https://code.highcharts.com/highcharts-more.js') }}
    {{ Html::script('https://code.highcharts.com/modules/exporting.js') }}
    @include('common.errors')
    <div id="container" data-order="{{ $orderYear }}"></div>
    <button id="plain">@lang('chart.plain')</button>
    <button id="inverted">@lang('chart.inverted')</button>
    <button id="polar">@lang('chart.polar')</button>

    {{ Html::script('/js/chart/bar.js') }}
</div>
@endsection
