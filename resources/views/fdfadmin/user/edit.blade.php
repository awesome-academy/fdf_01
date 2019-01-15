@extends('layouts.admin.master')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">@lang('managing_user.user')
                    <small>@lang('managing_user.user_edit')</small>
                </h1>
            </div>
            <div class="col-lg-7" style="padding-bottom:120px">
                @if (count($errors) > config('setting.default'))
                    <div class="alert alert-danger">
                        <strong>@lang('auth.whoops')</strong>

                        <br><br>

                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                {!! Form::open(['method'=>'PUT', 'route' => ['managing-user.update', $userList->id] , 'enctype' => 'multipart/form-data']) !!}
                    <div class="form-group">
                    	{!! Form::label('email', trans('managing_user.email')) !!}
                    	{!! Form::text('email', $userList->email, ['class'=>'form-control', 'placeholder' => trans('managing_user.place_email'), 'readonly']) !!}
                    </div>

                    <div class="form-group">
                    	{!! Form::label('password', trans('managing_user.password')) !!}
                    	{!! Form::password('txtPassword', ['class' => 'form-control', 'placeholder'=> trans('managing_user.place_password')]) !!}
                    </div>

                    <div class="form-group">
                    	{!! Form::label('name', trans('managing_user.name')) !!}
                        {!! Form::text('txtName', $userList->name, ['class'=>'form-control', 'placeholder' => trans('managing_user.place_name')]) !!}
                    </div>

                    <div class="form-group">
                    	{!! Form::label('phone_number', trans('managing_user.phone_number')) !!}
                        {!! Form::text('txtPhone', $userList->phone_number, ['class'=>'form-control', 'placeholder' => trans('managing_user.place_phone')]) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('gender', trans('managing_user.gender')) !!}
                        {!! Form::select('txtGender', [config('setting.male') => trans('managing_user.male'), config('setting.female')=> trans('managing_user.female')], null, ['id' => 'exampleFormControlSelect1', 'class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                    	{!! Form::label('address', trans('managing_user.address')) !!}
                        {!! Form::text('txtAddress', $userList->address, ['class'=>'form-control', 'placeholder' => trans('managing_user.place_address')]) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('role', trans('managing_user.role')) !!}
                        {!! Form::select('txtRole', [config('setting.user') => trans('managing_user.user'), config('setting.female') => trans('managing_user.admin')], null, ['class'=>'form-control']) !!}
                    </div>

                    {!! Form::submit(trans('managing_user.user_edit'), ['class'=>'btn btn-default']) !!}
                   	{!! Form::reset(trans('managing_user.reset'), ['class'=>'btn btn-default']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
