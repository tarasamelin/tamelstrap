jQuery( function($) {

// Fix BootStrap DropDown Menu
$( 'header .navbar .dropdown' ).hover( function() {
    $( this ).find( '.dropdown-menu' ).first().stop(true, true).delay(50).slideDown();
}, 
function() {
    $( this ).find( '.dropdown-menu' ).first().stop(true, true).delay(50).slideUp();
} );
    
$( 'header .navbar .dropdown > a' ).click(function(){
    var scr_w = $(window).width();
    if ( scr_w > 991 ) {
        location.href = this.href;
    }
});

// Sticky nav menu
$( window ).scroll(function() {
    var scr_w = $(window).width();
    var on_scroll_h = 200;
    var header_h = $( 'header.site-header' ).height();
    var doc_h1 = $( 'div.site-content' ).height();
    var doc_h2 = $( 'footer.site-footer' ).height();
    var doc_h = doc_h1 + doc_h2;
    var scr_h = $(window).height();
    if ( $( this ).scrollTop() >= on_scroll_h && ( doc_h > ( scr_h + header_h + on_scroll_h + 80 ) ) && ( scr_w >= 768) ) {
        $( 'header.site-header .main-nav-level' ).addClass( 'fixed-top' );
        $( 'a.totopbtn' ).removeClass( 'd-none' );
        $( '#content' ).addClass( 'mt84px' );
    }
    else if( $( this ).scrollTop() >= on_scroll_h && ( doc_h > ( scr_h + header_h + on_scroll_h + 80 ) ) && ( scr_w < 768) ) {
        $( 'header.site-header .main-nav-level' ).removeClass( 'fixed-top' );
        $( 'a.totopbtn' ).removeClass( 'd-none' );
        $( '#content' ).addClass( 'mt84px' );
    }
    else {
        $( 'header.site-header .main-nav-level' ).removeClass( 'fixed-top' );
        $( 'a.totopbtn' ).addClass( 'd-none' );
        $( '#content' ).removeClass( 'mt84px' );
    }
});

$( 'a.totopbtn' ).click(function() {
  $('html, body' ).animate({ scrollTop: 0 }, 'slow');
});

// woocommerce MyAccount navigation
$( '.woocommerce-MyAccount-navigation .is-active a' ).addClass( 'active' );
$( '.woocommerce-edit-address .form-group input' ).addClass( 'form-control' );
$( '.woocommerce-edit-address .form-group select' ).addClass( 'form-control' );

 $( '#secondary .current-menu-parent ul' ).addClass('show');

    

});