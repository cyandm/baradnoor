<?php
/****************************** Required Files */
require_once( __DIR__ . '/inc/classes/cyn-register.php' );
require_once( __DIR__ . '/inc/classes/cyn-general.php' );
require_once( __DIR__ . '/inc/classes/cyn-acf.php' );
require_once( __DIR__ . '/inc/classes/cyn-init-theme.php' );



/***************************** Instance Classes */
$cyn_theme_init = new cyn_theme_init();
$cyn_register = new cyn_register();
$cyn_general = new cyn_general();
$cyn_acf = new cyn_acf();