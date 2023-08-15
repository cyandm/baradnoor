<?php

/***************************** ACF Register */
define('MY_ACF_PATH', get_stylesheet_directory() . '/inc/acf/');
define('MY_ACF_URL', get_stylesheet_directory_uri() . '/inc/acf/');
include_once(MY_ACF_PATH . 'acf.php');


/****************************** Required Files */
require_once(__DIR__ . '/inc/classes/cyn-register.php');
require_once(__DIR__ . '/inc/classes/cyn-general.php');
require_once(__DIR__ . '/inc/classes/cyn-acf.php');

/***************************** User Login / Logut */
function cyn_logout_user()
{
    wp_redirect(site_url());
    exit();
}

add_action('wp_logout', 'logout_user');

add_filter('login_errors', function () {
    return null;
});
/***************************** Enqueue Style And Scripts */

function cyn_enqueue_files()
{
    wp_enqueue_style('cyn-scss-style', get_stylesheet_directory_uri() . '/css/normal.css');
    wp_enqueue_style('cyn-style', get_stylesheet_directory_uri() . '/style.css');
    wp_dequeue_style('wp-block-library');


    wp_enqueue_script('cyn-js', get_stylesheet_directory_uri() . '/js/dist/scripts.bundle.min.js', [], false, true);
    wp_dequeue_script('global-styles');
}
add_action('wp_enqueue_scripts', 'cyn_enqueue_files');

remove_action('wp-head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');


/***************************** Theme Setup*/

function cyn_theme_setup()
{
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');

    register_nav_menus([
        'header-menu' => 'Header',
        'footer-menu' => 'Footer',
        'footer-menu-two' => 'Footer-two'
    ]);
}
add_action('after_setup_theme', 'cyn_theme_setup');

/***************************** Theme initialize */

function cyn_theme_init()
{
    add_filter('use_block_editor_for_post', '__return_false');
}
add_action('init', 'cyn_theme_init');


/***************************** Instance Classes */
$cyn_register = new cyn_register();

$cyn_general = new cyn_general();

$cyn_acf = new cyn_acf();
