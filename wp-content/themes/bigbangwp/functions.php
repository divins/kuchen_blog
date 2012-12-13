<?php

$curr_theme = wp_get_theme(); 
$theme_version = trim($curr_theme->Version);
if(!$theme_version) $theme_version = "1.0";

//Define constants:
define('BRANKIC_INCLUDES', TEMPLATEPATH . '/includes/');
define('BRANKIC_THEME', 'BigBang WP Template');
define('BRANKIC_THEME_SHORT', 'BigBangWP');
define('BRANKIC_ROOT', get_template_directory_uri());
define('BRANKIC_VAR_PREFIX', 'bigbangwp_'); 


require_once (BRANKIC_INCLUDES . 'bra_theme_functions.php');
require_once (BRANKIC_INCLUDES . 'bra_shortcodes.php'); 
require_once (BRANKIC_INCLUDES . 'bra_pagenavi.php'); 
require_once (BRANKIC_INCLUDES . 'ambrosite-post-link-plus.php');

//Load admin specific files:
if (is_admin()) :
require_once (BRANKIC_INCLUDES . 'bra_admin_functions.php');
require_once (BRANKIC_INCLUDES . 'bra_custom_fields.php'); 
require_once (BRANKIC_INCLUDES . 'bra_admin_1.php');
require_once (BRANKIC_INCLUDES . 'bra_admin_2.php'); 
require_once (BRANKIC_INCLUDES . 'bra_admin_3.php');
endif;




add_theme_support('post-thumbnails');

add_theme_support( 'menus' );

    
load_theme_textdomain( BRANKIC_THEME_SHORT, TEMPLATEPATH . '/languages' );

// Load external file to add support for MultiPostThumbnails. Allows you to set more than one "feature image" per post.
require_once('includes/multi-post-thumbnails.php');

// Define additional "post thumbnails". Relies on MultiPostThumbnails to work
if (class_exists('MultiPostThumbnails')) 
{ 
    $extra_images_no = get_option(BRANKIC_VAR_PREFIX."extra_images_no");
    if ($extra_images_no == "") $extra_images_no = 20;    
    for ($i = 1 ; $i <= $extra_images_no ; $i++) 
    {
        new MultiPostThumbnails(array( 'label' => "Extra Image $i", 'id' => "extra-image-$i", 'post_type' => 'page' ) );
        new MultiPostThumbnails(array( 'label' => "Extra Image $i", 'id' => "extra-image-$i", 'post_type' => 'post' ) );
        new MultiPostThumbnails(array( 'label' => "Extra Image $i", 'id' => "extra-image-$i", 'post_type' => 'portfolio_item' ) );
    }
}


?>