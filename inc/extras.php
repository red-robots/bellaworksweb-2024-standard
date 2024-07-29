<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package bellaworks
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */

$date = new DateTime();
$date->setTimezone(new DateTimeZone('America/Detroit'));
$fdate = $date->format('Y-m-d H:i:s');
define('WP_CURRENT_TIME', $fdate);
define('THEMEURI',get_template_directory_uri() . '/');

function bellaworks_body_classes( $classes ) {
    // Adds a class of group-blog to blogs with more than 1 published author.
   global $post;
    if ( is_multi_author() ) {
        $classes[] = 'group-blog';
    }

    // Adds a class of hfeed to non-singular pages.
    if ( ! is_singular() ) {
        $classes[] = 'hfeed';
    }

    if ( is_front_page() || is_home() ) {
        $classes[] = 'homepage';
    } else {
        $classes[] = 'subpage';
    }
    if(is_page() && $post) {
      $classes[] = $post->post_name;
    }

    $browsers = ['is_iphone', 'is_chrome', 'is_safari', 'is_NS4', 'is_opera', 'is_macIE', 'is_winIE', 'is_gecko', 'is_lynx', 'is_IE', 'is_edge'];
    $classes[] = join(' ', array_filter($browsers, function ($browser) {
        return $GLOBALS[$browser];
    }));

    return $classes;
}
add_filter( 'body_class', 'bellaworks_body_classes' );


function add_query_vars_filter( $vars ) {
  $vars[] = "pg";
  return $vars;
}
add_filter( 'query_vars', 'add_query_vars_filter' );


function shortenText($string, $limit, $break=".", $pad="...") {
  // return with no change if string is shorter than $limit
  if(strlen($string) <= $limit) return $string;

  // is $break present between $limit and the end of the string?
  if(false !== ($breakpoint = strpos($string, $break, $limit))) {
    if($breakpoint < strlen($string) - 1) {
      $string = substr($string, 0, $breakpoint) . $pad;
    }
  }

  return $string;
}


add_action('admin_enqueue_scripts', 'bellaworks_admin_style');
function bellaworks_admin_style() {
  wp_enqueue_style('admin-dashicons', get_template_directory_uri().'/css/dashicons.min.css');
  wp_enqueue_style('admin-styles', get_template_directory_uri().'/css/admin.css');
}

function get_page_id_by_template($fileName) {
    $page_id = 0;
    if($fileName) {
        $pages = get_pages(array(
            'post_type' => 'page',
            'meta_key' => '_wp_page_template',
            'meta_value' => $fileName.'.php'
        ));

        if($pages) {
            $row = $pages[0];
            $page_id = $row->ID;
        }
    }
    return $page_id;
}

function string_cleaner($str) {
    if($str) {
        $str = str_replace(' ', '', $str);
        $str = preg_replace('/\s+/', '', $str);
        $str = preg_replace('/[^A-Za-z0-9\-]/', '', $str);
        $str = strtolower($str);
        $str = trim($str);
        return $str;
    }
}

function format_phone_number($string) {
    if(empty($string)) return '';
    $append = '';
    if (strpos($string, '+') !== false) {
        $append = '+';
    }
    $string = preg_replace("/[^0-9]/", "", $string );
    $string = preg_replace('/\s+/', '', $string);
    return $append.$string;
}



function parse_external_url( $url = '', $internal_class = 'internal-link', $external_class = 'external-link') {

    $url = trim($url);

    // Abort if parameter URL is empty
    if( empty($url) ) {
        return false;
    }

    //$home_url = parse_url( $_SERVER['HTTP_HOST'] );
    $home_url = parse_url( home_url() );  // Works for WordPress

    $target = '_self';
    $class = $internal_class;

    if( $url!='#' ) {
        if (filter_var($url, FILTER_VALIDATE_URL)) {

            $link_url = parse_url( $url );

            // Decide on target
            if( empty($link_url['host']) ) {
                // Is an internal link
                $target = '_self';
                $class = $internal_class;

            } elseif( $link_url['host'] == $home_url['host'] ) {
                // Is an internal link
                $target = '_self';
                $class = $internal_class;

            } else {
                // Is an external link
                $target = '_blank';
                $class = $external_class;
            }
        }
    }

    // Return array
    $output = array(
        'class'     => $class,
        'target'    => $target,
        'url'       => $url
    );

    return $output;
}


