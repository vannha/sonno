<div class="container">
    <div class="row">
        <div class="col-md-3 footer-item">
            <?php
                //Socil Icons List.
                if( $spyropress_social_icons = get_setting_array( 'social_icons' ) ){
                    echo '<ul class="social-network">';
                        foreach( $spyropress_social_icons as $spyropress_social_icon ){
                            echo '<li><a href="'. esc_url( $spyropress_social_icon['link'] ) .'"><span class="icon '. esc_attr( $spyropress_social_icon['network'] ) .'"></span></a></li>';
                        }
                    echo '</ul>';
                } 
                //Copy Write Text.
                if( get_setting( 'footer_copyright' ) ){
                    echo get_setting( 'footer_copyright' );
                }
            ?>
        </div>
        <div class="col-md-2 footer-item">
            <?php 
                if( is_active_sidebar( 'footer-1' ) ){
                    dynamic_sidebar( 'footer-1' );
                }
            ?>
        </div>
        <div class="col-md-2 footer-item">
            <?php 
                if( is_active_sidebar( 'footer-2' ) ){
                    dynamic_sidebar( 'footer-2' );
                }
            ?>
        </div>
        <div class="col-md-5 footer-item">
            <?php 
                if( is_active_sidebar( 'footer-3' ) ){
                    dynamic_sidebar( 'footer-3' );
                }
            ?>
        </div>
    </div>
</div>