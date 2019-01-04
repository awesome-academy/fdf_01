@extends('layouts.user.master')
@section('content')

<hr>
    <div class="container bootstrap snippet">
        <div class="row">
            <div class="col-sm-10">
                <h1>{!! $user->name !!}</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">

                <div class="text-center">
                    <img src="/source/image/user/{!! $user -> avatar !!}" class="avatar img-circle img-thumbnail" alt="avatar">
                </div></hr><br>

                <ul class="list-group">
                    <li class="list-group-item text-muted">@lang('profile_page.info')</li>
                    <li class="list-group-item "><strong>@lang('profile_page.name')&nbsp&nbsp{!! $user->name !!}</strong></li>
                    <li class="list-group-item "><strong>@lang('profile_page.email')&nbsp&nbsp{!! $user->email !!}</strong></li>
                    <li class="list-group-item "><strong>@lang('profile_page.phone')&nbsp&nbsp{!! $user->phone_number !!}</strong></li>
                    @if($user->gender == @config('settings.genderMen'))
                        <li class="list-group-item "><strong><span>@lang('profile_page.gender')&nbsp&nbsp</span>@lang('profile_page.gender_male')</strong></li>
                    @else
                        <li class="list-group-item "><strong><span>@lang('profile_page.gender')&nbsp&nbsp</span>@lang('profile_page.gender_female')</strong></li>
                    @endif
                    <li class="list-group-item "><strong>@lang('profile_page.address')&nbsp&nbsp{!! $user->address !!}</strong></li>
                </ul>

                <div class="panel panel-default">
                    <div class="panel-body">
                        <i class="fa fa-facebook fa-2x"></i> <i class="fa fa-github fa-2x"></i> <i class="fa fa-twitter fa-2x"></i> <i class="fa fa-pinterest fa-2x"></i> <i class="fa fa-google-plus fa-2x"></i>
                    </div>
                </div>

            </div><!--/col-3-->
            <div class="col-sm-9">
                <ul class="nav nav-tabs">
                    <li class="active"  ><a data-toggle="tab" href="#order">@lang('profile_page.his_order')</a></li>
                    <li><a data-toggle="tab" href="#card">@lang('profile_page.his_card')</a></li>
                    <li><a data-toggle="tab" href="#profile">@lang('profile_page.edit_profile')</a></li>
                </ul>


                <div class="tab-content">
                    <div class="tab-pane active" id="order">

                        <h2></h2>

                        <hr>
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                            <tr class="text-center">
                                <th>@lang('profile_page.id_his')</th>
                                <th>@lang('profile_page.name_product')</th>
                                <th>@lang('profile_page.image_product')</th>
                                <th>@lang('profile_page.quantity')</th>
                                <th>@lang('profile_page.date')</th>
                            </tr>
                            </thead>
                            @foreach($orders as $order)
                            <tbody>
                            <tr class="odd gradeX text-center">
                                <td>{!! $order -> id !!}</td>
                                <td>{!! $order -> name_product !!}</td>
                                <td>
                                    <img class="historyimg" src="/source/image/product/{!! $order->image_product  !!}">
                                </td>
                                <td>{!! $order -> qty !!}</td>
                                <td>{!! $order -> date !!}</td>
                            </tr>
                            </tbody>
                            @endforeach
                        </table>

                    </div>
                    <div class="tab-pane" id="card">

                        <hr>
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">

                        </table>
                    </div>
                    <div class="tab-pane" id="profile">
                    <hr>
                        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Edit Profile</button>

                        <div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">@lang('profile_page.update_profile')</h4>
                                    </div>
                                    <div class="modal-body">
                                        @include('common.errors')

                                        {!! Form::open(['method'=>'PUT', 'route' => ['profile.update', auth()->user()->id], 'files' => true]) !!}
                                        @csrf

                                            <div class="form-group">
                                                {!! Form::label('email', trans('profile_page.email')) !!}
                                                {!! Form::text('email', auth() -> user() -> email, ['class'=>'form-control', 'placeholder' => trans('profile_page.place_email'), 'readonly' => '']) !!}
                                            </div>

                                            <div class="form-group">
                                                {!! Form::label('name', trans('profile_page.name')) !!}
                                                {!! Form::text('txtName', auth() -> user() -> name, ['class'=>'form-control', 'placeholder' => trans('profile_page.place_name')]) !!}
                                            </div>

                                            <div class="form-group">
                                                {!! Form::label('password', trans('profile_page.password')) !!}
                                                {!! Form::password('txtPassword', ['class' => 'form-control', 'placeholder'=> trans('profile_page.place_pass')]) !!}
                                            </div>

                                            <div class="form-group">
                                                {!! Form::label('passwordAgain', trans('profile_page.password_again')) !!}
                                                {!! Form::password('txtConfirm', ['class' => 'form-control', 'placeholder'=> trans('profile_page.place_pass')]) !!}
                                            </div>

                                            <div class="form-group">
                                                {!! Form::label('phone_number', trans('profile_page.phone')) !!}
                                                {!! Form::text('txtPhone', auth() -> user() -> phone_number, ['class'=>'form-control', 'placeholder' => trans('profile_page.place_phone')]) !!}
                                            </div>

                                            <div class="form-group">
                                                {!! Form::label('gender', trans('profile_page.gender')) !!}
                                                {!! Form::select('txtGender', ['1'=> trans('profile_page.gender_male'),
                                                                               '2'=> trans('profile_page.gender_female')],
                                                                                     auth()->user()->gender, [
                                                                                   'class'=>'form-control'
                                                                                    ])
                                                                               !!}
                                            </div>
                                            <div class="form-group">
                                                {!! Form::label('address', trans('profile_page.address')) !!}
                                                {!! Form::text('txtAddress', auth() -> user() -> address, ['class'=>'form-control', 'placeholder' => trans('profile_page.place_address')]) !!}
                                            </div>

                                            <div class="form-group">
                                                {!! Form::label('image', trans('profile_page.address')) !!}
                                                {!! Form::file('image', ['class'=>'form-control']) !!}
                                            </div>

                                            {!! Form::submit(trans('profile_page.edit'), ['class'=>'btn btn-default']) !!}
                                            {!! Form::reset(trans('profile_page.reset'), ['class'=>'btn btn-default']) !!}
                                        {!! Form::close() !!}

                                    </div>
                                    <div class="modal-footer">
                                        {!! Form::submit(trans('profile_page.close'), ['class'=>'btn btn-default', 'data-dismiss' => 'modal']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>

                    <hr>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
