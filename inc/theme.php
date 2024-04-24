<?php
/**
 * Custom theme functions.
 *
 * 
 *
 * @package bellaworks
 */

/*-------------------------------------
  Custom client login, link and title.
---------------------------------------*/
function my_login_logo() { 
  $custom_logo_id = get_theme_mod( 'custom_logo' );
  $logoImg = wp_get_attachment_image_src($custom_logo_id,'large');
  $logo_url = ($logoImg) ? $logoImg[0] : '';
  if($custom_logo_id) { ?>
  <style type="text/css">
    body.login div#login h1 a {
      background-image: url(<?php echo $logo_url; ?>);
      background-size: contain;
      width: 100%;
      height: 100px;
      margin-bottom: 10px;
    }
    .login #backtoblog, .login #nav {
      text-align: center;
    }

  </style>
<?php }
}
add_action( 'login_enqueue_scripts', 'my_login_logo' );

// Change Link
function loginpage_custom_link() {
  return get_site_url();
}
add_filter('login_headerurl','loginpage_custom_link');

function bella_login_logo_url_title() {
    return get_bloginfo('name');
}
add_filter( 'login_headertitle', 'bella_login_logo_url_title' );

/*-------------------------------------
	Adds Options page for ACF.
---------------------------------------*/
if( function_exists('acf_add_options_page') ) {acf_add_options_page();}

/*-------------------------------------
  Hide Front End Admin Menu Bar
---------------------------------------*/
if ( ! current_user_can( 'manage_options' ) ) {
    show_admin_bar( false );
}
 /*-------------------------------------
  Move Yoast to the Bottom
---------------------------------------*/
function yoasttobottom() {
  return 'low';
}
add_filter( 'wpseo_metabox_prio', 'yoasttobottom');
/*-------------------------------------
  Custom WYSIWYG Styles

  If you are using the Plugin: MRW Web Design Simple TinyMCE

  Keep this commented out to keep from getting duplicate "Format" dropdowns

---------------------------------------*/
// function acc_custom_styles($buttons) {
//   array_unshift($buttons, 'styleselect');
//   return $buttons;
// }
// add_filter('mce_buttons_2', 'acc_custom_styles');


/*
* Callback function to filter the MCE settings


  But always use this to get the custom formats

*/
 
function my_mce_before_init_insert_formats( $init_array ) {  
 
// Define the style_formats array
 
  $style_formats = array(  
    // Each array child is a format with it's own settings
    
    // A block element
    array(  
      'title' => 'Block Color',  
      'block' => 'span',  
      'classes' => 'custom-color-block',
      'wrapper' => true,
      
    ),
    // inline color
    array(  
      'title' => 'Custom Color',  
      'inline' => 'span',  
      'classes' => 'custom-color',
      'wrapper' => true,
      
    ),
     array(
        'title' => 'Header 2',
        'format' => 'h2',
        //'icon' => 'bold'
    ),
    array(
        'title' => 'Header 3',
        'format' => 'h3'
    ),
    array(
        'title' => 'Paragraph',
        'format' => 'p'
    )
  );  
  // Insert the array, JSON ENCODED, into 'style_formats'
  $init_array['style_formats'] = json_encode( $style_formats );  
  
  return $init_array;  
  
} 
// Attach callback to 'tiny_mce_before_init' 
add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' ); 
// Add styles to WYSIWYG in your theme's editor-style.css file
function my_theme_add_editor_styles() {
    add_editor_style( 'editor-style.css' );
}
add_action( 'init', 'my_theme_add_editor_styles' );
/*-------------------------------------
  Change Admin Labels
---------------------------------------*/
function change_post_menu_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'News';
    $submenu['edit.php'][5][0] = 'News';
    $submenu['edit.php'][10][0] = 'Add News Item';
    //$submenu['edit.php'][15][0] = 'Status'; // Change name for categories
    //$submenu['edit.php'][16][0] = 'Labels'; // Change name for tags
    echo '';
}

