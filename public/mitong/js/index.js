jQuery( function ($) {

    $(".linker").on("click",function() {
        location.href = $(this).data('src');
    });

});