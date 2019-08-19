<?php
//Check
if( empty( $spyropress_teasers ) ) return; 

//Arguments.
$spyropress_atts = array(
    'callback' => array( $this, 'spyropress_generate_teaser_two' ),
    'row' => false
);

//Info Teaser Item Columns.
echo  '<ul class="list-unstyled">'. spyropress_column_generator( $spyropress_atts, $spyropress_teasers ) .'</ul>' ;

