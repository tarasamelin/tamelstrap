<?php
/** 
 * TML ShortCode
 *
 * Modal window shortcond within shortcod CF7
 * [tath_modal title="teie küsimus" id=""][some_shortcode][/tath_modal]
 */

add_shortcode( 'tath_modal', 'tath_modal' );

function tath_modal( $atts, $content = null){
    extract( shortcode_atts( array(
        "title" => 'button',
        "id" => ' ', 
        "class" => 'modal-windwow-button', 
    ), $atts ) );

    ob_start();
    ?>
    <!-- Open Button -->
    <a class="mr-1 btn btn-outline-secondary rounded-0 <?php echo $class;?>" data-toggle="modal" data-target=".bd-example-modal-lg<?php echo '.modal-windwow'.$id;?>"><?php echo $title;?></a>
    <!-- Large modal Window -->
    <div class="bg-light pr-0 modal fade bd-example-modal-lg <?php echo 'modal-windwow'.$id;?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="rounded-0 border-0 modal-content">
            <!-- Close Button-->
            <div class="border-0 pb-0 modal-header">
                <button type="button" class="h1 close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"> X </span></button>
            </div>
            <!-- container modal-body -->
            <div class="pt-0 container-fluid modal-body">
                <div class="row p-1 ml-0 mr-0 product-categories justify-content-center">
                    <?php echo do_shortcode($content);?>
                </div>
            </div>   
        </div>
      </div>
    </div>


    <?php
    $html = ob_get_clean();
    return $html;
}