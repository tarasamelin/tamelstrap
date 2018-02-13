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

<div id="page" class="site text-dark">
   
    <header id="masthead" class="site-header bg-white border border-right-0 border-left-0 border-top-0" role="banner">                
        <nav class="container navbar navbar-expand-lg navbar-light">
<!--                    <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>-->
                    <?php tml_the_custom_logo();?>
                    <button class="navbar-toggler border" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                <?php 
                wp_nav_menu( array(
                    'theme_location' => 'primary-menu',
                    'container'       => '', 
//                    'container_class' => '',
//                    'container_id'    => '',
                    'menu_class' => 'navbar-nav',
                    'walker' => new Primary_Walker_Nav_Menu()
                    ) );
                if ( tml_is_woocommerce_activated() ){
                    do_action( 'tml_header_cart' );
                }
                ?>
  
            </div>
        </nav>
    </header>

<?php get_template_part( 'template-parts/slider' ); ?>
<div id="content" class="site-content container">