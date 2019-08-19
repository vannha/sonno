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
 * col_16
 */
class col_16 extends SpyropressBuilderColumn {

    public function __construct() {

        $this->config = array(
            'name' => esc_html__( '1/1 Column', 'sonno' ),
            'description' => esc_html__( 'Full width column', 'sonno' ),
            'icon' => get_panel_img_path( 'layouts/col_11.png' ),
            'size' => 16
        );
    }
}
spyropress_builder_register_column( 'col_16' );

/**
 * col_1by2
 */
class col_1by2 extends SpyropressBuilderColumn {

    public function __construct() {

        $this->config = array(
            'name' => esc_html__( '1/2 Column', 'sonno' ),
            'description' => esc_html__( 'Half width column', 'sonno' ),
            'icon' => get_panel_img_path( 'layouts/col_12.png' ),
            'size' => 8
        );
    }
}
spyropress_builder_register_column( 'col_1by2' );

/**
 * col_1by3
 */
class col_1by3 extends SpyropressBuilderColumn {

    public function __construct() {

        $this->config = array(
            'name' => esc_html__( '1/3 Column', 'sonno' ),
            'description' => esc_html__( 'One Third column', 'sonno' ),
            'icon' => get_panel_img_path( 'layouts/col_13.png' ),
            'size' => '1/3'
        );
    }
}
spyropress_builder_register_column( 'col_1by3' );

/**
 * col_1by4
 */
class col_1by4 extends SpyropressBuilderColumn {

    public function __construct() {

        $this->config = array(
            'name' => esc_html__( '1/4 Column', 'sonno' ),
            'description' => esc_html__( 'One-Fourth width column', 'sonno' ),
            'icon' => get_panel_img_path( 'layouts/col_14.png' ),
            'size' => 4
        );
    }
}
spyropress_builder_register_column( 'col_1by4' );

/**
 * col_1by8
 */
class col_1by8 extends SpyropressBuilderColumn {

    public function __construct() {

        $this->config = array(
            'name' => esc_html__( '1/8 Column', 'sonno' ),
            'description' => esc_html__( 'One-Eight width column', 'sonno' ),
            'icon' => get_panel_img_path( 'layouts/col_16.png' ),
            'size' => 2
        );
    }
}
spyropress_builder_register_column( 'col_1by8' );

/**
 * col_3by4
 */
class col_3by4 extends SpyropressBuilderColumn {

    public function __construct() {

        $this->config = array(
            'name' => esc_html__( '3/4 Column', 'sonno' ),
            'description' => esc_html__( 'Three-Fourth width column', 'sonno' ),
            'icon' => get_panel_img_path( 'layouts/col_34.png' ),
            'size' => 12
        );
    }
}
spyropress_builder_register_column( 'col_3by4' );

/**
 * col_3by8
 */
class col_3by8 extends SpyropressBuilderColumn {

    public function __construct() {

        $this->config = array(
            'name' => esc_html__( '3/8 Column', 'sonno' ),
            'description' => esc_html__( 'Three-Eigth width column', 'sonno' ),
            'icon' => get_panel_img_path( 'layouts/col_56.png' ),
            'size' => 6
        );
    }
}
spyropress_builder_register_column( 'col_3by8' );

/**
 * col_5by8
 */
class col_5by8 extends SpyropressBuilderColumn {

    public function __construct() {

        $this->config = array(
            'name' => esc_html__( '5/8 Column', 'sonno' ),
            'description' => esc_html__( 'Five-Eigth width column', 'sonno' ),
            'icon' => get_panel_img_path( 'layouts/col_56.png' ),
            'size' => 10
        );
    }
}
spyropress_builder_register_column( 'col_5by8' );

/**
 * col_1
 */
class col_1 extends SpyropressBuilderColumn {

    public function __construct() {

        $this->config = array(
            'name' => esc_html__( 'Span1', 'sonno' ),
            'description' => esc_html__( '1 column of grid', 'sonno' ),
            'icon' => get_panel_img_path( 'layouts/col_16.png' ),
            'size' => 1
        );
    }
}
spyropress_builder_register_column( 'col_1' );

/**
 * col_3
 */
class col_3 extends SpyropressBuilderColumn {

    public function __construct() {

        $this->config = array(
            'name' => esc_html__( 'Span3', 'sonno' ),
            'description' => esc_html__( '3 columns of grid', 'sonno' ),
            'icon' => get_panel_img_path( 'layouts/col_14.png' ),
            'size' => 3
        );
    }
}
spyropress_builder_register_column( 'col_3' );

/**
 * col_5
 */
class col_5 extends SpyropressBuilderColumn {

    public function __construct() {

        $this->config = array(
            'name' => esc_html__( 'Span5', 'sonno' ),
            'description' => esc_html__( '5 columns of grid', 'sonno' ),
            'icon' => get_panel_img_path( 'layouts/col_13.png' ),
            'size' => 5
        );
    }
}
spyropress_builder_register_column( 'col_5' );

/**
 * col_7
 */
class col_7 extends SpyropressBuilderColumn {

    public function __construct() {

        $this->config = array(
            'name' => esc_html__( 'Span7', 'sonno' ),
            'description' => esc_html__( '7 columns of grid', 'sonno' ),
            'icon' => get_panel_img_path( 'layouts/col_12.png' ),
            'size' => 7
        );
    }
}
spyropress_builder_register_column( 'col_7' );

/**
 * col_9
 */
class col_9 extends SpyropressBuilderColumn {

    public function __construct() {

        $this->config = array(
            'name' => esc_html__( 'Span9', 'sonno' ),
            'description' => esc_html__( '9 columns of grid', 'sonno' ),
            'icon' => get_panel_img_path( 'layouts/col_23.png' ),
            'size' => 9
        );
    }
}
spyropress_builder_register_column( 'col_9' );

/**
 * col_11
 */
class col_11 extends SpyropressBuilderColumn {

    public function __construct() {

        $this->config = array(
            'name' => esc_html__( 'Span11', 'sonno' ),
            'description' => esc_html__( '11 columns of grid', 'sonno' ),
            'icon' => get_panel_img_path( 'layouts/col_34.png' ),
            'size' => 11
        );
    }
}
spyropress_builder_register_column( 'col_11' );

/**
 * col_13
 */
class col_13 extends SpyropressBuilderColumn {

    public function __construct() {

        $this->config = array(
            'name' => esc_html__( 'Span13', 'sonno' ),
            'description' => esc_html__( '13 columns of grid', 'sonno' ),
            'icon' => get_panel_img_path( 'layouts/col_34.png' ),
            'size' => 13
        );
    }
}
spyropress_builder_register_column( 'col_13' );

/**
 * col_14
 */
class col_14 extends SpyropressBuilderColumn {

    public function __construct() {

        $this->config = array(
            'name' => esc_html__( 'Span14', 'sonno' ),
            'description' => esc_html__( '14 columns of grid', 'sonno' ),
            'icon' => get_panel_img_path( 'layouts/col_56.png' ),
            'size' => 14
        );
    }
}
spyropress_builder_register_column( 'col_14' );

/**
 * col_15
 */
class col_15 extends SpyropressBuilderColumn {

    public function __construct() {

        $this->config = array(
            'name' => esc_html__( 'Span15', 'sonno' ),
            'description' => esc_html__( '15 columns of grid', 'sonno' ),
            'icon' => get_panel_img_path( 'layouts/col_56.png' ),
            'size' => 15
        );
    }
}
spyropress_builder_register_column( 'col_15' );
?>