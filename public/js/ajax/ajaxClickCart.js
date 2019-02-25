function ajaxClickToCart(id){
    jQuery.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    jQuery.ajax({
        url: 'cart/{id}',
        type: 'PUT',
        cache: false,
        data: {id:id},
        success: function(data){
            var lines = data.split('\n');
            const count = lines[0];
            const subtotal = lines[1];
            console.log(data);
            jQuery('.jClickAjax').replaceWith(count);
            jQuery('.subtotalAjax').replaceWith(subtotal);
        },
        error: function (){
            alert(Lang.get('managing_product.errors'));
        }
    });
}
