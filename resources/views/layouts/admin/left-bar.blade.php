<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">
                Admin Page
            </li>
            <li>
                <a href="#"><i class="fa fa-dashboard fa-fw"></i>@lang('admin_page.dashboard')</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> @lang('admin_page.managing_cat')<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="#">@lang('admin_page.list_cat')</a>
                    </li>
                    <li>
                        <a href="#">@lang('admin_page.add_cat')</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="#"><i class="fa fa-cube fa-fw"></i> @lang('admin_page.managing_order')<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('managing-order.index') }}">@lang('admin_page.notprocess_order')</a>
                    </li>
                    <li>
                        <a href="{{ route('managing-order.create') }}">@lang('admin_page.process_order')</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="#"><i class="fa fa-users fa-fw"></i> @lang('admin_page.managing_user')<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('managing-user.index') }}">@lang('admin_page.list_user')</a>
                    </li>
                    <li>
                        <a href="{{ route('managing-user.create') }}">@lang('admin_page.user_add')</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="#"><i class="fa fa-users fa-fw"></i> @lang('admin_page.managing_product')<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('managing-product.index') }}">@lang('admin_page.list_product')</a>
                    </li>
                    <li>
                        <a href="{{ route('managing-product.create') }}">@lang('admin_page.add_product')</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="#"><i class="fa fa-users fa-fw"></i> @lang('chart.title') <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('chartYear') }}">@lang('chart.chart_year')</a>
                    </li>
                    <li>
                        <a href="{{ route('orderDay') }}">@lang('chart.daily_order')</a>
                    </li>
                </ul>
            </li>

        </ul>
    </div>
</div>
