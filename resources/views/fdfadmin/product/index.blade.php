@extends('layouts.admin.master')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">@lang('managing_product.product')
                    <small>@lang('managing_product.list')</small>
                </h1>
            </div>

            @include('common.errors')

            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>@lang('managing_product.id')</th>
                        <th>@lang('managing_product.name')</th>
                        <th>@lang('managing_product.description')</th>
                        <th>@lang('managing_product.price')</th>
                        <th>@lang('managing_product.quantity')</th>
                        <th>@lang('managing_product.avatar')</th>
                        <th>@lang('managing_product.categories')</th>
                        <th>@lang('managing_product.status')</th>
                        <th>@lang('managing_product.date_create')</th>
                        <th>@lang('managing_product.delete')</th>
                        <th>@lang('managing_product.edit')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productList as $product)
                        <tr class="odd gradeX" align="center">
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->description }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->quantity }}</td>
                            <td>
                                @if($product->avatar != '')
                                    @php
                                        $urlImg = '/images/product/avatar/'.$product->avatar;
                                    @endphp
                                    <img src="{{ $urlImg }}" alt="This is image" class="img-avatar-index" />
                                @endif
                            </td>
                            <td>{{ $product->nameCate }}</td>
                            <td>
                                <label id="active{{$product->id}}">
                                    @if ($product->status == config('setting.status_active'))
                                        <img src="/images/product/status/active.gif" onclick="return ajaxToggleActiveStatus({{$product->id}}, {{ config('setting.status_active') }})"> @lang('managing_product.display')
                                    @else
                                        <img src="/images/product/status/deactive.gif" onclick="return ajaxToggleActiveStatus({{$product->id}}, {{ config('setting.status_deactive') }})"> @lang('managing_product.non-display')
                                    @endif
                                </label>
                            </td>
                            <td>{{ $product->created_at }}</td>
                            <td class="center">
                                {!! Form::open(['method'=>'DELETE', 'route'=>['managing-product.destroy', $product->id]]) !!}
                                    <i class="fa fa-trash-o fa-fw"></i>
                                    {!! Form::submit(trans('managing_product.delete'), ['data-confirm'=>trans('admin_page.confirm_delete'), 'class'=>'form-style']) !!}
                                {!! Form::close() !!}
                            </td>

                            <td class="center">
                                {!! Form::open(['method'=>'GET', 'route'=>['managing-product.edit', $product->id]]) !!}
                                    <i class="fa fa-pencil fa-fw"></i>
                                    {!! Form::submit(trans('managing_product.edit'), ['class'=>'form-style']) !!}
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
