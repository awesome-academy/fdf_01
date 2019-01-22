@extends('layouts.admin.master')
@section('content')
<div id="page-wrapper">
    <h1>
        @lang('order.order_detail')
    </h1>
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <div class="row">
                    <div class="col-md-12">
                        <div class="container col-md-6">
                            <h4></h4>
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th class="col-md-4">@lang('order.customer_info')</th>
                                    <th class="col-md-6"></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>@lang('order.customer_name')</td>
                                    <td>{{ $userInfo->name }}</td>
                                </tr>
                                <tr>
                                    <td>@lang('order.date_order')</td>
                                    <td>{{ $userInfo->date_order }}</td>
                                </tr>
                                <tr>
                                    <td>@lang('order.phone_number')</td>
                                    <td>{{ $userInfo->phone_number }}</td>
                                </tr>
                                <tr>
                                    <td>@lang('order.address')</td>
                                    <td>{{ $userInfo->address }}</td>
                                </tr>
                                <tr>
                                    <td>@lang('order.email')</td>
                                    <td>{{ $userInfo->email }}</td>
                                </tr>
                                <tr>
                                    <td>@lang('order.customer_note')</td>
                                    <td>{{ $userInfo->note }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <table id="myTable" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                            <thead>
                            <tr role="row">
                                <th class="sorting col-md-1" >@lang('order.stt')</th>
                                <th class="sorting_asc col-md-4">@lang('order.name_product')</th>
                                <th class="sorting col-md-2">@lang('order.quantity')</th>
                                <th class="sorting col-md-2">@lang('order.price')</th>
                            </thead>
                            <tbody>
                            @foreach($productInfor as $key => $product)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->amount }}</td>
                                    <td>{{ number_format($product->price) }} @lang('order.vnd')</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="3"><b>@lang('order.total')</b></td>
                                <td colspan="1"><b class="text-red">{{ number_format($userInfo->total_payment) }} @lang('order.vnd')</b></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-12">
                    {!! Form::open(['method'=>'PUT', 'route'=>['managing-order.update' , $getOrderId->id]]) !!}
                        <div class="col-md-8"></div>
                        <div class="col-md-4">
                            <div class="form-inline">
                                {!! Form::label('status', trans('order.status')) !!}
                                {!! Form::select('txtStatus',
                                    [config('setting.not_progress') => trans('order.not_progress'),
                                    config('setting.in_delivery') => trans('order.in_delivery'),
                                    config('setting.processed') => trans('order.processed'),
                                    config('setting.reject_order') => trans('order.reject')], null, ['class'=>'form-control']) !!}
                                {!! Form::submit(trans('order.fSubmit'), ['class'=>'btn btn-primary']) !!}
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
