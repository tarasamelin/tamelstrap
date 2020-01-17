<?php
/**
 * Custome Search form for get_searc_form
 */

defined( 'ABSPATH' ) || exit;
?>

<form role="search" method="get" class="w-100 py-0 form-inline search-form" action="<?php echo home_url( '/' ); ?>">

    <input type="search" class="w-100 mr-0 pr-5 form-control search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
    <button class="border mr-0 bg-white form-control search-submitl" type="submit" value="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>"><i class="svg-i search"></i>
	</button>
</form>