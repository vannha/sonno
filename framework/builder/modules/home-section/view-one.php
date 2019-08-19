<div class="row containt-wrapper">
    <div class="col-md-10 col-md-offset-1 text-center">
        <?php 
            if( $spyropress_heading ){
                echo '<h3>'.  esc_html( $spyropress_heading )  .'</h3>';
            }
            if( $spyropress_sub_heading ){
                echo '<p class="headline">'.  esc_html( $spyropress_sub_heading )  .'</p>';
            }
            if( $spyropress_links ){
                echo '<p class="btn-horizontal">';
                foreach( $spyropress_links as $spyropress_link ){
                    $url = isset($spyropress_link['url']) ? $spyropress_link['url'] : '';
                    $btn_type = isset($spyropress_link['btn_type']) ? $spyropress_link['btn_type'] : '';
                    $title = isset($spyropress_link['title']) ? $spyropress_link['title'] : '';
                    $btn_colored = isset($spyropress_link['btn-colored']) ? $spyropress_link['btn-colored'][0] : '';
                    $spyropress_icon = isset( $spyropress_link['icon'] )? '<i class="'. esc_attr( $spyropress_link['icon'] ) .'"></i>' : '';
                     echo '<a href="'. esc_url( $url ) .'" class="btn '. esc_attr( $btn_type ) .' '. esc_attr( $btn_colored ) .'">'. wp_kses( $spyropress_icon, array( 'i' => array( 'class' => array() ) ) )  .' '. esc_html( $title ) .'</a>';
                }
                echo '</p>';
            }
        ?>
	</div>
	<div class="col-md-8 col-md-offset-2 text-center">
        <?php if( isset($spyropress_slides) ): ?>
    		<div class="slider-wrapper">
    			<div class="flexslider">
    				<ul class="slidess">
                        <?php 

                            foreach( $spyropress_slides as $spyropress_slide ){
                                if (isset( $spyropress_slide['spyropress_image'] )) {
                                    echo '<li><img src="'. esc_url( $spyropress_slide['spyropress_image'] ) .'" class="img-responsive"  /></li>';
                                }
                            }
                        ?>
    				</ul>
    			</div>
    		</div>
         <?php 
            endif;
            
            if( $spyropress_bg_image ){
                echo '<img src="'. esc_url( $spyropress_bg_image ) .'" class="img-slider"  />';
            }
        ?>
	</div>
</div>