<?php if ( ! WC()->cart->is_empty() ) : ?>
<script>
jQuery( function($) {
$( 'header .navbar .dropdown a.cart-contents' ).click(function(){
    location.href = this.href;
});
$( 'header .navbar .dropdown' ).hover(function() {
    $( this ).find( '.dropdown-menu.woocommerce-mini-cart' ).first().stop(true, true).delay(50).slideDown();
}, 
function() {
    $( this ).find( '.dropdown-menu.woocommerce-mini-cart' ).first().stop(true, true).delay(50).slideUp();
});
});
</script>
<ul class="navbar-nav"><li class="dropdown nav-item">
        <a class="dropdown-toggle cart-contents" data-toggle="dropdown" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View cart', 'woocommerce' ); ?>">
        <i class="fa fa-shopping-cart"></i>
        
        <span class="text-info count">(<?php echo wp_kses_data( WC()->cart->get_cart_contents_count() );?>)</span>
        <span class="text-dark amount"><?php echo wp_kses_data( WC()->cart->get_cart_subtotal() ); ?></span>
        </a>
        <?php //woocommerce_mini_cart(); ?>
        <ul class="dropdown-menu rounded-0 woocommerce-mini-cart cart_list product_list_widget <?php echo esc_attr( $args['list_class'] ); ?>">
		<?php
			do_action( 'woocommerce_before_mini_cart_contents' );
			foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
				$_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
				$product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

				if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
					$product_name      = apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key );
					$thumbnail         = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image($size = array('tumbnail')), $cart_item, $cart_item_key );
					$product_price     = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
					$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
					?>
					<li class="dropdown-item woocommerce-mini-cart-item <?php echo esc_attr( apply_filters( 'woocommerce_mini_cart_item_class', 'mini_cart_item', $cart_item, $cart_item_key ) ); ?>">
						<?php
						echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
							'<a href="%s" class="remove remove_from_cart_button" aria-label="%s" data-product_id="%s" data-cart_item_key="%s" data-product_sku="%s">&times;</a>',
							esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
							__( 'Remove this item', 'woocommerce' ),
							esc_attr( $product_id ),
							esc_attr( $cart_item_key ),
							esc_attr( $_product->get_sku() )
						), $cart_item_key );
						?>
						<?php if ( ! $_product->is_visible() ) : ?>
							<?php echo str_replace( array( 'http:', 'https:' ), '', $thumbnail ) . $product_name . '&nbsp;'; ?>
						<?php else : ?>
							<a href="<?php echo esc_url( $product_permalink ); ?>">
								<?php echo str_replace( array( 'http:', 'https:' ), '', $thumbnail ) . $product_name . '&nbsp;'; ?>
							</a>
						<?php endif; ?>
						<?php echo wc_get_formatted_cart_item_data( $cart_item ); ?>

						<?php echo apply_filters( 'woocommerce_widget_cart_item_quantity', '<span class="quantity">' . sprintf( '(%s) %s', $cart_item['quantity'], $product_price ) . '</span>', $cart_item, $cart_item_key ); ?>
					</li>
					<?php
				}
			}
		?>
	</ul>   
</li></ul>

<?php elseif ( WC()->cart->is_empty() ) : ?>
<ul class="navbar-nav"><li class="nav-item">
<a class="cart-contents" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View cart', 'woocommerce' ); ?>">
<i class="fa fa-shopping-cart"></i>
</a>
</li></ul>
<?php endif; ?>