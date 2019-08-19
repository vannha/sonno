<?php
    //check posts limits.
    if( empty( $spyropress_number ) ) return;
    
    //Get Recent Posts. 
    $spyropress_posts = new WP_Query( apply_filters( 'widget_posts_args', array( 'posts_per_page' => $spyropress_number, 'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => true ) ) );
     
    echo wp_kses_post( $before_widget );
        
        //Check and Print Widget Title.
        if ( $spyropress_title ){ 
            echo wp_kses_post( $before_title . $spyropress_title . $after_title ); 
        }
     
        //Check Posts.   
        if ( $spyropress_posts->have_posts() ) :
?>      
		   <ul class="recent">
        		<?php while ( $spyropress_posts->have_posts() ) : $spyropress_posts->the_post(); ?>
                    <li>
                        <a href="<?php the_permalink() ?>" class="post-thumb" ><?php spyropress_get_image( array( 'class' => 'img-responsive', 'responsive' => true, 'crop' => true, 'width' => 45, 'height' => 45, 'retina' => true ) ); ?></a>
     					<h6><?php the_title(); ?></h6>
                        <?php echo spyropress_get_excerpt( array( 'length' => 4,  'link_to_post' => false ) ); ?>
        			</li>
        		<?php endwhile; ?>
		   </ul>
        
<?php
    		// Reset the global $the_post as this query will have stomped on it
    		wp_reset_postdata();
        endif;  
        
    echo wp_kses_post( $after_widget ); 