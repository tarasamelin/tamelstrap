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
 * Gallery
 */
require_once get_template_directory().'/shortcodes/tml-gallery.php';

/*
 * TML WooCommerce Template Functions
 */
require_once get_template_directory().'/inc-wc/tml-wc-template-functions.php';

/*
 * TML WooCommerce Templates Hooks
 */
require_once get_template_directory().'/inc-wc/tml-wc-template-hooks.php';





