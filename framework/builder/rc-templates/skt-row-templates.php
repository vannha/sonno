<?php

/**
 * SpyroPress Builder
 * Default builder row types
 *
 * @author 		SpyroSol
 * @category 	Builder
 * @package 	Spyropress
 */

/**
 * One Column Row
 */
class one_col_row_class extends SpyropressBuilderRow {

    public function __construct() {

        $this->config = array(
            'name' => esc_html__( '1/1', 'sonno' ),
            'description' => esc_html__( 'Full width', 'sonno' ),
            'icon' => get_panel_img_path( 'layouts/1col.png' ),
            'columns' => array(
                array( 'type' => 'col_16' )
            )
        );
    }
}
spyropress_builder_register_row( 'one_col_row_class' );

/**
 * Two Column Row
 */
class two_col_row_class extends SpyropressBuilderRow {

    public function __construct() {

        $this->config = array(
            'name' => esc_html__( '1/2', 'sonno' ),
            'description' => esc_html__( '2 1/2 columns', 'sonno' ),
            'icon' => get_panel_img_path( 'layouts/2col.png' ),
            'columns' => array(
                array( 'type' => 'col_1by2' ),
                array( 'type' => 'col_1by2' )
            )
        );
    }
}
spyropress_builder_register_row( 'two_col_row_class' );

/**
 * Three Column Row
 */
class three_col_row_class extends SpyropressBuilderRow {

    public function __construct() {

        $this->config = array(
            'name' => esc_html__( '1/3', 'sonno' ),
            'description' => esc_html__( '3 1/3 columns', 'sonno' ),
            'icon' => get_panel_img_path( 'layouts/3col.png' ),
            'columns' => array(
                array( 'type' => 'col_1by3' ),
                array( 'type' => 'col_1by3' ),
                array( 'type' => 'col_1by3' )
            )
        );
    }
}
spyropress_builder_register_row( 'three_col_row_class' );

/**
 * Four Column Row
 */
class four_col_row_class extends SpyropressBuilderRow {

    public function __construct() {

        $this->config = array(
            'name' => esc_html__( '1/4', 'sonno' ),
            'description' => esc_html__( '4 1/4 columns', 'sonno' ),
            'icon' => get_panel_img_path( 'layouts/4col.png' ),
            'columns' => array(
                array( 'type' => 'col_1by4' ),
                array( 'type' => 'col_1by4' ),
                array( 'type' => 'col_1by4' ),
                array( 'type' => 'col_1by4' )
            )
        );
    }
}
spyropress_builder_register_row( 'four_col_row_class' );

/**
 * Eight Column Row
 */
class eight_col_row_class extends SpyropressBuilderRow {

    public function __construct() {

        $this->config = array(
            'name' => esc_html__( '1/8', 'sonno' ),
            'description' => esc_html__( '8 1/8 columns', 'sonno' ),
            'icon' => get_panel_img_path( 'layouts/6col.png' ),
            'columns' => array(
                array( 'type' => 'col_1by8' ),
                array( 'type' => 'col_1by8' ),
                array( 'type' => 'col_1by8' ),
                array( 'type' => 'col_1by8' ),
                array( 'type' => 'col_1by8' ),
                array( 'type' => 'col_1by8' ),
                array( 'type' => 'col_1by8' ),
                array( 'type' => 'col_1by8' )
            )
        );
    }
}
spyropress_builder_register_row( 'eight_col_row_class' );

/**
 * Left Sidebar Row
 */
class left_sidebar_row_class extends SpyropressBuilderRow {

    public function __construct() {

        $this->config = array(
            'name' => esc_html__( 'Left Sidebar', 'sonno' ),
            'description' => esc_html__( '1/4 + 3/4', 'sonno' ),
            'icon' => get_panel_img_path( 'layouts/left-sidebar.png' ),
            'columns' => array(
                array( 'type' => 'col_1by4' ),
                array( 'type' => 'col_3by4' )
            )
        );
    }
}
spyropress_builder_register_row( 'left_sidebar_row_class' );

/**
 * Right Sidebar Row
 */
class right_sidebar_row_class extends SpyropressBuilderRow {

    public function __construct() {

        $this->config = array(
            'name' => esc_html__( 'Right Sidebar', 'sonno' ),
            'description' => esc_html__( '3/4 + 1/4', 'sonno' ),
            'icon' => get_panel_img_path( 'layouts/right-sidebar.png' ),
            'columns' => array(
                array( 'type' => 'col_3by4' ),
                array( 'type' => 'col_1by4' )
            )
        );
    }
}
spyropress_builder_register_row( 'right_sidebar_row_class' );
?>