function change_post_object_label() {
        global $wp_post_types;
        $labels = &$wp_post_types['post']->labels;
        $labels->name = 'News';
        $labels->singular_name = 'News Item';
        $labels->add_new = 'Add News Item';
        $labels->add_new_item = 'Add News Item';
        $labels->edit_item = 'Edit News Item';
        $labels->new_item = 'News Item';
        $labels->view_item = 'View News Item';
        $labels->search_items = 'Search News';
        $labels->not_found = 'No News found';
        $labels->not_found_in_trash = 'No News found in Trash';
    }
add_action( 'init', 'change_post_object_label' );
add_action( 'admin_menu', 'change_post_menu_label' );

/*-------------------------------------
  Add a last and first menu class option
---------------------------------------*/

function ac_first_and_last_menu_class($items) {
  foreach($items as $k => $v){
    $parent[$v->menu_item_parent][] = $v;
  }

  if( isset($parent) ) {
    foreach($parent as $k => $v){
      $v[0]->classes[] = 'first';
      $v[count($v)-1]->classes[] = 'last';
    }
  }
  return $items;
}
add_filter('wp_nav_menu_objects', 'ac_first_and_last_menu_class');
/*-------------------------------------



 Limit File Size in Media Uploader




---------------------------------------*/
define('WPISL_DEBUG', false);

require_once ('wpisl-options.php');

class WP_Image_Size_Limit {

  public function __construct()  {  
      add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), array($this, 'add_plugin_links') );
      add_filter('wp_handle_upload_prefilter', array($this, 'error_message'));
  }  

  public function add_plugin_links( $links ) {
    return array_merge(
      array(
        'settings' => '<a href="' . get_bloginfo( 'wpurl' ) . '/wp-admin/options-media.php?settings-updated=true#wpisl-limit">Settings</a>'
      ),
      $links
    );
  }

  public function get_limit() {
    $option = get_option('wpisl_options');

    if ( isset($option['img_upload_limit']) ){
      $limit = $option['img_upload_limit'];
    } else {
      $limit = $this->wp_limit();
    }

    return $limit;
  }

  public function output_limit() {
    $limit = $this->get_limit();
    $limit_output = $limit;
    $mblimit = $limit / 1000;


    if ( $limit >= 1000 ) {
      $limit_output = $mblimit;
    }

    return $limit_output;
  }

  public function wp_limit() {
    $output = wp_max_upload_size();
    $output = round($output);
    $output = $output / 1000000; //convert to megabytes
    $output = round($output);
    $output = $output * 1000; // convert to kilobytes

    return $output;

  }

  public function limit_unit() {
    $limit = $this->get_limit();

    if ( $limit < 1000 ) {
      return 'KB';
    }
    else {
      return 'MB';
    }

  }

  public function error_message($file) {
    $size = $file['size'];
    $size = $size / 1024;
    $type = $file['type'];
    $is_image = strpos($type, 'image');
    $limit = $this->get_limit();
    $limit_output = $this->output_limit();
    $unit = $this->limit_unit();

    if ( ( $size > $limit ) && ($is_image !== false) ) {
       $file['error'] = 'Image files must be smaller than '.$limit_output.$unit;
       if (WPISL_DEBUG) {
        $file['error'] .= ' [ filesize = '.$size.', limit ='.$limit.' ]';
       }
    }
    return $file;
  }

  public function load_styles() {
    $limit = $this->get_limit();
    $limit_output = $this->output_limit();
    $mblimit = $limit / 1000;
    $wplimit = $this->wp_limit();
    $unit = $this->limit_unit();


    ?>
    <!-- .Custom Max Upload Size -->
    <style type="text/css">
    .after-file-upload {
      display: none;
    }
    <?php if ( $limit < $wplimit ) : ?>
    .upload-flash-bypass:after {
      content: 'Maximum image size: <?php echo $limit_output . $unit; ?>.';
      display: block;
      margin: 15px 0;
    }
    <?php endif; ?>

    </style>
    <!-- END Custom Max Upload Size -->
    <?php
  }


}
$WP_Image_Size_Limit = new WP_Image_Size_Limit;
add_action('admin_head', array($WP_Image_Size_Limit, 'load_styles'));