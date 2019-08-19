<?php
/**
 * Archive Page Template
 * 
 * @package Sonno
 * @author ThemeSuared
 * @link http://themesuared.com/sonno/
 */

    get_header();
    
    spyropress_before_main_container(); 
        get_template_part( 'templates/page', 'breadcrumb' );  //Include Page Breadcrumb Html.
?>
        <div class="clearfix"></div>
        <div class="inner-page">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <?php
                            spyropress_before_loop();
                            if( have_posts() ) {
                                while( have_posts() ) {
                                    the_post();
                                    
                                    spyropress_before_post();
                                        get_template_part( 'templates/formats/content', get_post_format() );  
                                    spyropress_after_post();
                                }
                                //Pagination
                                wp_pagenavi();
                            }else{
                                echo '<h3>'.esc_html__( 'Sorry No Post Where Found', 'sonno' ).'</h3>';
                            } 
                            spyropress_after_loop();
                        ?>
                    </div>
                    
                    <div class="col-md-3">
                        <?php if( is_active_sidebar( 'primary' ) ): ?>
                            <aside>
                                <?php dynamic_sidebar( 'primary' ); ?>
                            </aside>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
<?php 
    spyropress_after_main_container(); 
get_footer(); 