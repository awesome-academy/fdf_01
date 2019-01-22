@extends('layouts.user.master')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">@lang('cart.checkout')</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb">
                <a href="index.html">@lang('cart.homepage')</a> / <span>@lang('cart.checkout')</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="container">
    <div id="content">
        @include('common.errors')
        {!! Form::open(['method'=>'POST', 'route'=>'cart.store', 'class'=>'beta-form-checkout']) !!}
            <div class="row">
                <div class="col-sm-6">
                    <div class="space20">&nbsp;</div>

                    <div class="form-block">
                        {!! Form::label('name', trans('cart.fullname')) !!}
                        {!! Form::text('txtName', Auth::user()->name, ['placeholder'=>trans('cart.place_name'), 'readonly']) !!}
                    </div>

                    <div class="form-block">
                        {!! Form::label('address', trans('cart.address')) !!}
                        {!! Form::text('txtAddress', Auth::user()->address, ['placeholder'=>trans('cart.place_address'), 'readonly']) !!}
                    </div>

                    <div class="form-block">
                        {!! Form::label('phone', trans('cart.phone')) !!}
                        {!! Form::text('txtPhone', Auth::user()->phone_number, ['placeholder'=>trans('cart.place_phone'), 'readonly']) !!}
                    </div>

                    <div class="form-block">
                        {!! Form::label('note', trans('cart.note')) !!}
                        {!! Form::textarea('txtNote', '') !!}
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="your-order">
                        <div class="your-order-head"><h5>@lang('cart.your_order')</h5></div>
                        <div class="your-order-body order-head">
                            @if(Cart::count() != 0)
                                @foreach(Cart::content() as $item)
                                <div class="your-order-item">
                                    <div>
                                        <div class="media">
                                            <img src="assets/dest/images/shoping1.jpg" class="pull-left img-product-two">
                                            <div class="media-body">
                                                <p class="font-large">{{ $item->name }}</p>
                                                <span class="color-gray your-order-info">@lang('cart.price') {{ number_format($item->price)}} @lang('cart.vnd')</span>
                                                <span class="color-gray your-order-info">@lang('cart.qty') {{ ($item->qty)}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                @endforeach
                                <div class="your-order-item">
                                    <div class="pull-left"><p class="your-order-f18">@lang('cart.subtotal')</p></div>
                                    <div class="pull-right"><h5 class="color-black">{{ Cart::subtotal() }} @lang('cart.vnd')</h5></div>
                                    <div class="clearfix"></div>
                                </div>
                            @else
                                <p>@lang('cart.no_cart')</p>
                            @endif
                        </div>
                        <div class="your-order-head"><h5>@lang('cart.slc_trans')</h5></div>

                        <div class="your-order-body">
                            <ul class="payment_methods methods">
                                <li class="payment_method_bacs">
                                    {!! Form::radio('payment_method', 'COD', 'checked', ['id'=>'payment_method_bacs', 'class'=>'input-radio', 'data-order_button_text'=>'']) !!}
                                    {!! Form::label('payment_method_bacs', trans('cart.trans')) !!}
                                    <div class="payment_box payment_method_bacs .pay-method-one">
                                        @lang('cart.trans_inform')
                                    </div>
                                </li>

                                <li class="payment_method_cheque">
                                    {!! Form::radio('payment_method', 'ATM', '', ['id'=>'payment_method_cheque', 'class'=>'input-radio', 'data-order_button_text'=>'']) !!}
                                    {!! Form::label('payment_method_cheque', trans('cart.trans_bank')) !!}
                                    <div class="payment_box payment_method_cheque pay-method-two">
                                        @lang('cart.tbank_inform1');
                                        <br>- @lang('cart.tbank_inform2')
                                        <br>- @lang('cart.tbank_inform3')
                                        <br>- @lang('cart.tbank_inform4')
                                    </div>
                                </li>

                            </ul>
                        </div>

                        <div class="text-center">
                            {!! Form::submit( trans('cart.checkout'), ['class'=>'beta-btn primary']) !!}
                        </div>
                    </div>
                </div>
            </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection
