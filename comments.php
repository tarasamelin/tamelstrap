<?php
/**
 * The template for displaying comments.
 *
 */
if ( post_password_required() ) {
	return;
}
?>

<div class="comments-area" id="comments">

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php /*
			printf( _nx( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;',
				get_comments_number(), 'comments title', 'tath' ),
				number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
            */
			?>
		</h2>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through. ?>
			<nav class="comment-navigation" id="comment-nav-above">
				<h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'tath' ); ?></h1>
				<?php if ( get_previous_comments_link() ) { ?>
					<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments',
					'tath' ) ); ?></div>
				<?php }
                if ( get_next_comments_link() ) { ?>
					<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;',
					'tath' ) ); ?></div>
				<?php } ?>
			</nav><!-- #comment-nav-above -->
		<?php endif; // check for comment navigation. ?>

		<ol class="comment-list">
			<?php
			wp_list_comments( array(
				'style'      => 'ol',
				'short_ping' => true,
			) );
			?>
		</ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through. ?>
			<nav class="comment-navigation" id="comment-nav-below">
				<h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'tath' ); ?></h1>
				<?php if ( get_previous_comments_link() ) { ?>
					<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments',
					'tath' ) ); ?></div>
				<?php }
                if ( get_next_comments_link() ) { ?>
					<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;',
					'tath' ) ); ?></div>
				<?php } ?>
			</nav><!-- #comment-nav-below -->
		<?php endif; // check for comment navigation. ?>

	<?php endif; // endif have_comments(). ?>

	<?php
	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
		?>

		<p class="no-comments"><?php _e( 'Comments are closed.', 'tath' ); ?></p>

	<?php endif; ?>

	<?php

    //comment_form(); // Render comments form. ?>

<!--    ********************** -->
<!--    ********************** -->

   <?php

    $defaults = array(
	'fields'               => array(
								'author' => '<p class="comment-form-author form-group">' . '<label for="author">' . __( 'Name' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
											'<input class="form-control" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . $html_req . ' /></p>',
								'email'  => '<p class="comment-form-email form-group"><label for="email">' . __( 'Email' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
											'<input class="form-control" id="email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" aria-describedby="email-notes"' . $aria_req . $html_req  . ' /></p>',
								'url'    => '<p class="comment-form-url form-group"><label for="url">' . __( 'Website' ) . '</label> ' .
											'<input class="form-control" id="url" name="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>',
							),
	'comment_field'        => '<p class="comment-form-comment form-group"><label for="comment">' . _x( 'Comment', 'noun' ) . '</label> <textarea class="form-control" id="comment" name="comment" cols="45" rows="8"  aria-required="true" required="required"></textarea></p>',
//	'must_log_in'          => '<p class="must-log-in">' . sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',
//	'logged_in_as'         => '<p class="logged-in-as">' . sprintf( __( '<a href="%1$s" aria-label="Logged in as %2$s. Edit your profile.">Logged in as %2$s</a>. <a href="%3$s">Log out?</a>' ), get_edit_user_link(), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',
//	'comment_notes_before' => '<p class="comment-notes"><span id="email-notes">' . __( 'Your email address will not be published.' ) . '</span>'. ( $req ? $required_text : '' ) . '</p>',
//	'comment_notes_after'  => '',
//	'id_form'              => 'commentform',
//	'id_submit'            => 'submit',
//	'class_form'           => 'comment-form',
	'class_submit'         => 'submit btn btn-outline-primary',
//	'name_submit'          => 'submit',
//	'title_reply'          => __( 'Leave a Reply' ),
//	'title_reply_to'       => __( 'Leave a Reply to %s' ),
//	'title_reply_before'   => '<h3 id="reply-title" class="comment-reply-title">',
//	'title_reply_after'    => '</h3>',
//	'cancel_reply_before'  => ' <small>',
//	'cancel_reply_after'   => '</small>',
//	'cancel_reply_link'    => __( 'Cancel reply' ),
//	'label_submit'         => __( 'Post Comment' ),
//	'submit_button'        => '<input name="%1$s" type="submit" id="%2$s" class="%3$s" value="%4$s" />',
//	'submit_field'         => '<p class="form-submit">%1$s %2$s</p>',
//	'format'               => 'xhtml',
);

comment_form( $defaults );

?>

<!--    ********************** -->
<!--    ********************** -->

</div><!-- #comments -->
