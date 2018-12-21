<?php
/**
 * Show messages notice
 * @version 3.5.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
if ( ! $messages ) {
	return;
}
?>

<?php foreach ( $messages as $message ) : ?>
	<div class="mb-2 p-2 border border-info woocommerce-info">
        <?php echo wp_kses_post( $message ); ?>
    </div>
<?php endforeach; ?>
