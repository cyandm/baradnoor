<?php

if ( ! class_exists( "cyn_theme_init" ) ) {
	class cyn_theme_init {
		public function __construct() {

			//actions
			add_action( 'wp_logout', [ $this, 'cyn_logout_user' ] );
			add_action( 'wp_enqueue_scripts', [ $this, 'cyn_enqueue_files' ] );
			add_action( 'after_setup_theme', [ $this, 'cyn_theme_setup' ] );
			add_action( 'init', [ $this, 'cyn_theme_init' ] );
			add_action( 'admin_enqueue_scripts', [ $this, 'cyn_admin_files' ] );
			add_action( 'wp_head', [ $this, 'cyn_head_tags' ] );

			//filters
			add_filter( 'login_errors', '__return_null' );

			//remove
			remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
			remove_action( 'wp_print_styles', 'print_emoji_styles' );
		}


		public function cyn_logout_user() {
			wp_redirect( site_url() );
			exit();
		}

		public function cyn_enqueue_files() {
			wp_enqueue_style( 'cyn-swiper-css', get_stylesheet_directory_uri() . '/assets/css/libs/swiper-bundle.min.css' );
			wp_enqueue_style( 'cyn-scss-style', get_stylesheet_directory_uri() . '/assets/css/theme-bundle.css' );
			wp_enqueue_style( 'cyn-style', get_stylesheet_directory_uri() . '/style.css' );
			wp_dequeue_style( 'wp-block-library' );


			wp_enqueue_script( 'cyn-swiper-js', get_stylesheet_directory_uri() . '/assets/js/libs/swiper-bundle.min.js', [], false, true );
			( is_front_page() && ! isset( $_COOKIE['preloader'] ) ) && wp_enqueue_script( 'cyn-p5-js', get_stylesheet_directory_uri() . '/assets/js/libs/p5.min.js', [], false, true );
			( is_front_page() && ! isset( $_COOKIE['preloader'] ) ) && wp_enqueue_script( 'cyn-matter-js', get_stylesheet_directory_uri() . '/assets/js/libs/matter.min.js', [], false, true );
			wp_enqueue_script( 'cyn-js', get_stylesheet_directory_uri() . '/assets/js/dist/scripts.bundle.min.js', [], false, true );
			wp_dequeue_script( 'global-styles' );
		}

		function cyn_theme_setup() {
			add_theme_support( 'custom-logo' );
			add_theme_support( 'post-thumbnails' );

			register_nav_menus( [ 
				'header-menu' => 'Header',
				'footer-menu' => 'Footer',
				'footer-menu-two' => 'Footer-two'
			] );
		}

		function cyn_theme_init() {
			add_filter( 'use_block_editor_for_post', '__return_false' );
		}

		public function cyn_admin_files() {
			wp_enqueue_style( 'cyn-admin', get_stylesheet_directory_uri() . '/assets/css/admin.css' );
		}

		public function cyn_head_tags() {
			if ( function_exists( 'get_field' ) ) {
				echo get_field( 'head_tag_code', get_option( 'page_on_front' ) );
			}
		}
	}
}