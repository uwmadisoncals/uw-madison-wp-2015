<?php

// Disable support for comments and trackbacks in post types
function wptips_disable_comments_post_types_support() {
    $post_types = get_post_types();
    foreach ($post_types as $post_type) {
        if(post_type_supports($post_type, 'comments')) {
            remove_post_type_support($post_type, 'comments');
            remove_post_type_support($post_type, 'trackbacks');
        }
    }
}
add_action('admin_init', 'wptips_disable_comments_post_types_support');

// Close comments on the front-end
function wptips_disable_comments_status() {
    return false;
}
add_filter('comments_open', 'wptips_disable_comments_status', 20, 2);
add_filter('pings_open', 'wptips_disable_comments_status', 20, 2);

// Hide existing comments
function wptips_disable_comments_hide_existing_comments($comments) {
    $comments = array();
    return $comments;
}
add_filter('comments_array', 'wptips_disable_comments_hide_existing_comments', 10, 2);

// Remove comments page in menu
function wptips_disable_comments_admin_menu() {
    remove_menu_page('edit-comments.php');
}
add_action('admin_menu', 'wptips_disable_comments_admin_menu');

// Redirect any user trying to access comments page
function wptips_disable_comments_admin_menu_redirect() {
    global $pagenow;
    if ($pagenow === 'edit-comments.php') {
        wp_redirect(admin_url()); exit;
    }
}
add_action('admin_init', 'wptips_disable_comments_admin_menu_redirect');

// Remove comments metabox from dashboard
function wptips_disable_comments_dashboard() {
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
}
add_action('admin_init', 'wptips_disable_comments_dashboard');

// Remove comments links from admin bar
function wptips_disable_comments_admin_bar() {
    if (is_admin_bar_showing()) {
        remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
    }
}
add_action('init', 'wptips_disable_comments_admin_bar');


function example_disable_all_comments_and_pings() {
  // Turn off comments
  if( '' != get_option( 'default_ping_status' ) ) {
    update_option( 'default_ping_status', '' );
  } // end if

  // Turn off pings
  if( '' != get_option( 'default_comment_status' ) ) {
    update_option( 'default_comment_status', '' );
  } // end if
} // end example_disable_all_comments_and_pings

add_action( 'after_setup_theme', 'example_disable_all_comments_and_pings' );