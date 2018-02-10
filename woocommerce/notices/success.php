<?php
/**
 * Show messages
 * v1.6.4
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
if ( ! $messages ) {
	return;
}
?>

<?php foreach ( $messages as $message ) : ?>
	<div class="mb-2 p-2 border border-success woocommerce-message"><?php echo wp_kses_post( $message ); ?></div>
<?php endforeach; ?>
