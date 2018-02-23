<?php
/**
 * Custome Search form for get_searc_form
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>
<form role="search" method="get" class="form-inline search-form" action="<?php echo home_url( '/' ); ?>">

    <input type="search" class="form-control rounded-0 search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
    <button class="form-control rounded-0 form-contro search-submitl" type="submit" value="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>"><i class="text-secondary fa fa-search" aria-hidden="true"></i>
	</button>
</form>