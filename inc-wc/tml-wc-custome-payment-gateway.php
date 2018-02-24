<?php
/*
 *TML WooCommerce custome Payment Gateway
 */
add_filter('woocommerce_payment_gateways', 'add_other_payment_gateway');
function add_other_payment_gateway( $gateways ){
    $gateways[] = 'WC_Other_Payment_Gateway';
    return $gateways; 
}

class WC_Other_Payment_Gateway extends WC_Payment_Gateway {

	public function __construct(){
		$this->id = 'other_payment';
		$this->method_title = __('Custom Payment','woocommerce-other-payment-gateway').'1';
		$this->title = __('Custom Payment','woocommerce-other-payment-gateway').'1';
		$this->has_fields = true;
		$this->init_form_fields();
		$this->init_settings();
		$this->enabled = $this->get_option('enabled');
		$this->title = $this->get_option('title');
		$this->description = $this->get_option('description');
		$this->hide_text_box = $this->get_option('hide_text_box');

		add_action('woocommerce_update_options_payment_gateways_'.$this->id, array($this, 'process_admin_options'));
	}
    
	public function init_form_fields(){
    $this->form_fields = array(
        'enabled' => array(
        'title' 		=> __( 'Enable/Disable', 'woocommerce-other-payment-gateway' ),
        'type' 			=> 'checkbox',
        'label' 		=> __( 'Enable Custom Payment', 'woocommerce-other-payment-gateway' ),
        'default' 		=> 'yes'
        ),
        'title' => array(
            'title' 		=> __( 'Method Title', 'woocommerce-other-payment-gateway' ),
            'type' 			=> 'text',
            'description' 	=> __( 'This controls the title', 'woocommerce-other-payment-gateway' ),
            'default'		=> __( 'Custom Payment', 'woocommerce-other-payment-gateway' ),
            'desc_tip'		=> true,
        ),
        'description' => array(
            'title' => __( 'Customer Message', 'woocommerce-other-payment-gateway' ),
            'type' => 'textarea',
            'css' => 'max-width:500px;',
            'default' => 'None of the other payment options are suitable for you? please drop us a note about your favourable payment option and we will contact you as soon as possible.',
            'description' 	=> __( 'The message which you want it to appear to the customer in the checkout page.', 'woocommerce-other-payment-gateway' ),
        ),
        'hide_text_box' => array(
            'title' 		=> __( 'Hide The Payment Field', 'woocommerce-other-payment-gateway' ),
            'type' 			=> 'checkbox',
            'label' 		=> __( 'Hide', 'woocommerce-other-payment-gateway' ),
            'default' 		=> 'no',
            'description' 	=> __( 'If you do not need to show the text box for customers at all, enable this option.', 'woocommerce-other-payment-gateway' ),
        ),

 );
}
/**
 * Admin Panel Options
 * @return void
 */
	public function admin_options() {
		?>
		<h3><?php _e( 'Custom Payment Settings', 'woocommerce-other-payment-gateway' ); ?> 1</h3>
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
		// Mark as on-hold (we're awaiting the cheque)
		$order->update_status('processing', __( 'Awaiting payment', 'woocommerce-other-payment-gateway' ));
		// Reduce stock levels
		wc_reduce_stock_levels( $order_id );
		if(isset($_POST[ $this->id.'-admin-note']) && trim($_POST[ $this->id.'-admin-note'])!=''){
			$order->add_order_note(esc_html($_POST[ $this->id.'-admin-note']),1);
		}
		// Remove cart
		$woocommerce->cart->empty_cart();
		// Return thankyou redirect
		return array(
			'result' => 'success',
			'redirect' => $this->get_return_url( $order )
		);	
	}

	public function payment_fields(){
		if( $this->hide_text_box !== 'yes' ){
	    ?>
		<fieldset><p class="form-row form-row-wide">
        <label for="<?php echo $this->id; ?>-admin-note"><?php echo esc_attr( $this->description ); ?></label>
        </p><div class="clear"></div></fieldset>
		<?php
		}
	}
}