<?php
/**
 * The template for displaying the header
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<div id="page" class="site">

<header id="masthead" class="site-header bg-white border border-right-0 border-left-0 border-top-0" role="banner" itemscope itemtype="https://schema.org/WPHeader">
    
    <div  class="top-header-level border border-right-0 border-left-0 border-top-0">
        <div class="py-sm-1 container-fluid">
            <div class="row justify-content-center justify-content-lg-between mx-1">
                
                <div class="py-0 pl-0 navbar navbar-expand">
                   <?php if ( has_nav_menu( 'polylang-menu' ) ) {
                    wp_nav_menu( array(
                        'theme_location' => 'polylang-menu',
                        'container'       => '',
                        'container_class' => '',
                        'menu_class' => 'navbar-nav polylang-menu justify-content-center',
                        'walker' => new Primary_Walker_Nav_Menu()
                    ) );
                    }?>
                </div>
                
                <div class="text-center d-lg-inline-block">
                   <?php dynamic_sidebar( 'top-header-col-1' ); ?>
                </div>
                
                <div class="text-center d-lg-inline-block">
                   <?php dynamic_sidebar( 'top-header-col-2' ); ?>
                </div>
                
            </div>
        </div>
    </div>
    
    <div  class="main-nav-level">
        <nav class="container-fluid navbar navbar-expand-lg navbar-light">
<!--        <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>-->
            
            <?php tml_the_custom_logo();?>
            <button class="navbar-toggler border" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
                    
            <div class="collapse navbar-collapse justify-content-center" id="navbarNavDropdown" itemscope itemtype="https://www.schema.org/SiteNavigationElement">
                <?php if ( has_nav_menu( 'primary-menu' ) ) {
                wp_nav_menu( array(
                    'theme_location' => 'primary-menu',
                    'container'       => '', 
//                    'container_class' => '',
//                    'container_id'    => '',
                    'menu_class' => 'navbar-nav text-right',
                    'walker' => new Primary_Walker_Nav_Menu()
                    ) );
                }?>
                <ul class="d-lg-none pb-4 navbar-nav text-right tml-wc-mini-cart-mobile">
                    <li class="nav-item">
                        <a class="cart-mobile-link" href="<?php echo esc_url( wc_get_cart_url() ); ?>" >
                            <span class="pl-1 text-uppercase"><?php esc_attr_e( 'Cart', 'woocommerce' ); ?> </span> <i class="fas fa-shopping-basket"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="d-none d-lg-inline-block" >
                <?php 
                if ( tml_is_woocommerce_activated() ){
                    do_action( 'tml_header_cart' );
                }
                ?>
            </div>
            
        </nav>
    </div>

</header>

<?php get_template_part( 'template-parts/breadcrumbs'); ?>

<div id="content" class="site-content <?php if(!is_front_page()){echo 'container-fluid';}else{echo '';} ?>">

<?php get_template_part( 'template-parts/slider' ); ?>
