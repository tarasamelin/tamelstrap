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


add_action('wp_footer', 'photoswipe_footer');
    function photoswipe_footer() {
	echo <<<EOF
<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="pswp__bg"></div>
    <div class="pswp__scroll-wrap">
        <div class="pswp__container">
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
        </div>
        <div class="pswp__ui pswp__ui--hidden">
            <div class="pswp__top-bar">
                <div class="pswp__counter"></div>
                <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
                <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
                <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
                <div class="pswp__preloader">
                    <div class="pswp__preloader__icn">
                      <div class="pswp__preloader__cut">
                        <div class="pswp__preloader__donut"></div>
                      </div>
                    </div>
                </div>
            </div>
            <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
            </button>
            <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
            </button>
            <div class="pswp__caption">
                <div class="pswp__caption__center"></div>
            </div>
        </div>
    </div>
</div>
EOF;

}


