<?php
/*
Plugin Name: Block & Disable All New User Registrations & Comments Completely
Plugin URI: http://whoischris/wordpress-DABARACC.zip
Description:  This simple plugin blocks all users from being able to register no matter what, this also blocks comments
			  from being able to be inserted into the database.
Author: Chris Flannagan
Version: 1.0
Author URI: http://whoischris.com/
*/


/**
 * WordPress Disable & Block All Registration And Comments Completely (DABARACC) core file
 *
 * This file contains all the logic required for the plugin
 *
 * @link		http://whoischris/DABARACC.zip
 *
 * @package 	WordPress DABARACC
 * @copyright	Copyright (c) 2016, Chris Flannagan
 * @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License, v2 (or newer)
 *
 * @since 		WordPress DABARACC 1.0
 *
 *
 */

//block any chance of user registering, still allow admins though
function prevent_any_registration( $user_login, $user_email, $errors ) {
    if ( ! current_user_can( 'manage_options' ) ) {
        $errors->add('no_registration_allowed', '<strong>ERROR</strong>: Registration is disabled for this website.');
    }
}
add_action( 'register_post', 'prevent_any_registration', 10, 3 );

//when a comment is added if through some back door this will immediately delete it
function remove_any_new_comments( $comment_ID, $comment_approved ) {
    global $wpdb;
    $wpdb->query(
        $wpdb->prepare(
            "DELETE FROM $wpdb->comments
		    WHERE comment_ID = %d",
            $comment_ID
        )
    );
    $wpdb->query(
        $wpdb->prepare(
            "DELETE FROM $wpdb->commentmeta
		    WHERE comment_id = %d",
            $comment_ID
        )
    );
}
add_action( 'comment_post', 'remove_any_new_comments', 10, 2 );
// Disable support for comments and trackbacks in post types
function df_disable_comments_post_types_support() {
    $post_types = get_post_types();
    foreach ($post_types as $post_type) {
        if(post_type_supports($post_type, 'comments')) {
            remove_post_type_support($post_type, 'comments');
            remove_post_type_support($post_type, 'trackbacks');
        }
    }
}
add_action( 'admin_init', 'df_disable_comments_post_types_support' );

// Close comments on the front-end
function df_disable_comments_status() {
    return false;
}
add_filter( 'comments_open', 'df_disable_comments_status', 20, 2 );
add_filter( 'pings_open', 'df_disable_comments_status', 20, 2 );

// Hide existing comments
function df_disable_comments_hide_existing_comments( $comments ) {
    $comments = array();
    return $comments;
}
add_filter( 'comments_array', 'df_disable_comments_hide_existing_comments', 10, 2 );

// Remove comments page in menu
function df_disable_comments_admin_menu() {
    remove_menu_page( 'edit-comments.php' );
}
add_action( 'admin_menu', 'df_disable_comments_admin_menu' );

// Redirect any user trying to access comments page
function df_disable_comments_admin_menu_redirect() {
    global $pagenow;
    if ( $pagenow === 'edit-comments.php' ) {
        wp_redirect(admin_url()); exit;
    }
}
add_action( 'admin_init', 'df_disable_comments_admin_menu_redirect' );

// Remove comments metabox from dashboard
function df_disable_comments_dashboard() {
    remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
}
add_action('admin_init', 'df_disable_comments_dashboard');

// Remove comments links from admin bar
function df_disable_comments_admin_bar() {
    if ( is_admin_bar_showing() ) {
        remove_action( 'admin_bar_menu', 'wp_admin_bar_comments_menu', 60 );
    }
}
add_action( 'init', 'df_disable_comments_admin_bar' );
