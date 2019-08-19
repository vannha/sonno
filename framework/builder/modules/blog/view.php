<?php
// Setup Instance for view
$spyropress_instance = spyropress_clean_array( $spyropress_instance );
?>
<div class="direction">
    <div class="direction-nav">
        <span class="direct-prev prev-blog"><i class="icon-arrow-left2"></i></span>
        <span class="direct-next next-blog"><i class="icon-arrow-right2"></i></span>
    </div>    
</div>
<div id="post" class="owl-carousel owl-theme blog-post post">
    <?php echo ''.$this->spyropress_query( $spyropress_instance, '{content}' ); ?>
</div>