@extends('layouts.admin.master')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">@lang('order.orderlist')
                    <small>@lang('order.list')</small>
                </h1>
            </div>

            @include('common.errors')

            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>@lang('order.id')</th>
                        <th>@lang('order.customer_name')</th>
                        <th>@lang('order.address')</th>
                        <th>@lang('order.date_order')</th>
                        <th>@lang('order.email')</th>
                        <th>@lang('order.status')</th>
                        <th>@lang('order.action')</th>
                        <th>@lang('order.delete')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orderList as $order)
                        <tr class="odd gradeX" align="center">
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->fullname }}</td>
                            <td>{{ $order->address }}</td>
                            <td>{{ $order->date_order }}</td>
                            <td>{{ $order->email }}</td>
                            <td>{{ $order->status }}</td>
                            <td>
                                <a href="{{ route('managing-order.edit', $order->id) }}">
                                    @lang('order.detail')
                                </a>
                            </td>
                            <td class="center">
                                {!! Form::open(['method'=>'DELETE', 'route'=>['managing-order.destroy', $order->id]]) !!}
                                    <i class="fa fa-trash-o fa-fw"></i>
                                    {!! Form::submit(trans('order.delete'), ['data-confirm'=>trans('admin_page.confirm_delete'), 'class'=>'form-style']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
