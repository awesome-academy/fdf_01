<div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="index.html">Admin - Food & Drink</a>
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