<?php
// chcek
if ( empty( $spyropress_tabs ) ) return;

$spyropress_count = 0; $spyropress_tab_nav = $spyropress_tabs_content = '';
foreach( $spyropress_tabs as $spyropress_tab ) {
    ++$spyropress_count;
    $spyropress_li_class = ( $spyropress_count == 1 ) ? ' class="current"' : '';
    $spyropress_title = isset( $spyropress_tab['spyropress_title'] ) ? $spyropress_tab['spyropress_title'] : esc_html__( 'Tab ', 'sonno' ).$spyropress_count;
    $spyropress_content = isset( $spyropress_tab['spyropress_content'] ) ? $spyropress_tab['spyropress_content'] : '';
    $spyropress_tab_nav .= '<li' . $spyropress_li_class . '>' . esc_html( $spyropress_title ) . '</li>';
    $spyropress_tabs_content .= '<div class="slide">';
    
    // content
    if( isset( $spyropress_tab['bucket'] ) ) {
        $spyropress_args = array(
            'post_type' => 'bucket',
            'p' => $spyropress_tab['bucket']
        );
        $spyropress_query = new WP_Query( $spyropress_args );
        while( $spyropress_query->have_posts() ) {
            $spyropress_query->the_post();
            $spyropress_tabs_content .= spyropress_get_the_content();
        }
    }
    else {
        $spyropress_tabs_content .= do_shortcode( $spyropress_content );
    }
    $spyropress_tabs_content .= '</div> <!-- end tab-pane -->';
}
wp_reset_postdata();
?>
<div id="tab-slider" class="jwg_slider_module">
    <div class="tabbed_navigation">
        <ul>
            <?php echo sonno_html( $spyropress_tab_nav ); ?>
        </ul>
    </div>

    <div class="slides"> 
        <?php echo sonno_html( $spyropress_tabs_content ); ?>
    </div>
</div> <!-- end tabbable -->