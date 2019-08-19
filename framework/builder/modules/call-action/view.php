<div class="bg-content">
	<div class="content">
		<?php
            //Module Title
            if ( !empty( $spyropress_title ) ){
                echo '<h4>' . wp_kses( $spyropress_title, array( 'b' => array() ) ). '</h4>';
            } 
            
            //Mdule Sub Title.
            if ( !empty( $spyropress_sub_title ) ){
               echo '<p>' . esc_html( $spyropress_sub_title ) . '</p>'; 
            } 
            
            //Module Button
            $spyropress_url_text = ( $url_text ) ? $url_text : '';
            $spyropress_url = ( $link_url ) ? get_permalink( $link_url ) : $url;
            if ( $url ){
                echo '<a href="' . esc_url( $spyropress_url ) . '" class="btn btn-primary btn-bavel btn-lg btn-x-lg">' . esc_html( $spyropress_url_text ) . ' <i class="icon-arrow-right2"></i></a>';
            } 
        ?>
	</div>
</div>