@if($countCart != 0)
    <span class="jClickAjax">({{ $countCart }})</span>
@else
    <span class="jClickAjax">(@lang('home_page.empty'))</span>
@endif
<span class="subtotalAjax">{{ $subtotal }}</span>
