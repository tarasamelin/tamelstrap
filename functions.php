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
 * TATH Theme function
 */
require_once get_template_directory().'/inc/tath-functions.php';

/*
 * CPT
 */
require_once get_template_directory().'/inc/cpt.php';

/*
 * Aqua-Resizer
 */
require_once get_template_directory().'/inc/aq_resizer.php';

/*
 *  Shortcodes Galleries
 */
require_once get_template_directory().'/shortcodes/tath-gallery-shortcode.php';

/*
 * Shortcode Google Map
 */
require_once get_template_directory().'/shortcodes/tath-google-map-shortcode.php';

/*
 * TATH Shortcode Modal Window within shortcode
 */
require_once get_template_directory().'/shortcodes/tath-shortcode-modal-window-cf7.php';

// Check is WooCommerce Activated
if ( tath_is_woocommerce_activated() ){
    /*
     * TATH WooCommerce Template Functions
     */
    require_once get_template_directory().'/inc-wc/tath-wc-template-functions.php';

    /*
     * TATH WooCommerce Templates Hooks
     */
    require_once get_template_directory().'/inc-wc/tath-wc-template-hooks.php';
}