$('[data-confirm]').on('click', function (e) {
    var message = $(this).data('confirm'); // Will use translated string from Blade

    if (! confirm(message)) {
        e.preventDefault();
        e.stopImmediatePropagation();
    }
});

function mark(notificationCount){
    if(notificationCount != config('setting.default')) {
        $.get('/mark');
    }
}
