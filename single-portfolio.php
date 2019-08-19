<?php 
/**
 * Portfolio Single Template
 * 
 * @package Sonno
 * @author ThemeSuared
 * @link http://themesuared.com/sonno/
 */
    //Translation Theme Options
    $spyropress_translate['portfolio-detail'] = get_setting( 'translate' ) ? get_setting( 'portfolio-detail', 'Product detail :' ) : esc_html__( 'Product detail :', 'sonno' );
    $spyropress_translate['portfolio-name'] = get_setting( 'translate' ) ? get_setting( 'portfolio-name', 'Name' ) : esc_html__( 'Name', 'sonno' );
    $spyropress_translate['portfolio-categorie'] = get_setting( 'translate' ) ? get_setting( 'portfolio-categorie', 'Categorie' ) : esc_html__( 'Categorie', 'sonno' );
    $spyropress_translate['portfolio-type'] = get_setting( 'translate' ) ? get_setting( 'portfolio-type', 'Type' ) : esc_html__( 'Type', 'sonno' );
    $spyropress_translate['portfolio-size'] = get_setting( 'translate' ) ? get_setting( 'portfolio-size', 'SIze' ) : esc_html__( 'SIze', 'sonno' );
    $spyropress_translate['portfolio-licence'] = get_setting( 'translate' ) ? get_setting( 'portfolio-licence', 'Licence' ) : esc_html__( 'Licence', 'sonno' );
    $spyropress_translate['portfolio-description'] = get_setting( 'translate' ) ? get_setting( 'portfolio-description', 'Description :' ) : esc_html__( 'Description :', 'sonno' );

    get_header(); 

    spyropress_before_main_container(); 
    
    	get_template_part( 'templates/page', 'breadcrumb' );  //Include Page Breadcrumb Html.
 ?>
