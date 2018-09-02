<?php
/*
 * Theme setup
 */
require_once get_template_directory().'/inc/setup.php';

/*
 * Enqueue scripts and styles.
 */
require_once get_template_directory().'/inc/enqueue.php';

/*
 * primary walker nav menu.
 */
require_once get_template_directory().'/inc/primary-walker-nav-menu.php';

/*
 * SideBar widget NavMenu
 */
require_once get_template_directory().'/inc/widget-nav-menu.php';

/*
 * tml custome function
 */
require_once get_template_directory().'/inc/tml-functions.php';

/*
 * tml CPT
 */
require_once get_template_directory().'/inc/cpt.php';

/*
 * Aqua-Resizer
 */
require_once get_template_directory().'/inc/aq_resizer.php';

/*
 *  Shortcodes Galleries
 */
require_once get_template_directory().'/shortcodes/tml-gallery.php';
//require_once get_template_directory().'/shortcodes/tml-gallery2.php';
/* carousel incomplete */
//require_once get_template_directory().'/shortcodes/tml-items-carousel.php';

/*
 * Shortcode Contact form
 */
require_once get_template_directory().'/shortcodes/tml-contact-form.php';

/*
 * Shortcode Google Map
 */
require_once get_template_directory().'/shortcodes/tml-google-map.php';
//require_once get_template_directory().'/shortcodes/tml-google-map2.php';
//require_once get_template_directory().'/shortcodes/tml-google-map2-markers.php';

/*
 * Shortcode Socila Share
 */
require_once get_template_directory().'/shortcodes/tml-social-share.php';

/*
 * TML WooCommerce Template Functions
 */
require_once get_template_directory().'/inc-wc/tml-wc-template-functions.php';

/*
 * TML WooCommerce Templates Hooks
 */
require_once get_template_directory().'/inc-wc/tml-wc-template-hooks.php';

/*
 * TML WooCommerce Custome Checkout Fields
 */
require_once get_template_directory().'/inc-wc/tml-wc-custome-checkout-fields.php';

/*
 * TML WooCommerce Custome Payment gateway
 */
require_once get_template_directory().'/inc-wc/tml-wc-custome-payment-gateway.php';
