
<?php
/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() ) return;

    //Translation Theme Options
    $spyropress_translate['comment'] = get_setting( 'translate' ) ? get_setting( 'translate-comment', 'Comment' ) : esc_html__( 'Comment', 'sonno' );
    $spyropress_translate['comments'] = get_setting( 'translate' ) ? get_setting( 'translate-comments', 'Comments' ) : esc_html__( 'Comments', 'sonno' );
    $spyropress_translate['comments-off'] = get_setting( 'translate' ) ? get_setting( 'translate-comments-off', 'Comments are closed.' ) : esc_html__( 'Comments are closed.', 'sonno' );

?>

<div class="comment-wrapper">
<?php if ( ! comments_open() ) { echo '<p class="no-comments">' . esc_html( $spyropress_translate['comments-off'] ) . '</p>'; } ?>
    <?php if ( have_comments() ) { ?>
        <h4>
		 <?php
            $num_comments = get_comments_number();
            if( $num_comments != 1 )
                printf( '%1$s <span>( %2$s )</span> ', esc_html( $spyropress_translate['comments'] ), number_format_i18n( $num_comments ) );
            else
                printf( '%1$s <span>( %2$s )</span> ', esc_html( $spyropress_translate['comment'] ), number_format_i18n( $num_comments ) );
        ?>
		</h4>
    <?php } ?>
    <div class="comment-form">
        <?php
            $req = get_option( 'require_name_email' );
            $aria_req = ( $req ? " aria-required='true'" : '' );
        
            $spyropress_fields = array();
            $spyropress_fields['author'] = '<div class="row"><div class="col-md-6"><input id="author" name="author" type="text" class="form-control" placeholder="Name" value="' . esc_attr( $commenter['comment_author'] ) . '"' . $aria_req . ' /></div>';
            $spyropress_fields['email'] = '<div class="col-md-6"><input id="email" name="email" type="text" class="form-control" placeholder="Email" value="' . esc_attr(  $commenter['comment_author_email'] ) . '"' . $aria_req . ' /></div></div>';
            
            $spyropress_args = array(
                'fields' => $spyropress_fields,
                'comment_field' => '<div class="row"><div class="col-md-12"><textarea id="comment" name="comment" rows="9" class="form-control" placeholder="Message"></textarea></div></div>',
                'format' => 'html5',
                'label_submit' => esc_html__( 'Submit Comment', 'sonno' ),
                'comment_notes_before' => '<p class="comment-notes">' . esc_html__( 'Your email address will not be published.', 'sonno' ) . '</p>',
                'comment_notes_after' => ''
            );
        
            ob_start();
            comment_form( $spyropress_args );
            $spyropress_comment_form = ob_get_clean();
        
            $spyropress_comment_form = str_replace( '<p class="form-submit">', '<p class="form-submit field">', $spyropress_comment_form );
            $spyropress_comment_form = str_replace( 'class="submit"', 'class="btn btn-primary btn-bavel btn-x-lg"', $spyropress_comment_form );
        
            echo sonno_html( $spyropress_comment_form );
        ?>
    </div>

	<?php if ( have_comments() ) { ?>
		<?php
			/*wp_list_comments( array(
				'format'      => 'html5',
                'style' => 'div',
				'short_ping'  => true,
                'callback' => 'spyropress_comment'
			) );*/
		?>
        <ul class="comment-list">

            <?php

                

                wp_list_comments( array(

                    'format'      => 'html5',

                    'short_ping'  => true,

                    'callback' => 'spyropress_comment'

                ) );

                

            ?>

            

        </ul><!-- .comment-list -->

		<?php
			// Are there comments to navigate through?
			if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
		?>
		<nav class="navigation comment-navigation" role="navigation">
			<h1 class="screen-reader-text section-heading"><?php echo esc_html__( 'Comment navigation', 'sonno' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'sonno' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'sonno' ) ); ?></div>
		</nav><!-- .comment-navigation -->
		<?php endif; // Check for comment navigation ?>

	<?php
        }
    ?>
</div>