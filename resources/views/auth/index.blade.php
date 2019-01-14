@extends('layouts.user.master')
@section('content')
<div class="container">
    <div class="omb_login">
        <h3 class="omb_authTitle">@lang('auth.login_or') <a href="#">@lang('auth.sign_up')</a></h3>
        <div class="row omb_row-sm-offset-3 omb_socialButtons">
            <div class="col-xs-4 col-sm-2">
                <a href="redirect/facebook" class="btn btn-lg btn-block omb_btn-facebook">
                    <i class="fa fa-facebook visible-xs"></i>
                    <span class="hidden-xs">@lang('auth.facebook')</span>
                </a>
            </div>
            <div class="col-xs-4 col-sm-2">
                <a href="redirect/twitter" class="btn btn-lg btn-block omb_btn-twitter">
                    <i class="fa fa-twitter visible-xs"></i>
                    <span class="hidden-xs">@lang('auth.twitter')</span>
                </a>
            </div>
            <div class="col-xs-4 col-sm-2">
                <a href="redirect/google" class="btn btn-lg btn-block omb_btn-google">
                    <i class="fa fa-google-plus visible-xs"></i>
                    <span class="hidden-xs">@lang('auth.google')</span>
                </a>
            </div>
        </div>

        <div class="row omb_row-sm-offset-3 omb_loginOr">
            <div class="col-xs-12 col-sm-6">
                <hr class="omb_hrOr">
                <span class="omb_spanOr">@lang('auth.or')</span>
            </div>
        </div>
        <div class="row omb_row-sm-offset-3">
            <div class="col-xs-12 col-sm-6">
                {!! Form::open(['method'=>'POST', 'route'=>'login.store', 'class'=>'omb_loginForm']) !!}

                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        {!! Form::text('txtEmail', '', ['id'=>'email', 'class'=>'form-control', 'placeholder'=>trans('auth.email')]) !!}
                    </div>
                    <span class="help-block"></span>

                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                        {!! Form::password('txtPassword', ['id'=>'password', 'class'=>'form-control', 'placeholder'=>trans('auth.password')]) !!}
                    </div>

                    <br />
                    <br />

                    @include('common.errors')

                    {!! Form::submit(trans('auth.login'), ['class'=>'btn btn-lg btn-primary btn-block']) !!}

                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <div class="space_line"></div>
</div>
@endsection
