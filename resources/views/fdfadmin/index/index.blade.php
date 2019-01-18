@extends('layouts.admin.master')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">@lang('admin_profile.change')
                    <small>@lang('admin_profile.your_profile')</small>
                </h1>
            </div>
            <div class="col-lg-7 style-admin">
                @include('common.errors')
                {!! Form::open(['method'=>'POST', 'route' => ['admin.store', $adminProfile->id] , 'enctype' => 'multipart/form-data']) !!}
                    <div class="form-group">
                        {!! Form::label('email', trans('admin_profile.email')) !!}
                        {!! Form::text('email', $adminProfile->email, ['class'=>'form-control', 'placeholder' => trans('admin_profile.place_email'), 'readonly']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('name', trans('admin_profile.name')) !!}
                        {!! Form::text('txtName', $adminProfile->name, ['class'=>'form-control', 'placeholder' => trans('admin_profile.place_name')]) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('avatar', trans('admin_profile.avatar')) !!}
                        @if($adminProfile->avatar != '')
                            @php
                                $urlImg = '/images/user/avatar/'.$adminProfile->avatar;
                            @endphp
                            <img src="{{ $urlImg }}" alt="This is image" class="img-avatar-index" />
                        @endif
                        {!! Form::file('txtAvatar', ['class'=>'form-control-file', 'id'=>'exampleFormControlFile1']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('phone_number', trans('admin_profile.phone_number')) !!}
                        {!! Form::text('txtPhone', $adminProfile->phone_number, ['class'=>'form-control', 'placeholder' => trans('admin_profile.place_phone')]) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('gender', trans('admin_profile.gender')) !!}
                        {!! Form::select('txtGender', [ config('setting.male') => trans('admin_profile.male'), config('setting.female') => trans('admin_profile.female')], null, ['id' => 'exampleFormControlSelect1', 'class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('address', trans('admin_profile.address')) !!}
                        {!! Form::text('txtAddress', $adminProfile->address, ['class'=>'form-control', 'placeholder' => trans('admin_profile.place_address')]) !!}
                    </div>

                    {!! Form::submit(trans('admin_profile.user_update'), ['class'=>'btn btn-default']) !!}

                    {!! Form::reset(trans('admin_profile.reset'), ['class'=>'btn btn-default']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
