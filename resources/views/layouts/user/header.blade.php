<div id="header">
    <div class="header-top">
        <div class="container">
            <div class="pull-left auto-width-left">
                <ul class="top-menu menu-beta l-inline">
                    <li><a href=""><i class="fa fa-home"></i> @lang('home_page.address') </a></li>
                    <li><a href=""><i class="fa fa-phone"></i> 076 423 6535</a></li>
                </ul>
            </div>
            <div class="pull-right auto-width-right">
                <ul class="top-details menu-beta l-inline">
                    @if(Auth::check())
                        <li><a href="{!! route('profile.show', Auth::user()->id) !!}"><i class="fa fa-user"></i>{{ Auth::user()->name }} </a></li>
                        <li><a href="{{ route('logout.create') }}">
                            <i class="fa fa-sign-out" aria-hidden="true"></i>
                            </i> @lang('home_page.logout') </a>
                        </li>
                    @else
                        <li><a href="{{ route('register.index') }}">@lang('home_page.register')</a></li>
                        <li><a href="{{ route('login.store') }}">@lang('home_page.login')</a></li>
                    @endif
                    <li class="hidden-xs">
                        {!! Form::open(['method' => 'POST', 'route'=>['switchLang'] ]) !!}
                            {!! Form::select
                                (
                                    'locale',
                                    ['en' => trans('home_page.lang.en'),
                                     'vi' => trans('home_page.lang.vi')],
                                      Lang::locale() === 'vi' ? 'vi' : 'en' ,
                                    ['onchange'=>'this.form.submit()']
                                )
                            !!}
                        {!! Form::close() !!}
                    </li>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="header-body">
        <div class="container beta-relative">
            <div class="pull-left">
                <a href="index.html" id="logo"><img src="/source/assets/dest/images/logo-cake.png" width="200px" alt=""></a>
            </div>
            <div class="pull-right beta-components space-left ov">
                <div class="space10">&nbsp;</div>

                <div class="beta-comp">
                    <div class="cart">
                        @if (Cart::count() != 0)
                            <div class="beta-select"><i class="fa fa-shopping-cart"></i> @lang('home_page.cart') <span class="jClickAjax">({{ Cart::count() }})</span> <i class="fa fa-chevron-down"></i></div>
                        @else
                            <div class="beta-select"><i class="fa fa-shopping-cart"></i> @lang('home_page.cart') <span class="jClickAjax">(@lang('home_page.empty'))</span> <i class="fa fa-chevron-down"></i></div>
                        @endif
                        <div class="beta-dropdown cart-body">
                            @foreach(Cart::content() as $item)
                            <div class="cart-item">
                                <a class="cart-item-delete" href="{{ route('cart.show', $item->id) }}"><i class="fa fa-times"></i></a>
                                <div class="media">
                                    <a class="pull-left" href="#"><img src="/source/assets/dest/images/products/cart/1.png" alt=""></a>
                                    <div class="media-body">
                                        <span class="cart-item-title">@lang('cart.name') {{ $item->name }}</span>
                                        <span class="cart-item-amount">@lang('cart.price') {{ ($item->qty)}} * <span>{{ number_format($item->price)}} @lang('cart.vnd')</span></span>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <div class="cart-caption">
                                <div class="cart-total text-right">@lang('cart.subtotal') <span class="cart-total-value subtotalAjax">{{ Cart::subtotal() }}</span></div>
                                <div class="clearfix"></div>

                                <div class="center">
                                    <div class="space10">&nbsp;</div>
                                    <a href="{{ route('cart.create') }}" class="beta-btn primary text-center"> @lang('home_page.checkout') <i class="fa fa-chevron-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="header-bottom header-style">
        <div class="container">
            <a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'> @lang('home_page.menu') </span> <i class="fa fa-bars"></i></a>
            <div class="visible-xs clearfix"></div>
            <nav class="main-menu">
                <ul class="l-inline ov">
                    <li><a href="{!! route('index') !!}"> @lang('home_page.home_page') </a></li>
                    <li><a> @lang('home_page.products') </a>
                        <ul class="sub-menu">
                            @foreach($product_type as $type)
                                @if($type->parent_id == @config('settings.parent_type') )
                                    <li><a href="{!! route('categories.show',$type ->id) !!}">{!! $type -> name !!}</a></li>
                                @endif
                            @endforeach
                        </ul>
                    </li>
                    <li><a href="about.html"> @lang('home_page.about_us') </a></li>
                    <li><a href="contacts.html"> @lang('home_page.contact') </a></li>
                </ul>
                <div class="clearfix"></div>
            </nav>
        </div>
    </div>
</div>
