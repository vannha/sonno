<?php

/**
 * Border OptionType
 *
 * @author 		SpyroSol
 * @category 	UI
 * @package 	Spyropress
 */

function spyropress_ui_import( $option_name ) {

    $item['label'] = esc_html__( 'Import Options', 'sonno' );
    $item['desc'] = esc_html__( 'Input your backup file below and hit import to restore your site options from backup.', 'sonno' );

    echo '<div class="section section-import section-full">';
        build_heading( $item, false );
        build_description( $item );
        echo '<div class="controls">';
            echo '<textarea class="field" name="import_options" id="import_options" rows="10"></textarea>';
        echo '</div>';
        printf(
            '<input type="submit" value="%1$s" class="button-red import-options"/> <em>%2$s</em>',
            esc_attr( 'Import Options' ), esc_html__( 'WARNING! This will overwrite any existing options, please proceed with caution!', 'sonno' )
        );
    echo '</div>';
}

function spyropress_ui_export( $option_name ) {

    global $spyropress;
    
    $data = '';
    if( isset( $spyropress->options[$option_name . $spyropress->lang] ) ) {
        $data = $spyropress->options[$option_name . $spyropress->lang];
        if( function_exists( 'spyropress_plugin_encode' ) ){
            $data = spyropress_plugin_encode( $data );
        }else{
            $data = spyropress_encode( $data );    
        }
    }

    $item['label'] = esc_html__( 'Export Options', 'sonno' );
    $item['desc'] = esc_html__( 'Here you can download or copy/paste into a blank file your theme current option settings. Keep this safe as you can use it as backup should anything go wrong. Or you can use it to restore your settings on this site (or any other site).', 'sonno' );

    echo '<div class="section section-export section-full">';
        build_heading( $item, false );
        build_description( $item );
        echo '<div class="controls">';
            echo '<textarea class="field" name="export_options" id="export_options" rows="10">' . esc_textarea( $data ) . '</textarea>';
        echo '</div>';
        
        
        echo '<input type="hidden" name="download_what" value="' . esc_attr( $option_name ) . '" />';
        wp_nonce_field( 'export_settings_file_form', 'export_settings_file_nonce' );
        
        printf(
            '<input type="submit" name="download_theme_options" value="%1$s" class="button-green export-options" />',
            esc_html__( 'Download Options', 'sonno' )
        );
        
    echo '</div>';
}

function spyropress_ui_import_dummy( $option_name ) {

    $item['label'] = esc_html__( 'Import Dummy Content: Posts, Pages, Categories', 'sonno' );
    $item['desc'] = esc_html__( 'If you are new to wordpress or have problems creating posts or pages that look like the Theme Demo you can import dummy posts and pages here that will definitely help to understand how those tasks are done.', 'sonno' );

    /*echo '<div class="section section-import section-full">';
        build_heading( $item, false );
        echo '<div class="controls">';
            printf(
                '<input type="submit" id="import-dummy" name="import-dummy" value="%1$s" class="button-green import-dummy"/> <em>%2$s</em>',
                esc_attr( 'Import Demo Data', 'sonno' ), esc_html__( 'WARNING! This will overwrite any existing options, please proceed with caution!', 'sonno' )
            );
        echo '</div>';
        build_description( $item );
        
    echo '</div>';*/
}
?>