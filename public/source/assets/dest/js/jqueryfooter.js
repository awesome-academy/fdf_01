$(document).ready(function($) {
    $(window).scroll(function(){
        if($(this).scrollTop()>150){
            $(".header-bottom").addClass('fixNav')
        }else{
            $(".header-bottom").removeClass('fixNav')
        }}
    )
})