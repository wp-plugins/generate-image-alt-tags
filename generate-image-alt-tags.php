<?php
/*
* Plugin Name: Generate Image Alt Tags
* Plugin URI: http://andrewmgunn.com/generate-image-alt-tags/
* Description: Automatically generate and update image Alt tags for images in the database where the Alt attribute is blank and make your site more SEO friendly.
* Version: 1.1
* Author: Andrew M. Gunn
* Author URI: http://andrewmgunn.com
* Text Domain: generate-image-alt-tags
* License: GPL2
*/

defined( 'ABSPATH' ) or die( 'Plugin file cannot be accessed directly.' );
//define( 'PLUGIN_DIR', dirname(__FILE__).'/' );
//require_once('inc/options.php');
add_action( 'admin_init', 'register_gen_alt_tag' );

function register_gen_alt_tag() {
	add_action( 'wp_enqueue_scripts', 'register_gen_alt_tag_includes' );
}

function register_gen_alt_tag_includes() {
	wp_register_script( 'gen-alt-tag-scripts', plugins_url('inc/plugin-scripts.js', __FILE__), array('jquery'));
  wp_register_style( 'gen-alt-tag-styles', plugins_url('inc/plugin-styles.css', __FILE__));
  wp_enqueue_script( 'gen-alt-tag-scripts' );
  wp_enqueue_style( 'gen-alt-tag-styles' );
}
