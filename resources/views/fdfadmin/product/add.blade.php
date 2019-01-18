@extends('layouts.admin.master')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">@lang('managing_product.product')
                    <small>@lang('managing_product.add')</small>
                </h1>
            </div>
            <div class="col-lg-7" style="padding-bottom:120px">
                @include('common.errors')
                {!! Form::open(['method'=>'POST', 'route'=>'managing-product.store', 'enctype' => 'multipart/form-data']) !!}
                    <div class="form-group">
                        {!! Form::label('name', trans('managing_product.name')) !!}
                        {!! Form::text('txtName', '', ['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('description', trans('managing_product.description')) !!}
                        {!! Form::text('txtDescription', '', ['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('price', trans('managing_product.price')) !!}
                        {!! Form::text('txtPrice', '', ['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('quantity', trans('managing_product.quantity')) !!}
                        {!! Form::text('txtQuantity', '', ['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('avatar', trans('managing_product.avatar')) !!}
                        {!! Form::file('txtAvatar', ['class'=>'form-control-file', 'id'=>'exampleFormControlFile1']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('cat', trans('managing_product.categories')) !!}
                        {!! Form::select('txtCategory', $catList->pluck('name', 'id'), null , ['class'=>'form-control']) !!}
                    </div>

                    {!! Form::submit(trans('managing_product.add'), ['class'=>'btn btn-default']) !!}
                    {!! Form::reset(trans('managing_product.reset'), ['class'=>'btn btn-default']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
