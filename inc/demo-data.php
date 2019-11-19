<?php
/**
* demo data.
*
* config.
*/

add_filter('ef3-theme-options-opt-name', 'sonno_set_demo_opt_name');

function sonno_set_demo_opt_name(){
   return 'spyropress_theme_settings';
}

add_filter('ef3-replace-content', 'sonno_replace_content', 10 , 2);

function sonno_replace_content($replaces, $attachment){
   return array(
      //'/image="(.+?)"/' => 'image="'.$attachment.'"',
      '/tax_query:/' => 'remove_query:',
      '/categories:/' => 'remove_query:',
      //'/src="(.+?)"/' => 'src="'.ef3_import_export()->acess_url.'ef3-placeholder-image.jpg"'
   );
}

add_filter('ef3-enable-create-demo', 'sonno_enable_create_demo');

/**
* move post to trash
*/
add_action('ef3-import-start', 'sonno_move_trash', 1);
if(!function_exists('sonno_move_trash')){
   function sonno_move_trash(){
      wp_trash_post(1);
      wp_trash_post(2);
   }
}

function sonno_enable_create_demo(){
   return false;
}

function sonno_update_theme_option($request,$folder){
   global $spyropress;
   $option_file =      trailingslashit($folder).'option.php';
   if( !$option_file || !file_exists( $option_file ) ) return;
   include_once( $option_file );
   $data = unserialize(base64_decode($dummy_data));

   //theme_settings
   $key = 'spyropress_theme_settings';
   update_option( $key, $data );
}

add_action('ef3-import-finish', 'sonno_update_theme_option',99,2);
/**
* Set woo page.
*
* get array woo page title and update options.
*
* @author Chinh Duong Manh
* @since 1.0.0
*/
function sonno_set_options_page($id,$folder_dir){
   $opt_pages = array(
      'page_on_front'   => 'Home',
      'page_for_posts'  => 'Blog',
   );

   foreach ($opt_pages as $key => $opt_page){
      $page = get_page_by_title($opt_page);
      if(!isset($page->ID))
         continue;
      update_option($key, $page->ID);
   }
}
add_action('ef3-import-finish', 'sonno_set_options_page');

/**
* Crop image
*/
add_action('ef3-import-finish', 'sonno_crop_images',99);
function sonno_crop_images() {
   $query = array(
      'post_type'      => 'attachment',
      'posts_per_page' => -1,
      'post_status'    => 'inherit',
   );
   $media = new WP_Query($query);
   if ($media->have_posts()) {
      foreach ($media->posts as $image) {
         if (strpos($image->post_mime_type, 'image/') !== false) {
            $image_path = get_attached_file($image->ID);
            $metadata = wp_generate_attachment_metadata($image->ID, $image_path);
            wp_update_attachment_metadata($image->ID, $metadata);
         }
      }
   }
} 
