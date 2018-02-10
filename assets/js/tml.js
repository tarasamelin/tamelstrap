jQuery(function($) {

$('.navbar .dropdown').hover(function() {
    $(this).find('.dropdown-menu').first().stop(true, true).delay(50).slideDown();
}, 
function() {
    $(this).find('.dropdown-menu').first().stop(true, true).delay(50).slideUp();
});
$('.navbar .dropdown > a').click(function(){
    var scr_w = $(window).width();
    if (scr_w > 991){
        location.href = this.href;
    }
});

$( 'ol.comment-list' ).addClass( 'pl-1' );
//$( 'ol.comment-list li.comment' ).css( 'listStyleType', 'none' );

$( 'ol.flex-control-nav.flex-control-thumbs' ).addClass( 'row pl-3 pr-3 mt-0' );
$( 'ol.flex-control-nav.flex-control-thumbs li' ).addClass( 'col-3 pl-0 pr-0' ).css( 'listStyleType', 'none' );
$( 'ol.flex-control-nav.flex-control-thumbs li img' ).addClass( 'img-fluid' );
$( 'img.attachment-shop_single.size-shop_single' ).addClass( 'img-fluid' );
$( 'table.variations.table select' ).addClass( 'custom-select rounded-0 pt-0 pb-0' );
//$( 'ol.commentlist li.comment' ).css( 'listStyleType', 'none' );
$( 'ol.commentlist' ).addClass( 'pl-1' );



});