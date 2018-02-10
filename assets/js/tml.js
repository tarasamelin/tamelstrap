jQuery( function($) {
// Fix BootStrap DropDown Menu
$( 'header .navbar .dropdown' ).hover(function() {
    $( this ).find( '.dropdown-menu' ).first().stop(true, true).delay(50).slideDown();
}, 
function() {
    $( this ).find( '.dropdown-menu' ).first().stop(true, true).delay(50).slideUp();
});
$( 'header .navbar .dropdown > a' ).click(function(){
    var scr_w = $(window).width();
    if ( scr_w > 991 ) {
        location.href = this.href;
    }
});

// Sticky nav menu
$( window ).scroll(function() {
    var on_scroll_h = 200;
    var header_h = $( 'header.site-header' ).height();
    var scr_h = $(window).height();
    var doc_h = $(document).height();
    if ( $( this ).scrollTop() >= on_scroll_h && doc_h > ( scr_h + header_h + on_scroll_h + 42) ) {
        $( 'header.site-header' ).addClass( 'fixed-top' );
    }
    else {
        $( 'header.site-header' ).removeClass( 'fixed-top' );
    }
//    alert ( header_h );
});

// Add some classes to html elements by jquery
//$( 'table.variations.table select' ).addClass( 'custom-select' );



});