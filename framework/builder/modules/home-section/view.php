<div class="row form-wrapper">
	<div class="col-md-10 col-sm-12">
        <?php 
            if( $spyropress_bg_image ){
                echo '<img src="'. esc_url( $spyropress_bg_image ) .'" class="img-responsive"  />';
            }
        ?>
	</div>
	<div class="main-form">
        <?php 
            if( $spyropress_heading ){
                echo '<h3>'.  wp_kses( $spyropress_heading, array( 'span' => array() ) )  .'</h3>';
            }
            if( $spyropress_sub_heading ){
                echo '<p>'.  esc_html( $spyropress_sub_heading )  .'</p>';
            }
            if( $spyropress_frm_shortcode ){
                echo do_shortcode( $spyropress_frm_shortcode );
            }
        ?>
	</div>
</div>