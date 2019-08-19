<?php if( empty( $spyropress_clients ) ) return; //Check ?>
<div class="wrap-carousel">

    <div id="client" class="owl-carousel owl-theme client">
        <?php 
            foreach( $spyropress_clients as $spyropress_client ){
                echo '<div class="item-client"><a href="'. esc_url( $spyropress_client['spyropress_url'] ) .'"><img  src="' . esc_url( $spyropress_client['spyropress_logo'] ) . '"></a></div>';
            }
        ?>  
    </div>
    
    <div class="direction-middle">
        <div class="direction-nav">
            <span class="direct-prev prev-client"><i class="icon-circle-left"></i></span>
            <span class="direct-next next-client"><i class="icon-circle-right"></i></span>
        </div>    
    </div>
        
</div>