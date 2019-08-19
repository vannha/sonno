<?php
//Check
if( empty( $spyropress_teasers ) ) return; 

//Arguments.
$spyropress_atts = array(
    'callback' => array( $this, 'spyropress_generate_teaser_one' ),
    'column_class' => 'box-icon',
    'columns' => $spyropress_columns
);

//Info Teaser Item Columns.
echo  spyropress_column_generator( $spyropress_atts, $spyropress_teasers ) ;