@extends('layouts.admin.master')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">@lang('managing_user.user')
                    <small>@lang('managing_user.list')</small>
                </h1>
            </div>

            @include('common.errors')

            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>@lang('managing_user.id')</th>
                        <th>@lang('managing_user.name')</th>
                        <th>@lang('managing_user.email')</th>
                        <th>@lang('managing_user.phone_number')</th>
                        <th>@lang('managing_user.gender')</th>
                        <th>@lang('managing_user.address')</th>
                        <th>@lang('managing_user.avatar')</th>
                        <th>@lang('managing_user.date_create')</th>
                        <th>@lang('managing_user.delete')</th>
                        <th>@lang('managing_user.edit')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($userList as $user)
                        <tr class="odd gradeX" align="center">
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone_number }}</td>
                            <td>{{ $user->gender }}</td>
                            <td>{{ $user->address }}</td>
                            <td>
                                @if($user->avatar != '')
                                    @php
                                        $urlImg = '/images/user/avatar/'.$user->avatar;
                                    @endphp
                                    <img src="{{ $urlImg }}" alt="This is image" class="img-avatar-index" />
                                @endif
                            </td>
                            <td>{{ $user->created_at }}</td>
                            <td class="center">
                                {!! Form::open(['method'=>'DELETE', 'route'=>['managing-user.destroy', $user->id]]) !!}
                                    <i class="fa fa-trash-o fa-fw"></i>
                                    {!! Form::submit(trans('managing_user.delete'), ['data-confirm'=>trans('admin_page.confirm_delete'), 'class'=>'form-style']) !!}
                                {!! Form::close() !!}
                            </td>

                            <td class="center">
                                {!! Form::open(['method'=>'GET', 'route'=>['managing-user.edit', $user->id]]) !!}
                                    <i class="fa fa-pencil fa-fw"></i>
                                    {!! Form::submit(trans('managing_user.edit'), ['class'=>'form-style']) !!}
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
