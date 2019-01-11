@extends('layouts.user.master')
@section('content')
<div class="container">
    <div id="content">
        {!! Form::open(['method'=>'POST', 'route'=>'register.store', 'class'=>'beta-form-checkout' ]) !!}
            @include('common.errors')
            <div class="row">
                <div class="col-sm-3"></div>
                    <div class="col-sm-6">
                        <h4>@lang('register.register')</h4>
                        <div class="space20">&nbsp;</div>

                        <div class="form-block">
                            {!! Form::label('email', trans('register.email_address')) !!}
                            {!! Form::text('email', '', ['id'=>'email', 'required']) !!}
                        </div>

                        <div class="form-block">
                            {!! Form::label('fullname', trans('register.name')) !!}
                            {!! Form::text('txtName', '', ['id'=>'txtName', 'required']) !!}
                        </div>

                        <div class="form-block">
                            {!! Form::label('gender', trans('register.gender')) !!}
                            {!! Form::select('txtGender', ['1'=> trans('register.male'),
                            '2'=>trans('register.female')]) !!}
                        </div>

                        <div class="form-block">
                            {!! Form::label('address', trans('register.address') ) !!}
                            {!! Form::text('txtAddress', '', ['id'=>'txtAddress', 'requireds']) !!}
                        </div>

                        <div class="form-block">
                            {!! Form::label('phone', trans('register.phone_number')) !!}
                            {!! Form::text('txtPhone', '', ['id'=>'txtPhone', 'required']) !!}
                        </div>

                        <div class="form-block">
                            {!! Form::label('password', trans('register.password')) !!}
                            {!! Form::password('txtPassword', ['id'=>'txtPassword']) !!}
                        </div>

                        <div class="form-block">
                            {!! Form::label('re-password', trans('register.re_password')) !!}
                            {!! Form::password('txtConfirm', ['id'=>'txtConfirm']) !!}
                        </div>

                        <div class="form-block">
                            <button type="submit" class="btn btn-primary">@lang('register.register')</button>
                        </div>
                    </div>
                <div class="col-sm-3"></div>
            </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection
