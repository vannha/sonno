<?php
/**
 * Module: Blog
 * Display a list of posts
 *
 * @author 		SpyroSol
 * @category 	BuilderModules
 * @package 	Spyropress
 */

class Spyropress_Module_Blog extends SpyropressBuilderModule {

    public function __construct() {

        // Widget variable settings.
        $this->path = get_template_directory().'/framework/builder/modules/blog';
        $this->description = esc_html__( 'Display a list of posts', 'sonno' );
        $this->id_base = 'recent_posts';
        $this->name = esc_html__( 'Blog', 'sonno' );
        
        // Fields
        $this->fields = array(
        
            array(
                'label' => esc_html__( 'Number of items per page', 'sonno' ),
                'id' => 'limit',
                'type' => 'range_slider',
                'std' => 6
            ),
            
            array(
                'label' => esc_html__( 'Category', 'sonno' ),
                'id' => 'cat',
                'type' => 'multi_select',
                'options' => spyropress_get_taxonomies( 'category' )
            )
        );

        $this->create_widget();
    }

    function widget( $spyropress_args, $spyropress_instance ) {

        // extracting info
        extract( $spyropress_args ); extract( $spyropress_instance );

        // get view to render
        require( $this->get_view() );
    }
    
    function spyropress_query( $spyropress_atts, $spyropress_content = null ) {

        $spyropress_default = array (
            'limit' => -1,
            'pagination' => true,
            'columns' => false,
            'row' => false,
            'callback' => array( $this, 'spyropress_generate_post_item' ),
            'paged' => get_page_query()
        );
        $spyropress_atts = wp_parse_args( $spyropress_atts, $spyropress_default );
    
        if ( ! empty( $spyropress_atts['cat'] ) ) {
    
            $spyropress_atts['tax_query']['relation'] = 'OR';
            if ( ! empty( $spyropress_atts['cat'] ) ) {
                $spyropress_atts['tax_query'][] = array(
                    'taxonomy' => 'category',
                    'field' => 'slug',
                    'terms' => $spyropress_atts['cat'],
                );
                unset( $spyropress_atts['cat'] );
            }
        }
        
        if ( $spyropress_atts['limit'] ) {
            $spyropress_atts['posts_per_page'] = $spyropress_atts['limit'];
            unset( $spyropress_atts['limit'] );
    
            if ( $spyropress_atts['pagination'] ) {
                $spyropress_atts['paged'] = get_page_query();
            }
        }
    
        if ( $spyropress_content )
            return token_repalce( $spyropress_content, spyropress_query_generator( $spyropress_atts ) );

        return spyropress_query_generator( $spyropress_atts );
    }
    
    function spyropress_generate_post_item( $post_ID, $spyropress_atts ) {
        
        // these arguments will be available from inside $content
        $spyropress_image = array(
            'post_id' => $post_ID,
            'echo' => false,
            'class' => 'img-responsive'
        );
        $spyropress_image_tag = spyropress_get_image( $spyropress_image );
        
         
          
        $spyropress_color_class = get_post_meta( $post_ID, 'type', true );
        
        ob_start(); 
        
        ?>
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
                //Post Thuminal Image.
                if( !empty( $spyropress_image_tag ) ){
                    echo '<div class="post-image"><a href="'. esc_url( get_permalink() ) .'">'. spyropress_get_image( $spyropress_image ) .'</a></div>';
                }
            ?>
            <div class="post-article">
                <h5 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                <?php echo spyropress_get_excerpt( array( 'length' => 10 ) ); ?>
            </div>
            <?php  $link_to_post = get_setting( 'excerpt_link_to_post', false ); ?>
            <?php if( $link_to_post != false ): ?>
                <a href="<?php the_permalink(); ?>" class="btn btn-primary btn-bavel"><?php echo get_setting( 'excerpt_link_text' ); ?></a>
            <?php endif ?>
        </div>
       <?php  
       
       //Return Html Content
       return ob_get_clean();
    }

}
//Rigester Class Spyropress_Module_Blog.
spyropress_builder_register_module( 'Spyropress_Module_Blog' );