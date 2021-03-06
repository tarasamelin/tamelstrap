<?php
/*
* Template part for displaying Slider
*/
defined( 'ABSPATH' ) || exit;

$slider = new WP_Query( ['post_type' => 'tath-slide'] );?>
<?php if( $slider->have_posts() && is_front_page() ) : ?>
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">

    <?php while( $slider->have_posts() ) : $slider->the_post(); ?>

        <?php
        $thumb = get_post_thumbnail_id();
        $img_url = wp_get_attachment_url( $thumb,'full' );
        $image = aq_resize( $img_url, 1500, 500, true,true,true );
        ++$i
        ?>

        <?php if( $image ) : ?>
      
            <?php if($i == 1 ) : ?>
            <div class="carousel-item active">
            <?php else : ?>
            <div class="carousel-item">
            <?php endif; ?>
                
                <?php $slide_link = get_post_custom();
                if( isset($slide_link['SLIDE_LINK']) ){ echo '<a href="'.$slide_link['SLIDE_LINK'][0].'">'; }?>
<!--                    <img class="d-block w-100" src="<?php echo $image ?>" alt="<?php the_title(); ?>">-->
                
                    <div class="slide-div-bg-cover" style="background-image:url(<?php echo $image ?>)"></div>    
                
                    <div class="px-2 carousel-caption">
                        <h3 class="d-inline-block text-white slide-title"><?php the_title(); ?></h3>
                        <div class="h5">
                        <?php the_content(); ?>
                        </div>
                    </div>
                
                <?php if( isset($slide_link['SLIDE_LINK']) ){ echo '</a>'; }?>
            </div>
        
        <?php endif; ?>

    <?php endwhile; ?>

  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<?php endif;?>
