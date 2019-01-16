@if ($presentStatus == config('setting.status_active'))
    <label id="active{{$id}}">
        <img src="/images/product/status/deactive.gif" onclick="return ajaxToggleActiveStatus({{$id}}, {{ config('setting.status_deactive') }})">
            @lang('managing_product.non-display')
    </label>
@else
    <label id="active{{$id}}">
        <img src="/images/product/status/active.gif" onclick="return ajaxToggleActiveStatus({{$id}}, {{ config('setting.status_active') }})">
            @lang('managing_product.display')
    </label>
@endif
