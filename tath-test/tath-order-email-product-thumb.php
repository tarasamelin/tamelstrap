<?php
// Edit order items table template defaults
function sww_add_wc_order_email_images( $table, $order ) {

ob_start();
$template = $plain_text ? 'emails/plain/email-order-items.php' : 'emails/email-order-items.php';
wc_get_template( $template, array(
'order' => $order,
'items' => $order->get_items(),
'show_download_links' => $show_download_links,
'show_sku' => true,
'show_purchase_note' => $show_purchase_note,
'show_image' => true,
'image_size' => array( 150, 150 )
) );

return ob_get_clean();
}
add_filter( 'woocommerce_email_order_items_table', 'sww_add_wc_order_email_images', 10, 2 );

function sww_edit_order_item_name( $name ) {
return '<br />' . $name;
}
add_filter( 'woocommerce_order_item_name', 'sww_edit_order_item_name' );