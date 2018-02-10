<?php
/**
 * Custome Search form for get_searc_form
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>
<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
   <div class="p-0 m-0 row">
   <div class="p-0 m-0 col-xs-12 col-sm-8">
    <input type="search" class="w-100 form-control pt-1 pb-1 rounded-0 search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
   </div>
   <div class="p-0 m-0 col-xs-12 col-sm-4">
    <input type="submit" class="pt-1 pb-1 btn btn-outline-secondary rounded-0 search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>" />
   </div>
   </div>
</form>