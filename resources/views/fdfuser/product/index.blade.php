@extends('layouts.user.master')
@section('content')
    <div class="inner-header">
        <div class="container">
            <div class="pull-left">
                <h6 class="inner-title"></h6>
            </div>
            <div class="pull-right">
                <div class="beta-breadcrumb font-large">
                    <a href="{!! route('index') !!}">@lang('home_page.home_page')</a> / <span>@lang('home_page.product_detail')</span>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="container">
        <div id="content">
            <div class="row">
                <div class="col-sm-9">
                    <div class="row">
                        <div class="col-sm-4">
                            <img src="/source/image/product/{!! $products->avatar !!}" alt="">
                        </div>
                        <div class="col-sm-8">
                            <div class="single-item-body">
                                <p class="single-item-title">{!! $products -> name !!}</p><br>
                                <p class="single-item-price">
                                    <span class="product-price">@lang('home_page.vnd'){!! $products -> price !!}</span>
                                </p>
                            </div>

                            <div class="clearfix"></div>
                            <div class="space20">&nbsp;</div>

                            <div class="space20">&nbsp;</div>

                            <p>@lang('home_page.amount'):</p><br>
                            <div class="single-item-options">
                                {!! Form::select('size', array('1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5'), null, ['class' => 'wc-select']) !!}
                                <a class="add-to-cart" href="#"><i class="fa fa-shopping-cart"></i></a>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>

                    <div class="space40">&nbsp;</div>
                    <div class="woocommerce-tabs">
                        <ul class="tabs">
                            <li><a href="#tab-description">@lang('home_page.description')</a></li>
                            <li><a href="#tab-reviews">@lang('home_page.reviews')</a></li>
                        </ul>

                        <div class="panel" id="tab-description">
                             {!! $products->description !!}
                        </div>
                        <div class="panel" id="tab-reviews">
                            <p>@lang('home_page.reviews')</p>
                        </div>
                    </div>
                    <div class="space50">&nbsp;</div>
                    <div class="beta-products-list">
                        <h4>@lang('home_page.similar_product')</h4><br>

                        <div class="row">
                            @foreach($siProduct as $sp)
                            <div class="col-sm-4">
                                <div class="single-item">
                                    <div class="single-item-header">
                                        <a href="product.html"><img src="/source/image/product/{!! $sp->avatar  !!}" alt="" height="250px"></a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title">{!! $sp->name !!}</p>
                                        <p class="single-item-price">
                                            <span>@lang('home_page.vnd'){!! $sp -> price !!}</span>
                                        </p>
                                    </div>
                                    <div class="single-item-caption">
                                        <a class="add-to-cart pull-left" href="product.html"><i class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary" href="product.html">@lang('home_page.detail') <i class="fa fa-chevron-right"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="row">{!! $siProduct->links() !!}</div>
                    </div> <!-- .beta-products-list -->
                </div>
                <div class="col-sm-3 aside">

                    <div class="widget">
                        <h3 class="widget-title">@lang('home_page.new_product')</h3>
                        @foreach($new_product as $new)
                        <div class="widget-body">
                            <div class="beta-sales beta-lists">
                                <div class="media beta-sales-item">
                                    <a class="pull-left" href="product.html"><img src="/source/image/product/{!! $new->avatar  !!}" alt=""></a>
                                    <div class="media-body">
                                        {!! $new -> name !!}
                                        <span class="beta-sales-price">@lang('home_page.vnd'){!! $sp -> price !!}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
