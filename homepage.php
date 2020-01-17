<?php
/**
 * The template for displaying the homepage(frontpage).
 *
 * Template name: homepage
 */

get_header(); ?>

<?php get_template_part( 'template-parts/slider-standart' ); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

<div class="pt-4 pb-2 home-description-level">
    <div class="container-fluid text-center">
        <?php
        if ( have_posts() ) : 
            while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/content', 'page' );
            endwhile;
		else :
			get_template_part( 'template-parts/content', 'none' );
		endif; 
        ?>
    </div><!--container-->
</div><!--level-->
   
<!-- -------  HOME PAGE PRODUCTS CATEGOGIES ------ -->
<div class="home-categories-level py-4">
    <div class="container-fluid">
        
    <div class="row p-1 pt-1 ml-0 mr-0 product-categories">
        <?php 
        $prod_cat_args = array(
            'taxonomy'     => 'product_cat',
            'orderby'      => 'name',
            'parent'       => 0,
        //            'empty'        => 0
            'hide_empty'   => 0,
            );

        $terms = get_categories( $prod_cat_args );
            foreach ( $terms as $term ) {   
                $term_link = get_term_link( $term );
                $thumbnail_id = get_woocommerce_term_meta( $term->term_id, 'thumbnail_id', true ); 
                $img_url = wp_get_attachment_url( $thumbnail_id,'full' );
                $img_thumb_src = aq_resize( $img_url, 390, 390, true,true,true );

                echo '<div class="mb-2 p-0 col-sm-6 col-md-4 product-category">';
                echo '<a href="' . esc_url( $term_link ) . '"  class="d-block m-1 mx-4" >';
                if( $img_thumb_src ){ echo '<img class="border img-fluid w-100" src="'.$img_thumb_src.'" alt="' . $term->name . '" width="390" height="390" />'; }
				else { echo '<img class="border img-fluid w-100" src="' .wc_placeholder_img_src(). '" alt="' . $term->name . '" width="390" height="390" />'; }
                echo '<h3 class="h4 mt-1 text-center mb-0">' . $term->name . '</h3></a>';
                echo '</div>';

            }
               wp_reset_query();
        ?>   
    </div>

    </div><!--container-->
</div><!--level-->
            
<!-- --------- FEATURED PRODUCTS -------- -->  
<div class="home-featured-level py-4">
    <div class="container-fluid">
            
    <div class="row p-1 pt-1 ml-0 mr-0 products featured-products">
<!--        <h2 class="text-success text-center h3 py-2 my-3 border border-left-0 border-right-0 col-12"><?php esc_html_e( 'Featured products', 'woocommerce' ); ?>:</h2>-->
            <?php
            $args = array(
                'post_type' => 'product',
                'posts_per_page' => 12,
                'tax_query' => array(
                        array(
                            'taxonomy' => 'product_visibility',
                            'field'    => 'name',
                            'terms'    => 'featured',
                        ),
                    ),
                );
            $loop = new WP_Query( $args );
            if ( $loop->have_posts() ) {
                while ( $loop->have_posts() ) : $loop->the_post();
                    wc_get_template_part( 'content', 'product_featured' );
                endwhile;
            }
            wp_reset_postdata();
            ?>         
    </div>
            
    </div><!--container-->
</div><!--level-->            
        
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer();