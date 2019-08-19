<?php 
     // these arguments will be available from inside $content
    $spyropress_image = array(
        'post_id' => get_the_ID(),
        'echo' => false,
        'class' => 'img-responsive'
    );
    $spyropress_image_tag = spyropress_get_image( $spyropress_image ); 
    
    $spyropress_color_class = get_post_meta( get_the_ID(), 'type', true );
    
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
    <div class="post-item <?php echo esc_attr( $spyropress_color_class ); ?>">
        <div class="post-meta">
            <div class="date"><?php echo get_the_date('d'); ?></div>
            <div class="month"><?php echo get_the_date('F'); ?></div>
            <div class="comment">
               	    <?php 
               	    	$num_comments = get_comments_number();
               	    	printf( '<span class="icon icon-chat"></span> %1$s',  number_format_i18n( $num_comments ) );
               	    ?>
                </div>
        </div>
        <?php
              //Post Thumnial Image.  
              if( !empty( $spyropress_image_tag ) ){
                  echo '<div class="post-image"><a href="'. get_permalink() .'">'. spyropress_get_image( $spyropress_image ) .'</a></div>';
              } 
        ?>
        <div class="post-article">
            <h5 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
            <?php
                if( is_single() ){
                    the_content();
                    wp_link_pages( array(
                    'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'sonno' ) . '</span>',
                    'after'       => '</div>',
                    'link_before' => '<span>',
                    'link_after'  => '</span>',
                  ) );
               
                }else{
                    echo spyropress_get_excerpt();
                }  
            ?>
        </div>
        <?php  $link_to_post = get_setting( 'excerpt_link_to_post', false ); ?>
        <?php if( !is_singular() &&  $link_to_post != false ): ?>
            <a href="<?php the_permalink(); ?>" class="btn btn-<?php echo esc_attr( $spyropress_color_class ); ?> btn-bavel"><?php echo get_setting( 'excerpt_link_text' ); ?></a>
        <?php endif; ?>
    </div>
</article>