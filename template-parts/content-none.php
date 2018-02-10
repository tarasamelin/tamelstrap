<?php
/**
 * Template part for displaying - posts cannot be found
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?> 

<section class="no-results not-found">
		<?php if ( is_search() ) : ?>
            <p class="h3 text-center"><?php _e( 'No results found.' ) ?></p>
            <div class="d-flex justify-content-center"><?php get_search_form(); ?></div>
		<?php else : ?>
            <p class="h3 text-center"><?php _e( 'No results found.' ) ?></p>
            <div class="d-flex justify-content-center"><?php get_search_form(); ?></div>
		<?php endif; ?>
</section><!-- .no-results -->
