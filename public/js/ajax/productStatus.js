function ajaxToggleActiveStatus(id, presentStatus){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: 'update-status',
        type: 'POST',
        cache: false,
        data: {id:id, presentStatus:presentStatus},
        success: function(data){
            $( '#active'+id ).replaceWith( data );
        },
        error: function (){
            alert(Lang.get('managing_product.errors'));
        }
    });
}
