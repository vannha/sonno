<?php
/**
 * Background OptionType
 *
 * @author 		SpyroSol
 * @category 	UI
 * @package 	Spyropress
 */

function spyropress_ui_background($item, $id, $value, $is_widget = false, $is_builder = false) {
        
    ob_start();
    
    // defaults
    $style = '';
    $defaults = array(
        'background-color'      => '',
        'background-image'      => '',
        'background-repeat'     => '',
        'background-attachment' => '',
        'background-position'   => '',
        'background-pattern'    => ''
    );
    $value = wp_parse_args( $value, $defaults );
    
    // collecting colorpicker attributes
    $atts = array();
    $atts['class'] = 'field';
    $atts['type'] = 'text';
    $atts['id'] = esc_attr( $id . '-colorpicker' );
    $atts['name'] = esc_attr( $item['name'] . '[background-color]' );
    if( $value['background-color'] )
        $atts['value'] = esc_attr( $value['background-color'] );
    
    $style = '';
    if( $value['background-color'] )
        $style = ' style="background:' . $value['background-color'] . ';border-color:' . $value['background-color'] . '"';
    
    // collecting upload attributes
    $upload_attrs = array();
    $upload_attrs['class'] = 'field upload' . ( ( $value != '' ) ? ' has-file' : '' );
    $upload_attrs['type'] = 'text';
    $upload_attrs['id'] = esc_attr( $id );
    $upload_attrs['name'] = esc_attr( $item['name'] . '[background-image]' );
    if( $value['background-image'] )
        $upload_attrs['value'] = esc_attr( $value['background-image'] );
    
?>
    <div <?php echo build_section_class( 'section-background', $item ); ?>>
        <?php build_heading( $item, $is_widget ); ?>
        <?php build_description( $item ); ?>
        <?php build_section_reset(); ?>
        <div class="controls">
            <div class="color-picker pb10 clearfix">
            <?php 
                printf( '<input%s />', spyropress_build_atts( $atts ) );
                printf( '<div class="color-box"><div%s></div></div>', $style ); 
            ?>                
            </div>
            <div class="pb10 row-fluid">
                <div class="span6">
                    <select name="<?php echo esc_attr( $item['name']); ?>[background-repeat]" class="chosen" data-placeholder="<?php echo esc_attr( 'Background Repeat' ); ?>">
                        <?php
                            foreach ( spyropress_panel_background_repeat() as $key => $repeat )
                                render_option(esc_attr( $key ), esc_html( $repeat ), array( $value['background-repeat'] ));
                        ?>
                    </select>
                </div>
                <div class="span6">
                    <select name="<?php echo esc_attr( $item['name'] ); ?>[background-attachment]" class="chosen" data-placeholder="<?php echo esc_attr( 'Background Attachment' ); ?>">
                        <?php
                            foreach ( spyropress_panel_background_attachment() as $key => $attachment )
                                render_option(esc_attr( $key ), esc_html( $attachment ), array( $value['background-attachment'] ));
                        ?>
                    </select>
                </div>
            </div>
            <div class="pb10">
                <select name="<?php echo esc_attr( $item['name'] ); ?>[background-position]" class="chosen" data-placeholder="<?php echo esc_attr( 'Background Position' ); ?>">
                    <?php
                        foreach ( spyropress_panel_background_position() as $key => $position ) {
                            render_option(esc_attr( $key ), esc_html( $position ), array( $value['background-position'] ));
                        }
                    ?>
                </select>
            </div>
            <div class="uploader pb10 clearfix">
            <?php 
                printf( '<input%s />', spyropress_build_atts( $upload_attrs ) );
                printf( '<input class="upload_button button-secondary" type="button" value="'.esc_html__( 'Upload', 'sonno' ).'" id="upload_%s" />', $id);
                
                if ( is_array( @getimagesize( $value['background-image'] ) ) ) { 
            ?>
                <div class="screenshot" id="<?php echo esc_attr( $id ); ?>_image">
                <?php 
                      if ( $value['background-image'] != '' ) {
                        $remove = '<a href="javascript:(void);" class="remove-media">Remove</a>';
                        $image = preg_match( '/(^.*\.jpg|jpeg|png|gif|ico*)/i', $value['background-image'] );
                        if ( $image ) {
                          echo '<img src="'.$value['background-image'].'"  />'.$remove.'';
                        } else {
                          $parts = explode( "/", $value['background-image'] );
                          for( $i = 0; $i < sizeof($parts); ++$i ) {
                            $title = $parts[$i];
                          }
                          echo '<div class="no_image"><a href="'.$value['background-image'].'">'.$title.'</a>'.$remove.'</div>';
                        }
                      }
                ?>
                </div>
            <?php } ?>
            </div>
            <?php if ( isset( $item['use_pattern'] ) && $item['use_pattern'] && isset( $item['patterns'] ) ) { ?>
            <div class="section-radio-img section-pattern">
                <h3 class="heading"><?php _e( 'Background Patterns', 'sonno' ); ?></h3>
                <ul id="bg_patterns">
                <?php
                    foreach ( $item['patterns'] as $path => $label ) {
                        printf('
                            <li><label class="radio-img%6$s" for="%1$s">
                                <input type="radio" id="%1$s" name="%3$s[background-pattern]" value="%2$s" %5$s />
                                <img src="%4$s">
                            </label></li>',
                            $item['name'].'_'.$label, $path, $item['name'], $path, checked( $value['background-pattern'], $path, false ), ($value['background-pattern'] == $path) ? ' selected': ''
                        );
                    }
                ?>
                </ul>
                <div class="clear"></div>
            </div>
            <?php } ?>
        </div>
    </div>
<?php
    
    $ui_content = ob_get_clean();
    $js = "panelUi.bind_colorpicker( '{$id}-colorpicker' );";
    if($is_widget)  {
        if(!$is_builder)
            add_jquery_ready($js);
        else
            $ui_content .= sprintf( '<script type="text/javascript">%2$s//<![CDATA[%2$s %1$s %2$s//]]>%2$s</script>', $js, "\n" );
        return $ui_content;
    }
    else {
        echo sonno_html( $ui_content );
        add_jquery_ready($js);
    }
}
    
