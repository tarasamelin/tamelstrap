<?php
/**
 * Custome woocommerce checkout fields Filter
 */ 
add_filter( 'woocommerce_checkout_fields' , 'tml_wc_custome_checkout_fields' );

function tml_wc_custome_checkout_fields( $fields ) {
   
/**
 * Sorting woocommerce checkout billing fields
 */
$order_billing = array(
    'billing_first_name',
    'billing_last_name',
    'billing_email',
    'billing_phone',
    'billing_country',
    'billing_company_name',
    'billing_address_1',
    'billing_address_2',
    'billing_state',
    'billing_city',
    'billing_postcode'
);
foreach($order_billing as $field) {
    $ordered_billing_fields[$field] = $fields['billing'][$field];
}
    $fields['billing'] = $ordered_billing_fields;
    $fields['billing']['billing_first_name']['priority'] = 10;
    $fields['billing']['billing_last_name']['priority'] = 20;
    $fields['billing']['billing_company_name']['priority'] = 70;
    $fields['billing']['billing_address_1']['priority'] = 50;
    $fields['billing']['billing_address_2']['priority'] = 60;
    $fields['billing']['billing_city']['priority'] = 80;
    $fields['billing']['billing_postcode']['priority'] = 90;
    $fields['billing']['billing_country']['priority'] = 100;
    $fields['billing']['billing_state']['priority'] = 110;
    $fields['billing']['billing_email']['priority'] = 30;
    $fields['billing']['billing_phone']['priority'] = 40;
/**
 * Sorting woocommerce checkout shipping fields
 */
$order_shipping = array(
    'shipping_first_name',
    'shipping_last_name',
    'shipping_company_name',
    'shipping_address_1',
    'shipping_address_2',
    'shipping_city',
    'shipping_postcode',
    'shipping_country',
    'shipping_state'

);
foreach($order_shipping as $field) {
    $ordered_shipping_fields[$field] = $fields['shipping'][$field];
}
    $fields['shipping'] = $ordered_shipping_fields;
    $fields['shipping']['shipping_first_name']['priority'] = 10;
    $fields['shipping']['shipping_last_name']['priority'] = 20;
    $fields['shipping']['shipping_company_name']['priority'] = 50;
    $fields['shipping']['shipping_address_1']['priority'] = 30;
    $fields['shipping']['shipping_address_2']['priority'] = 40;
    $fields['shipping']['shipping_city']['priority'] = 60;
    $fields['shipping']['shipping_postcode']['priority'] = 70;
    $fields['shipping']['shipping_country']['priority'] = 80;
    $fields['shipping']['shipping_state']['priority'] = 90;

/**
 * Unsen woocommerce checkout fields
 */
//Unset Billing
//     unset($fields['billing']['billing_first_name']);
//     unset($fields['billing']['billing_last_name']);
     unset($fields['billing']['billing_company_name']);
//     unset($fields['billing']['billing_address_1']);
     unset($fields['billing']['billing_address_2']);
     unset($fields['billing']['billing_city']);
     unset($fields['billing']['billing_postcode']);
     unset($fields['billing']['billing_country']);
     unset($fields['billing']['billing_state']);
//     unset($fields['billing']['billing_email']);
//     unset($fields['billing']['billing_phone']);
//Unset Shipping
//     unset($fields['shipping']['shipping_first_name']);
//     unset($fields['shipping']['shipping_last_name']);
     unset($fields['shipping']['shipping_company_name']);
//     unset($fields['shipping']['shipping_address_1']);
//     unset($fields['shipping']['shipping_address_2']);
     unset($fields['shipping']['shipping_city']);
     unset($fields['shipping']['shipping_postcode']);
     unset($fields['shipping']['shipping_country']);
     unset($fields['shipping']['shipping_state']);
//Account
//     unset($fields['account']['account_username']);
//     unset($fields['account']['account_password']);
//     unset($fields['account']['account_password-2']);
//Order
//     unset($fields['order']['order_comments']);

/**
 * Customize woocommerce checkout fields billing
 */
//$fields['billing']['billing_first_name']['type'] = 'text';
//$fields['billing']['billing_first_name']['label'] = '';
//$fields['billing']['billing_first_name']['placeholder'] = '';
//$fields['billing']['billing_first_name']['class'] = array('form-group');
//$fields['billing']['billing_first_name']['required'] = false;
//$fields['billing']['billing_first_name']['clear'] = '';
//$fields['billing']['billing_first_name']['label_class'] = '',
//$fields['billing']['billing_first_name']['options'] = '';

/* Labels billing */
//$fields['billing']['billing_first_name']['label'] = '';
//$fields['billing']['billing_last_name']['label'] = '';
//$fields['billing']['billing_company_name']['label'] = '';
$fields['billing']['billing_address_1']['label'] = __( 'Shipping Adress', 'tamelstrap' );
//$fields['billing']['billing_address_2']['label'] = '';
//$fields['billing']['billing_city']['label'] = '';
//$fields['billing']['billing_postcode']['label'] = '';
//$fields['billing']['billing_country']['label'] = '';
//$fields['billing']['billing_state']['label'] = '';
//$fields['billing']['billing_email']['label'] = '';
//$fields['billing']['billing_phone']['label'] = '';

/* Placeholder billing */
//$fields['billing']['billing_first_name']['placeholder'] = '';
//$fields['billing']['billing_last_name']['placeholder'] = '';
//$fields['billing']['billing_company_name']['placeholder'] = '';
$fields['billing']['billing_address_1']['placeholder'] = '';
//$fields['billing']['billing_address_2']['placeholder'] = '';
//$fields['billing']['billing_city']['placeholder'] = '';
//$fields['billing']['billing_postcode']['placeholder'] = '';
//$fields['billing']['billing_country']['placeholder'] = '';
//$fields['billing']['billing_state']['placeholder'] = '';
//$fields['billing']['billing_email']['placeholder'] = '';
//$fields['billing']['billing_phone']['placeholder'] = '';

/* Required billing */
//$fields['billing']['billing_first_name']['required'] = false;
//$fields['billing']['billing_last_name']['required'] = false;
//$fields['billing']['billing_company_name']['required'] = false;
//$fields['billing']['billing_address_1']['required'] = false;
//$fields['billing']['billing_address_2']['required'] = false;
//$fields['billing']['billing_city']['required'] = false;
//$fields['billing']['billing_postcode']['required'] = false;
//$fields['billing']['billing_country']['required'] = false;
//$fields['billing']['billing_state']['required'] = false;
//$fields['billing']['billing_email']['required'] = false;
//$fields['billing']['billing_phone']['required'] = false;
    
/**
 * Customize woocommerce checkout fields shipping
 */
/* Labels shipping */
//$fields['shipping']['shipping_first_name']['label'] = '';
//$fields['shipping']['shipping_last_name']['label'] = '';
//$fields['shipping']['shipping_company_name']['label'] = '';
//$fields['shipping']['shipping_address_1']['label'] = '';
//$fields['shipping']['shipping_address_2']['label'] = '';
//$fields['shipping']['shipping_city']['label'] = '';
//$fields['shipping']['shipping_postcode']['label'] = '';
//$fields['shipping']['shipping_country']['label'] = '';
//$fields['shipping']['shipping_state']['label'] = '';

/* Placeholder shipping */
//$fields['shipping']['shipping_first_name']['placeholder'] = '';
//$fields['shipping']['shipping_last_name']['placeholder'] = '';
//$fields['shipping']['shipping_company_name']['placeholder'] = '';
//$fields['shipping']['shipping_address_1']['placeholder'] = '';
//$fields['shipping']['shipping_address_2']['placeholder'] = '';
//$fields['shipping']['shipping_city']['placeholder'] = '';
//$fields['shipping']['shipping_postcode']['placeholder'] = '';
//$fields['shipping']['shipping_country']['placeholder'] = '';
//$fields['shipping']['shipping_state']['placeholder'] = '';

/* Required shipping */
//$fields['shipping']['shipping_first_name']['required'] = false;
//$fields['shipping']['shipping_last_name']['required'] = false;
//$fields['shipping']['shipping_company_name']['required'] = false;
//$fields['shipping']['shipping_address_1']['required'] = false;
//$fields['shipping']['shipping_address_2']['required'] = false;
//$fields['shipping']['shipping_city']['required'] = false;
//$fields['shipping']['shipping_postcode']['required'] = false;
//$fields['shipping']['shipping_country']['required'] = false;
//$fields['shipping']['shipping_state']['required'] = false;

/* Label and placeholder order comments */
//$fields['order']['order_comments']['label'] = '';    
$fields['order']['order_comments']['placeholder'] = '';

//print_r( $fields['billing']['billing_first_name'] );
//exit;
//[billing_first_name] => Array (
//[label] => Имя
//[required] => 
//[class] => Array ( [0] => form-row-first [1] => form-group )
//[autocomplete] => given-name
//[autofocus] => 1
//[priority] => 10
//[input_class] => Array( [0] => form-control rounded-0 p-1 ml-1 )
//[label_class] => Array( [0] => ml-1 ) )
return $fields;
}







