@extends('layouts.user.master')
@section('content')
<div class="container">
    <div id="content">
        {!! Form::open(['method'=>'POST', 'route'=>'login.store', 'class'=>'beta-form-checkout']) !!}
            <div class="row">
                <div class="col-sm-3"></div>
                @include('common.errors')
                <div class="col-sm-6">
                    <h4>@lang('auth.login')</h4>
                    <div class="space20">&nbsp;</div>
                    <div class="form-block">
                    	{!! Form::label('email', trans('auth.email')) !!}
                    	{!! Form::text('txtEmail', '', ['id'=>'email']) !!}
                    </div>
                    <div class="form-block">
                        {!! Form::label('password', trans('auth.password')) !!}
                        {!! Form::password('txtPassword', ['id'=>'password']) !!}
                    </div>
                    <div class="form-block">
                        {!! Form::submit(trans('auth.login'), ['class'=>'btn btn-primary']) !!}
                    </div>
                </div>
                <div class="col-sm-3"></div>
            </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection
