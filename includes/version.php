<?php

/**
 * Theme Meta Info for internal usage
 *
 * Dont Mess with it.
 */
add_action( 'before_spyropress_core_includes', 'spyropress_setup_theme' );
function spyropress_setup_theme() {
    global $spyropress;

    $spyropress->internal_name = 'sonno';
    $spyropress->theme_name = 'Sonno';
    $spyropress->theme_version = '1.0.6';

    $spyropress->framework = 'bs3';
    $spyropress->grid_columns = 12;
    $spyropress->row_class = 'row';
}