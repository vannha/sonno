<?php
//check posts limits.
if( empty( $spyropress_ads ) ) return;
echo wp_kses_post( $before_widget );

//Check and Print Widget Title.
if ( $spyropress_title ){ 
    echo wp_kses_post( $before_title . $spyropress_title . $after_title );
}?>      
<ul class="ads">
  <?php foreach( $spyropress_ads as $spyropress_ad ){
        $url = isset($spyropress_ad['spyropress_url']) ? $spyropress_ad['spyropress_url'] : "";
        $img = isset($spyropress_ad['spyropress_image']) ? $spyropress_ad['spyropress_image'] : "#";
    ?>
    <li><a href="<?php echo esc_url( $url ); ?>"><img src="<?php echo esc_url( $img ); ?>" class="img-responsive"  /></a></li>
    <?php } ?>
</ul>
<?php   
echo wp_kses_post( $after_widget ); 