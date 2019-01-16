@extends('layouts.admin.master')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">@lang('managing_product.product')
                    <small>@lang('managing_product.edit')</small>
                </h1>
            </div>
            <div class="col-lg-7" style="padding-bottom:120px">
                @include('common.errors')
                {!! Form::open(['method'=>'PUT', 'route'=>['managing-product.update', $productList->id], 'enctype' => 'multipart/form-data']) !!}
                    <div class="form-group">
                        {!! Form::label('name', trans('managing_product.name')) !!}
                        {!! Form::text('txtName', $productList->name, ['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('description', trans('managing_product.description')) !!}
                        {!! Form::text('txtDescription', $productList->description, ['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('price', trans('managing_product.price')) !!}
                        {!! Form::text('txtPrice', $productList->price, ['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('quantity', trans('managing_product.quantity')) !!}
                        {!! Form::text('txtQuantity', $productList->quantity, ['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('avatar', trans('managing_product.avatar')) !!}
                        @if($productList->avatar != '')
                            @php
                                $urlImg = '/images/product/avatar/'.$productList->avatar;
                            @endphp
                            <img src="{{ $urlImg }}" alt="This is image" class="img-avatar-index" />
                        @endif
                        {!! Form::file('txtAvatar', ['class'=>'form-control-file', 'id'=>'exampleFormControlFile1']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('cat', trans('managing_product.categories')) !!}
                        {!! Form::select('txtCategory', $catList->pluck('name', 'id'), null , ['class'=>'form-control']) !!}
                    </div>

                    {!! Form::submit(trans('managing_product.edit'), ['class'=>'btn btn-default']) !!}
                    {!! Form::reset(trans('managing_product.reset'), ['class'=>'btn btn-default']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
