@extends('layouts.user.master')

@section('content')

<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">{!! $cate_product -> name !!}</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <a href="{!! route('index') !!}">@lang('home_page.home_page')</a> / <span>@lang('home_page.products')</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<div class="container">
    <div id="content" class="space-top-none">
        <div class="main-content">
            <div class="space60">&nbsp;</div>
            <div class="row">
                <div class="col-sm-3">
                    <ul class="aside-menu">
                        @foreach($categories as $cat)
                            <li><a href="{!! route('categories.show', $cat->id) !!}">{!! $cat->name !!}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-sm-9">
                    <div class="beta-products-list">
                        <h4>@lang('home_page.products')</h4>
                        <div class="beta-products-details">
                            <p class="pull-left">{!! count($typeProduct) !!} @lang('home_page.products')</p>
                            <div class="clearfix"></div>
                        </div>

                        <div class="row">
                            @foreach($typeProduct as $tp)
                            <div class="col-sm-4">
                                <div class="single-item">
                                    <div class="single-item-header">
                                        <a href="{!! route('product-detail.show', $tp->id) !!}"><img src="/source/image/product/{!! $tp->avatar  !!}" alt="" height="250px"></a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title">{!! $tp -> name !!}</p>
                                        <p class="single-item-price">
                                            <span class="product-price">@lang('home_page.vnd'){!! $tp -> price !!}</span>
                                        </p>
                                    </div>
                                    <div class="single-item-caption">
                                        <a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary" href="product.html">@lang('home_page.detail') <i class="fa fa-chevron-right"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="row">{!! $typeProduct->links() !!}</div>
                    </div>

                    <div class="space50">&nbsp;</div>

                    <div class="beta-products-list">
                        <h4>@lang('home_page.otherProducts')</h4>
                        <div class="beta-products-details">
                            <p class="pull-left">{!! count($otherProduct) !!} @lang('home_page.products')</p>
                            <div class="clearfix"></div>
                        </div>
                        <div class="row">
                            @foreach($otherProduct as $op)
                            <div class="col-sm-4">
                                <div class="single-item">
                                    <div class="single-item-header">
                                        <a href="{!! route('product-detail.show', $op->id) !!}"><img src="/source/image/product/{!! $op->avatar  !!}" alt=""height="250px"></a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title">{!! $op->name !!}</p>
                                        <p class="single-item-price">
                                            <span class="product-price">@lang('home_page.vnd'){!! $op->price !!}</span>
                                        </p>
                                    </div>
                                    <div class="single-item-caption">
                                        <a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary" href="product.html">@lang('home_page.detail') <i class="fa fa-chevron-right"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="row">{!! $otherProduct->links() !!}</div>
                        <div class="space40">&nbsp;</div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
