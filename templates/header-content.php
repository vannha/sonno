<nav class="navbar navbar-fixed-top">
	<div class="container relative">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
				<span class="icon icon-menu"></span>
			</button>
            <?php spyropress_logo( array( 'brand' => true ) )  //Site Logo.?>
		</div>
		<div id="navbar" class="navbar-collapse collapse">
            <?php 
                //Get Page Option Value.
                $spyropress_page_options = get_post_meta( get_the_ID(), '_page_options', true );
                
                if( isset( $spyropress_page_options['onepage_menu'] ) ):
                    
                    $spyropress_menu = wp_nav_menu( array(
                        'container' => false,
                        'menu_class' => 'nav navbar-nav',
                        'menu_id' => '',
                        'menu' => $spyropress_page_options['onepage_menu'],
                        'echo' => false,
                        'walker' => new Bootstrapwp_Walker_Nav_Menu
                    ) );
                
                else:
                
                    $spyropress_menu = spyropress_get_nav_menu( array(
                        'container' => false,
                        'menu_class' => 'nav navbar-nav',
                        'menu_id' => '',
                        'echo' => false,
                        'walker' => new Bootstrapwp_Walker_Nav_Menu
                    ),'primary' );
                    
                endif;
                    
                $spyropress_url = ( is_front_page() ) ? '#' : '#';
                echo str_replace( '#HOME_URL#', $spyropress_url, $spyropress_menu );
                
                //Registeration and Custom Links
                if(  $spyropress_links = get_setting_array( 'links' ) ){
                    echo '<ul class="navbar-right">';
                        foreach( $spyropress_links as $spyropress_link ){
                            $spyropress_link['btn-colored'][0] = !empty( $spyropress_link['btn-colored'][0] ) ? $spyropress_link['btn-colored'][0] : '';
                            //Icons
                            $spyropress_icon = isset( $spyropress_link['icon'] )? '<i class="'. esc_attr( $spyropress_link['icon'] ) .'"></i>' : '';
                            echo '<li><a href="'. esc_url( $spyropress_link['url'] ) .'" class="btn '. esc_attr( $spyropress_link['btn_type'] ) .' '. esc_attr( $spyropress_link['btn-colored'][0] ) .'">'. wp_kses( $spyropress_icon, array( 'i' => array( 'class' => array() ) ) ) .' '. esc_html( $spyropress_link['title'] ) .'</a></li>';
                        
                        }
                    echo '</ul>';
                }
            ?>
		</div><!--/.nav-collapse -->
	</div>
</nav>