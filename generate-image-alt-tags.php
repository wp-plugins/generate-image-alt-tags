<?php
/*
* Plugin Name: Easy Image SEO Tags
* Plugin URI: http://andrewmgunn.com/
* Description: Automatically generate and save alt tags to database when images are uploaded & clientside SEO image tag optimization.
* Version: 1.2.1
* Author: Andrew M. Gunn
* Author URI: http://andrewmgunn.com
* Text Domain: generate-image-alt-tags
* License: GPL2
*/

defined( 'ABSPATH' ) or die( 'Plugin file cannot be accessed directly.' );
//define( 'PLUGIN_DIR', dirname(__FILE__).'/' );
//require_once('inc/options.php');
add_action( 'admin_init', 'register_siat_scripts_easy' );

function register_siat_scripts_easy() {
	add_action( 'wp_enqueue_scripts', 'register_siat_includes_easy' );
}

function register_siat_includes_easy() {
	wp_register_script( 'siat_scripts_easy', plugins_url('inc/siat-scripts.js', __FILE__), array('jquery'));
  wp_register_style( 'siat_styles_easy', plugins_url('inc/siat-styles.css', __FILE__));
  wp_enqueue_style( 'siat_scripts_easy' );
	wp_enqueue_script( 'siat_styles_easy' );

}

add_filter('add_attachment', 'insert_image_alt_tag_easy', 10, 2);

function insert_image_alt_tag_easy($post_ID) {
	$title = get_the_title($post_ID);

	if ( ! add_post_meta( $post_ID, '_wp_attachment_image_alt', $title, true ) ) {
	   update_post_meta ( $post_ID, '_wp_attachment_image_alt', $title );
	}
}

function batch_update_image_tags_easy() {
	$args = array(
    'post_type' => 'attachment',
    'numberposts' => -1,
    'post_status' => null,
    'post_parent' => null, // any parent
    );

	$attachments = get_posts($args);
	if ($attachments) {
	    foreach ($attachments as $post) {
	        setup_postdata($post);
	        the_title();
	        the_attachment_link($post->ID, false);
	        the_excerpt();
	    }
	}
}

add_action( 'admin_menu', 'seo_image_tags_add_admin_menu_easy' );


function seo_image_tags_add_admin_menu_easy(  ) {

	add_submenu_page( 'tools.php', 'Easy Image SEO Tags', 'Image SEO Tags', 'manage_options', 'easy_image_seo_tags', 'seo_image_tags_options_page_easy' );

}


function seo_image_tags_options_page_easy(  ) {

	?>
	<form action='' method='post'>

		<h2><b>SEO Image Tags</b></h2>
		THIS IS STILL UNDER DEVELOPMENT.
		<input type="submit" name="tag-update" id="tag-updater" value="Generate tags and Update Database" onclick=""  />
	</form>
	<?php

}
