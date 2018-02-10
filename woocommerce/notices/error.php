<?php
/**
 * Show error messages
 * v1.6.4
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
if ( ! $messages ) {
	return;
}
?>

<ul class="mb-2 list-group woocommerce-error">
	<?php foreach ( $messages as $message ) : ?>
		<li class="list-group-item list-group-item-danger"><?php echo wp_kses_post( $message ); ?></li>
	<?php endforeach; ?>
</ul>
