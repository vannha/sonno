<div class="row">
    <?php if( !empty( $spyropress_address ) ): ?>
        <div class="col-md-4 col-sm-4 box-icon text-center">
            <span class="icon icon-map icon-primary"></span>
            <p class="size16">
                <?php echo wp_kses( $spyropress_address,  array( 'br' => array() ) ) ; ?>
            </p>
        </div>
    <?php 
        endif; 
        if( !empty( $spyropress_phone ) ):
    ?>
        <div class="col-md-4 col-sm-4 box-icon text-center">
            <span class="icon icon-envelope icon-secondary"></span>
            <p class="size16">
                <?php echo wp_kses( $spyropress_phone,  array( 'br' => array() ) ); ?>
            </p>
        </div>
    <?php 
        endif; 
        if( !empty( $spyropress_email ) ):
    ?>
        <div class="col-md-4 col-sm-4 box-icon text-center">
            <span class="icon icon-mobile icon-tertiary"></span>
            <p class="size16">
                <?php echo wp_kses( $spyropress_email,  array( 'br' => array() ) ); ?>
            </p>
        </div>
    <?php endif; ?>
</div>