<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php
        spyropress_before_post_content();
        spyropress_the_content();
        spyropress_after_post_content();
    ?>
</div>