/* Remove richtext editor on specific page */
function remove_pages_editor(){
    global $wpdb;
    $post_id = ( isset($_GET['post']) && $_GET['post'] ) ? $_GET['post'] : '';
    $disable_editor = array();
    if($post_id) {
        $page_ids_disable = get_field("disable_editor_on_pages","option");
        if( $page_ids_disable && in_array($post_id,$page_ids_disable) ) {
            remove_post_type_support( 'page', 'editor' );
        }
    }
}
add_action( 'init', 'remove_pages_editor' );


function bellaworks_header_scripts(){ ?>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&family=Oswald:wght@200..700&display=swap" rel="stylesheet"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" integrity="sha512-1cK78a1o+ht2JcaW6g8OXYwqpev9+6GqOkz9xmBN9iUUhIndKtxwILGWYOSibOKjLsEdjyjZvYDq/cZwNeak0w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script>
var themeDir = '<?php echo get_stylesheet_directory_uri() ?>';
var assetDir = '<?php echo get_stylesheet_directory_uri() ?>/assets';
</script>
<?php }
add_action( "wp_head", "bellaworks_header_scripts");

add_action( 'wp_body_open', 'wpdocs_my_function' );
add_action( 'wp_footer', 'wpdocs_my_function' );
function wpdocs_my_function() {
  if ( doing_action( 'wp_body_open' ) ) {
    remove_action ( 'wp_footer', 'wpdocs_my_function' );
  }
  //echo '<div id="preloader" class="mesh-loader"><div class="set-one"> <div class="circle"></div> <div class="circle"></div> </div> <div class="set-two"> <div class="circle"></div> <div class="circle"></div> </div> </div>';
}


// add new buttons
add_filter( 'mce_buttons', 'myplugin_register_buttons' );

function myplugin_register_buttons( $buttons ) {
  array_push( $buttons,'edbutton1','edbutton2');

  return $buttons;
}
 
// Load the TinyMCE plugin : editor_plugin.js (wp2.5)
add_filter( 'mce_external_plugins', 'myplugin_register_tinymce_javascript' );
function myplugin_register_tinymce_javascript( $plugin_array ) {
   $plugin_array['BUTTON1'] = get_stylesheet_directory_uri() . '/assets/js/custom-tinymce.js';
   return $plugin_array;
}


add_shortcode( 'portfolio_feeds', 'portfolio_feeds_func' );
function portfolio_feeds_func( $atts ) {
  $a = shortcode_atts( array(
    'show' => 12
  ), $atts );
  $perpage = (isset($a['show']) && $a['show']) ? $a['show'] : 12;
  if($perpage=='all') {
    $perpage = -1;
  }
  $output = '';
  ob_start();
  include( locate_template('parts/portfolio-feeds.php') ); 
  $output = ob_get_contents();
  ob_end_clean();
  return $output;
}

function get_featured_post($limit=1,$fields=null) {
  global $wpdb;
  $query = "SELECT p.* FROM " . $wpdb->prefix . "postmeta m, ".$wpdb->prefix."posts p 
            WHERE p.ID=m.post_id AND m.meta_key='featured_post' AND m.meta_value=1 AND p.post_status='publish' 
            AND p.post_type='post' ORDER BY p.post_modified DESC LIMIT " . $limit;
  
  if($fields && is_array($fields)) {
    $field_items = '';
    foreach($fields as $i=>$f) {
      $comma = ($i>0) ? ',':'';
      $field_items .= $comma . 'p.' . $f;
    }

    $query = "SELECT ".$field_items." FROM " . $wpdb->prefix . "postmeta m, ".$wpdb->prefix."posts p 
            WHERE p.ID=m.post_id AND m.meta_key='featured_post' AND m.meta_value=1 AND p.post_status='publish' 
            AND p.post_type='post' ORDER BY p.post_modified DESC LIMIT " . $limit;
  }

  $result = $wpdb->get_results($query);
  return $result;
}

