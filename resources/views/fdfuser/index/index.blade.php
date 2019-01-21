@extends('layouts.user.master')
@section('content')
<div class="fullwidthbanner-container">
    <div class="fullwidthbanner">
        <div class="bannercontainer" >
            <div class="banner" >
                <ul>
                    <li data-transition="boxfade" data-slotamount="20" class="active-revslide" style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
                        <div class="slotholder" style="width:100%;height:100%;" data-duration="undefined" data-zoomstart="undefined" data-zoomend="undefined" data-rotationstart="undefined" data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined" data-bgposition="undefined" data-kenburns="undefined" data-easeme="undefined" data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined" data-oheight="undefined">
                            <div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" data-lazydone="undefined" src="/source/assets/dest/images/thumbs/1.jpg" data-src="/source/image/slide/banner1.jpg" style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('/source/image/slide/banner1.jpg'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
                            </div>
                        </div>
                    </li>

                    <li data-transition="boxfade" data-slotamount="20" class="active-revslide current-sr-slide-visible" style="width: 100%; height: 100%; overflow: hidden; visibility: inherit; opacity: 1; z-index: 20;">
                        <div class="slotholder" style="width:100%;height:100%;" data-duration="undefined" data-zoomstart="undefined" data-zoomend="undefined" data-rotationstart="undefined" data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined" data-bgposition="undefined" data-kenburns="undefined" data-easeme="undefined" data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined" data-oheight="undefined">
                            <div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" data-lazydone="undefined" src="/source/image/slide/banner2.jpg" data-src="/source/image/slide/banner2.jpg" style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('/source/image/slide/banner2.jpg'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
                            </div>
                        </div>
                    </li>
                </ul>

            </div>
        </div>

        <div class="tp-bannertimer"></div>
    </div>
</div>

</div>
<div class="container">
    <div id="content" class="space-top-none">
        <div class="main-content">
            <div class="space60">&nbsp;</div>
            @include('common.errors')
            <div class="row">
                <div class="col-sm-12">
                    <div class="beta-products-list">
                        <h4>@lang('home_page.drinks')</h4>
                        <div class="beta-products-details">
                            <p class="pull-left">{!! count($drinks)!!} @lang('home_page.products')</p>
                            <div class="clearfix"></div>
                        </div>

                        <div class="row">
                            @foreach($drinks as $dr)
                                <div class="col-sm-3">
                                <div class="single-item">
                                    <div class="single-item-header">
                                        <a href="{!! route('product-detail.show',$dr->id) !!}"><img src="/images/product/avatar/{!! $dr->avatar  !!}" class="img-product"></a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title">{!! $dr->name !!}</p>
                                        <p class="single-item-price">
                                            <span class="product-price">@lang('home_page.vnd'){!! $dr->price !!}</span>
                                        </p>
                                    </div>
                                    <div class="single-item-caption">
                                        {!! Form::open(['method'=>'PUT', 'route'=>['cart.update', $dr->id]]) !!}
                                            {!! Form::hidden('product_id', $dr->id) !!}
                                            {!! Form::hidden('_token', csrf_token()) !!}
                                            {{ Form::button('<i class="fa fa-shopping-cart"></i>', ['type' => 'submit', 'class' => 'add-to-cart pull-left'] )  }}
                                            <a class="beta-btn primary" href="product.html">@lang('home_page.detail') <i class="fa fa-chevron-right"></i></a>
                                        {!! Form::close() !!}
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="row">{!! $drinks->links() !!}</div>
                    </div>

                    <div class="space50">&nbsp;</div>

                    <div class="beta-products-list">
                        <h4>@lang('home_page.foods')</h4>
                        <div class="beta-pcartroducts-details">
                            <p class="pull-left">{!! count($foods) !!}</p>
                            <div class="clearfix"></div>
                        </div>
                        <div class="row">
                            @foreach($foods as $fd)
                                <div class="col-sm-3">
                                <div class="single-item">
                                    <div class="single-item-header">
                                        <a href="{!! route('product-detail.show',$fd->id) !!}"><img src="/images/product/avatar/{!! $fd->avatar !!}" class="img-product"></a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title">{!! $fd->name !!}</p>
                                        <p class="single-item-price">
                                            <span class="product-price">@lang('home_page.vnd'){!! $fd->price !!}</span>
                                        </p>
                                    </div>
                                    <div class="single-item-caption">
                                        {!! Form::open(['method'=>'PUT', 'route'=>['cart.update', $fd->id]]) !!}
                                            {!! Form::hidden('product_id', $fd->id) !!}
                                            {!! Form::hidden('_token', csrf_token()) !!}
                                            {{ Form::button('<i class="fa fa-shopping-cart"></i>', ['type' => 'submit', 'class' => 'add-to-cart pull-left'] )  }}
                                            <a class="beta-btn primary" href="product.html">@lang('home_page.detail') <i class="fa fa-chevron-right"></i></a>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="row">{!! $foods->links() !!}</div>
                        <div class="space40">&nbsp;</div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
