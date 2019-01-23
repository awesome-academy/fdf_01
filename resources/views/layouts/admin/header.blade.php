<div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">>@lang('admin_page.dashboard')</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="index.html">@lang('admin_page.title')</a>
</div>

<ul class="nav navbar-top-links navbar-right">
    <li class="dropdown dropdown-notifications bell-style">
        <a href="#notifications-panel" class="dropdown-toggle" data-toggle="dropdown">
            <i data-count="0" class="glyphicon glyphicon-bell notification-icon"></i>
        </a>

        <div class="dropdown-container">
            <div class="dropdown-toolbar">
                <div class="dropdown-toolbar-actions">
                    <a href="#">Mark all as read</a>
                </div>
                <h3 class="dropdown-toolbar-title">Notifications (<span class="notif-count">0</span>)</h3>
            </div>
            <ul class="dropdown-menu">
            </ul>
            <div id="create-scroll">
                @foreach(Auth()->user()->Notifications as $notification)
                <div class="media" style="margin-left: 10px;">
                    <div class="media-left">
                        <div class="media-object">
                            <img src="https://api.adorable.io/avatars/71/`+avatar+`.png" class="img-circle" alt="50x50" style="width: 50px; height: 50px;">
                        </div>
                    </div>
                    <div class="media-body">
                        <strong class="notification-title">Một đơn hàng vừa được tạo</strong>
                        <p class="notification-desc">{{$notification->data['user']['name']}} vừa đặt một đơn hàng. Click để xem chi tiết</p>
                        <div class="notification-meta">
                        <small class="timestamp">{{ $notification->created_at }}</small>
                      </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="dropdown-footer text-center">
                <a href="#">View All</a>
            </div>
        </div>
    </li>
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