<div class="inner-page">
    <div class="container">
        <div class="row">
            <?php 
                spyropress_before_loop(); 
                  if( have_posts() ) {  
                    while( have_posts() ) {

                        the_post();
                        spyropress_before_post();
                        
                        //Meta data Information.
                        $spyropress_data = get_post_meta( get_the_ID(), '_portfolio_details', true );
                        
                        //Post Categories.
                        $spyropress_terms = get_the_terms( get_the_ID(), 'portfolio_category' );
                        $spyropress_cats = array();
                        if ( !is_wp_error( $spyropress_terms ) && !empty($spyropress_terms ) ) {
                            foreach ( $spyropress_terms as $spyropress_term ) {
                                $spyropress_cats[] = $spyropress_term->slug;
                            }
                        }
             
            ?>
            			<div class="col-md-9">
                            <div class="product-detail">
                                <?php 
                                    //Check And Print Gallery.
                                    if( isset($spyropress_data['gallery']) && !empty ($spyropress_data['gallery']) &&  $spyropress_data['display'] == 'gallery' ) {
                                        $spyropress_ids = explode( ',', str_replace( array( '[gallery ids=', ']', '"' ), '', $spyropress_data['gallery'] ) );
                                        if ( !empty( $spyropress_ids ) ) {
                                            echo '<div class="flexslider"><ul class="slidess">';
                                                foreach( $spyropress_ids as $spyropress_id ) {
                                                    $spyropress_image_url = spyropress_get_image( array(
                                                        'attachment' => $spyropress_id,
                                                        'type' => 'src',
                                                        'echo' => false        
                                                    ));
                                                    
                                                    if( empty( $spyropress_image_url ) )continue;
                                                    
                                                    echo '<li><img  src="'. esc_url( $spyropress_image_url ) .'"  class="img-responsive"></li>';
                                                } 
                                            
                                             echo '</ul></div>'; 
                                        }
                                        
                                     }elseif( isset($spyropress_data['video']) && !empty ($spyropress_data['video']) &&  $spyropress_data['display'] == 'video' ) {
                                        echo wp_oembed_get( $spyropress_data['video'],array( 'height' => '300' ) );
            
                                     }elseif( has_post_thumbnail() ) {
                                        echo spyropress_get_image( array( 'echo' => false, 'width' => 1150 , 'height' => 480, 'crop' => true, 'responsive' => true, 'retina' => true ) );
            
                                     }
                                ?>
                            </div>
                            <div class="clearfix"></div>
        					<h4><?php echo esc_html( $spyropress_translate['portfolio-description'] ); ?></h4>
        					<?php 
                                the_content(); 
                                
                                if( isset( $spyropress_data['spyropress_links'] ) ): 
                                    echo '<p class="btn-horizontal">';        
                                        foreach( $spyropress_data['spyropress_links'] as $spyropress_link ){
                                            $spyropress_link['url'] = !empty($spyropress_link['url']) ? $spyropress_link['url'] : '';
                                            //Icons
                                            $spyropress_icon = isset( $spyropress_link['icon'] )? '<i class="'. esc_attr( $spyropress_link['icon'] ) .'"></i>' : '';
                                            echo '<a href="'. esc_url( $spyropress_link['url'] ) .'" class="btn '. esc_attr( $spyropress_link['btn_type'] ) .' btn-bavel">'. wp_kses( $spyropress_icon, array( 'i' => array( 'class' => array() ) ) ) .' '. esc_html( $spyropress_link['title'] ) .'</a>';
                                        } 
                                    echo '</p>';
                                endif;
                            ?>
                        </div>
                        <div class="col-md-3">
                            <aside>
            					<div class="widget">
            					    <h5 class="title-aside"><?php echo esc_html( $spyropress_translate['portfolio-detail'] ); ?></h5>
            						<table class="parameter-product">
            							<tr>
            								<td style="width:20%"><strong><?php echo esc_html( $spyropress_translate['portfolio-name'] ); ?></strong></td>
            								<td><?php echo get_the_title(); ?></td>
            							</tr>
                                        <?php 
                                            if( !empty( $spyropress_cats ) ):
                                        ?>
               								<tr class="active">
                								<td><strong><?php echo esc_html( $spyropress_translate['portfolio-categorie'] ); ?></strong></td>
                								<td><?php echo esc_html( join( ' ', $spyropress_cats ) ); ?></td>
                							</tr>
                                        <?php 
                                            endif;
                                            if( isset( $spyropress_data['spyropress_type'] ) ):
                                        ?>
            							<tr>
            								<td><strong><?php echo esc_html( $spyropress_translate['portfolio-type'] ); ?></strong></td>
            								<td><?php echo esc_html( $spyropress_data['spyropress_type'] ); ?></td>
            							</tr>
                                        <?php 
                                            endif;
                                            if( isset( $spyropress_data['spyropress_size'] ) ):
                                        ?>
            							<tr class="active">
            								<td><strong><?php echo esc_html( $spyropress_translate['portfolio-size'] ); ?></strong></td>
            								<td><?php echo esc_html( $spyropress_data['spyropress_size'] ); ?></td>
            							</tr>
                                        <?php 
                                            endif;
                                            if( isset( $spyropress_data['spyropress_licence'] ) ):
                                        ?>
            							<tr>
            								<td><strong><?php echo esc_html( $spyropress_translate['portfolio-licence'] ); ?></strong></td>
            								<td><a href="<?php echo esc_url( $spyropress_data['spyropress_licence_url'] ); ?>"><?php echo esc_html( $spyropress_data['spyropress_licence'] ); ?></a></td>
            							</tr>
                                        <?php endif; ?>
            						</table>
                                    <?php 
                                        if( isset( $spyropress_data['spyropress_links'] ) ): 
                                            
                                            foreach( $spyropress_data['spyropress_links'] as $spyropress_link ){
                                                $spyropress_link['url'] = !empty($spyropress_link['url']) ? $spyropress_link['url'] : '';
                                                //Icons
                                                $spyropress_icon = isset( $spyropress_link['icon'] )? '<i class="'. esc_attr( $spyropress_link['icon'] ) .'"></i>' : '';
                                                echo '<a href="'. esc_url( $spyropress_link['url'] ) .'" class="btn '. esc_attr( $spyropress_link['btn_type'] ) .' btn-bavel btn-block">'. wp_kses( $spyropress_icon, array( 'i' => array( 'class' => array() ) ) ) .' '. esc_html( $spyropress_link['title'] ) .'</a>';
                                            } 
                                             
                                        endif; 
                                    ?>
            					</div>
            				</aside>
                        </div>
                 <?php 
                        spyropress_after_post();
                   }
                   
                }else{
                    echo '<h3>'.esc_html__( 'Sorry No Post Where Found', 'sonno' ).'</h3>';
                } 
                spyropress_after_post(); 
            ?>
        </div>
    </div>
</div>
<?php      
    spyropress_after_main_container(); 
get_footer(); 