function spyropress_widget_background( $item, $id, $value, $is_builder = false ) {
    return spyropress_ui_background( $item, $id, $value, true, $is_builder );
}

/**
 * Background Repeat
 */
function spyropress_panel_background_repeat() {
    return array(
        ''          => '',
        'no-repeat' => esc_html__( 'No Repeat', 'sonno' ),
        'repeat'    => esc_html__( 'Repeat All', 'sonno' ),
        'repeat-x'  => esc_html__( 'Repeat Horizontally', 'sonno' ),
        'repeat-y'  => esc_html__( 'Repeat Vertically', 'sonno' ),
        'inherit'   => esc_html__( 'Inherit', 'sonno' )
    );
}

/**
 * Background Attachment
 */
function spyropress_panel_background_attachment() {
    return array(
        ''          => '',
        'fixed'   => esc_html__( 'Fixed', 'sonno' ),
        'scroll'  => esc_html__( 'Scroll', 'sonno' ),
        'inherit' => esc_html__( 'Inherit', 'sonno' )
    );
}

/**
 * Background Position
 */
function spyropress_panel_background_position() {
    return array(
        ''          => '',
        'left top'      => esc_html__( 'Left Top', 'sonno' ),
        'left center'   => esc_html__( 'Left Center', 'sonno' ),
        'left bottom'   => esc_html__( 'Left Bottom', 'sonno' ),
        'center top'    => esc_html__( 'Center Top', 'sonno' ),
        'center center' => esc_html__( 'Center Center', 'sonno' ),
        'center bottom' => esc_html__( 'Center Bottom', 'sonno' ),
        'right top'     => esc_html__( 'Right Top', 'sonno' ),
        'right center'  => esc_html__( 'Right Center', 'sonno' ),
        'right bottom'  => esc_html__( 'Right Bottom', 'sonno' )
    );
}
?>