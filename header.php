<?php
/*
 * Core Spyropress header template
 *
 * Customise this in your child theme by:
 * - Using hooks and your own functions
 * - Using the 'header-content' template part
 * - For example 'header-content-category.php' for category view or 'header-content.php' (fallback if location specific file not available)
 * - Copying this file to your child theme and customising - it will over-ride this file
 *
 * @package Spyropress
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php 
die($aadadsdads);
    spyropress_wrapper(); 
        spyropress_before_header(); 
        if( !get_setting( 'page-loader' ) ):
    ?>
    
        <div id="loading" class="loading-invisible">
    		<div class="loading-center">
    			<div class="loading-center-absolute">
    				<div class="object" id="object_four"></div>
    				<div class="object" id="object_three"></div>
    				<div class="object" id="object_two"></div>
    				<div class="object" id="object_one"></div>
    			</div>
    			<p><?php echo esc_html__( 'Please wait...', 'sonno' ); ?></p>
    		</div>
    	</div>
        <script type="text/javascript">
    		  document.getElementById("loading").className = "loading-visible";
    		  var hideDiv = function(){document.getElementById("loading").className = "loading-invisible";};
    		  var oldLoad = window.onload;
    		  var newLoad = oldLoad ? function(){hideDiv.call(this);oldLoad.call(this);} : hideDiv;
    		  window.onload = newLoad;
    	</script>
    
   
     <?php
         endif;
         spyropress_before_header_content();
         spyropress_get_template_part('part=templates/header-content');
         spyropress_after_header_content();
    
     spyropress_after_header(); 