<div class="row containt-wrapper video-section">
	<div class="col-md-6">
		<div class="video-wrapper">
			<div class="video-container">
				<iframe src="<?php echo esc_url( $spyropress_video, null, 'display' ); ?>?autoplay=0&amp;rel=0&amp;showinfo=0&amp;html5=1&amp;allowscriptaccess=always&amp;enablejsapi=1&amp;origin=http%3A%2F%2F99webpage.com" title="YouTube video player"  id="ytplayer" class="player"></iframe>
			</div>
			<button class="start-video"></button>
            <?php 
                if( $spyropress_bg_image ){
                    echo '<div class="video-image"><img src="'. esc_url( $spyropress_bg_image ) .'" class="img-responsive"  /></div>';
                }
            ?>
		</div>
		<img src="<?php echo esc_html( assets_img( 'shadow-video.png' ) ); ?>" class="img-responsive"  />
	</div>
	
	<div class="col-md-6">
        <?php 
            if( $spyropress_heading ){
                echo '<h2>'.  wp_kses( $spyropress_heading, array( 'br' => array() ) )  .'</h2>';
            }
            if( $spyropress_sub_heading ){
                echo '<p class="headline">'.  esc_html( $spyropress_sub_heading )  .'</p>';
            }
            if( $spyropress_lists ){
                echo '<ul class="list-unstyled list-lg">';
                    foreach( $spyropress_lists as $spyropress_list ){
                        if (isset($spyropress_list['spyropress_list'])) {
                            echo '<li><i class="icon-checkmark icon-secondary"></i> '. esc_html( $spyropress_list['spyropress_list'] ) .'</li>';
                        }
                    }
                echo '</ul>';
            }
        ?>
	</div>
</div>