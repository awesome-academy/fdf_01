<div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">@lang('admin_page.dashboard')</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="index.html">@lang('admin_page.title')</a>
</div>
<div class="dropdown style-dropdown">
    <a href="#" onclick="return mark({{ count(Auth()->user()->unreadNotifications)}})" role="button" data-toggle="dropdown" id="dropdownMenu1" data-target="#" class="style-onclick-a" aria-expanded="true">
        <i class="fa fa-bell-o style-font">
        </i>
    </a>
    <span class="badge badge-danger">{{ count(Auth()->user()->unreadNotifications)}}</span>
    <ul class="dropdown-menu dropdown-menu-left pull-right" role="menu" aria-labelledby="dropdownMenu1">
        <li role="presentation">
            <a href="#" class="dropdown-menu-header">@lang('order.notification')</a>
        </li>
        @foreach(Auth()->user()->Notifications as $notification)
        <ul class="timeline timeline-icons timeline-sm style-timeline">
            <li>
                <p>
                    @lang('order.order_new') {{$notification->data['user']['name']}} <a href="">Click để xem chi tiết</a>
                    <span class="timeline-icon"><i class="fa fa-archive"></i></span>
                    <span class="timeline-date">{{ $notification->created_at }}</span>
                </p>
            </li>
        </ul>
        @endforeach
        <li role="presentation">
            <a href="#" class="dropdown-menu-header"></a>
        </li>
    </ul>
</div>
<ul class="nav navbar-top-links navbar-right">
    <li>
        {!! Form::open(['method' => 'POST', 'route'=>['switchLang'] ]) !!}
            {!! Form::select
                (
                    'locale',
                    ['en' => trans('home_page.lang.en'),
                     'vi' => trans('home_page.lang.vi')],
                      Lang::locale() === 'vi' ? 'vi' : 'en' ,
                    ['onchange'=>'this.form.submit()',
                     'class'=>'form-control']
                )
            !!}
        {!! Form::close() !!}
    </li>
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            @lang('home_page.account') {{ Auth::user()->name }} <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
        </a>
        <ul class="dropdown-menu dropdown-user">
            <li><a href="#"><i class="fa fa-user fa-fw"></i> @lang('admin_page.profile') </a>
            </li>
            <li><a href="#"><i class="fa fa-gear fa-fw"></i> @lang('admin_page.setting') </a>
            </li>
            <li class="divider"></li>
            <li><a href="{{ route('logout.create') }}"><i class="fa fa-sign-out fa-fw"></i> @lang('admin_page.logout') </a>
            </li>
        </ul>
    </li>
</ul>
