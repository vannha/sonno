<?php 
    //Translation Theme Options
    $spyropress_translate['blog-title'] = get_setting( 'translate' ) ? get_setting( 'blog-title', 'Recent News &amp; Article <strong>Our Blog</strong>' ) : esc_html__( 'Recent News &amp; Article', 'sonno' ).'<strong>Our Blog</strong>';
    $spyropress_translate['cat-title'] = get_setting( 'translate' ) ? get_setting( 'cat-title', 'Category: <strong>%s</strong>' ) : esc_html__( 'Category:', 'sonno' ).' <strong>%s</strong>';
    $spyropress_translate['tag-title'] = get_setting( 'translate' ) ? get_setting( 'tag-title', 'Tag: <strong>%s</strong>' ) : esc_html__( 'Tag:', 'sonno' ).' <strong>%s</strong>';
    $spyropress_translate['day-title'] = get_setting( 'translate' ) ? get_setting( 'day-title', 'Daily: <strong>%s</strong>' ) : esc_html__( 'Daily:', 'sonno' ).' <strong>%s</strong>';
    $spyropress_translate['month-title'] = get_setting( 'translate' ) ? get_setting( 'month-title', 'Monthly: <strong>%s</strong>' ) : esc_html__( 'Monthly:', 'sonno' ).' <strong>%s</strong>';
    $spyropress_translate['year-title'] = get_setting( 'translate' ) ? get_setting( 'year-title', 'Yearly: <strong>%s</strong>' ) : esc_html__( 'Yearly:', 'sonno' ).' <strong>%s</strong>';
    $spyropress_translate['search-title'] = get_setting( 'translate' ) ? get_setting( 'search-title', 'Search results: <strong>%s</strong>' ) : esc_html__( 'Search results:', 'sonno' ).' <strong>%s</strong>';
    $spyropress_translate['404-title'] = get_setting( 'translate' ) ? get_setting( 'error-404-title', 'Ooops... Error <strong>404</strong>' ) : esc_html__( 'Ooops... Error', 'sonno' ).' <strong>404</strong>';
    
?>
<div class="inner-heading">
    <div class="container">
        <div class="row">
			<div class="col-md-12 text-center">
				<div class="title-section">
					<h3><?php 
                        if( is_home() || is_single() && !is_singular( 'portfolio' ) ) :
                            echo wp_kses( $spyropress_translate['blog-title'], array( 'strong' => array() ) );
                        elseif ( is_category() ) :
                        	printf( wp_kses( $spyropress_translate['cat-title'], array( 'strong' => array() ) ), single_cat_title( '', false ) );
                        elseif ( is_tag() ) :
                        	printf( wp_kses( $spyropress_translate['tag-title'], array( 'strong' => array() ) ), single_tag_title( '', false ) );
                        elseif ( is_day() ) :
                        	printf( wp_kses( $spyropress_translate['day-title'], array( 'strong' => array() ) ), get_the_date() );
                        elseif ( is_month() ) :
                        	printf( wp_kses( $spyropress_translate['month-title'], array( 'strong' => array() ) ), get_the_date( _x( 'F Y', 'monthly archives date format', 'sonno' ) ) );
                        elseif ( is_year() ) :
                        	printf( wp_kses( $spyropress_translate['year-title'], array( 'strong' => array() ) ), get_the_date( _x( 'Y', 'yearly archives date format', 'sonno' ) ) );
                        elseif( is_search() ):
                            printf( wp_kses( $spyropress_translate['search-title'], array( 'strong' => array() ) ), get_search_query() );
                        elseif( is_404() ):
                            echo wp_kses( $spyropress_translate['404-title'], array( 'strong' => array() ) );
                        else :
                        	echo get_the_title( get_queried_object_id() );
                        endif;
                     ?></h3>
				</div>
			</div>
		</div>
	</div>
</div>