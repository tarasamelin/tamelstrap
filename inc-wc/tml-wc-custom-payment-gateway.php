<?php
/*
 *TML WooCommerce custom Payment Gateway
 */
add_filter('woocommerce_payment_gateways', 'add_other_payment_gateway');
function add_other_payment_gateway( $gateways ){
    $gateways[] = 'WC_Other_Payment_Gateway';
    return $gateways; 
}

class WC_Other_Payment_Gateway extends WC_Payment_Gateway {

	public function __construct(){
        // Get settings
		$this->id = 'other_payment';
		$this->method_title = 'Custom Payment 1';
		$this->title = 'Custom Payment 1';
		$this->has_fields = true;
		$this->enabled = $this->get_option('enabled');
		$this->title = $this->get_option('title');
		$this->description = $this->get_option('description');
        // Load the settings
        $this->init_form_fields();
		$this->init_settings();

		add_action( 'woocommerce_update_options_payment_gateways_'.$this->id, array( $this, 'process_admin_options' ) );
	}
    
	public function init_form_fields(){
    $this->form_fields = array(
        'enabled' => array(
        'title' 		=> __( 'Enable/Disable', 'woocommerce' ),
        'type' 			=> 'checkbox',
        'label' 		=> __( 'Enable cash on delivery', 'woocommerce' ),
        'default' 		=> 'yes'
        ),
        'title' => array(
            'title' 		=> __( 'Payment method title.', 'woocommerce' ),
            'type' 			=> 'text',
            'description' 	=> __( 'This controls the title', 'woocommerce' ),
            'default'		=> __( 'Custom Payment', 'woocommerce' ),
            'desc_tip'		=> true,
        ),
        'description' => array(
            'title' => __( 'Description', 'woocommerce' ),
            'type' => 'textarea',
            'css' => 'max-width:400px;',
            'default' => '',
            'description' 	=> __( 'Payment method description that the customer will see on your website.', 'woocommerce' ),
        ),
 );
}
/**
 * Show Options in WooCommerce Admin Panel
 */
	public function admin_options() {
		?>
		<h3>Custom Payment  1 <?php _e( 'Settings', 'woocommerce' ); ?></h3>
        <div id="poststuff">
				<div id="post-body" class="metabox-holder columns-2">
					<div id="post-body-content">
						<table class="form-table">
							<?php $this->generate_settings_html();?>
						</table>
					</div>
                </div>
        <div class="clear"></div>
        </div>
<?php
	}
    
	public function process_payment( $order_id ) {
		global $woocommerce;
		$order = new WC_Order( $order_id );
        
        if ( $order->get_total() > 0 ) {
			// Mark as on-hold (we're awaiting the cheque)
			$order->update_status( 'processing', _x( 'Awaiting check payment', 'Check payment method', 'woocommerce' ) );
		} else {
			$order->payment_complete();
		}
        
//		$order->update_status( 'on-hold', __( 'Payment to be made upon delivery.', 'woocommerce' ) );
//		$order->update_status( 'processing', __( 'Payment to be made upon delivery.', 'woocommerce' ) );
		wc_reduce_stock_levels( $order_id );
		$woocommerce->cart->empty_cart();
		return array(
			'result' => 'success',
			'redirect' => $this->get_return_url( $order )
		);	
	}
    
    
/**
 * Show payment method description on checkout page
 */
	public function payment_fields(){ ?>
		<p><?php echo esc_attr( $this->description ); ?></p>
    <?php }
}