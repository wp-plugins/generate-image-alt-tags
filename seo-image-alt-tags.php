<?php
/*
* Plugin Name: SEO Image Tags
* Plugin URI: http://andrewmgunn.com/
* Description: Automatically generate and save alt tags to database when images are uploaded & clientside SEO image tag optimization.
* Version: 2.3
* Author: Andrew M. Gunn
* Author URI: http://andrewmgunn.com
* Text Domain: seo-image-alt-tags
* License: GPL2
*/

defined( 'ABSPATH' ) or die( 'Plugin file cannot be accessed directly.' );

add_action( 'admin_init', 'register_siat_scripts' );

function register_siat_scripts() {
	add_action( 'wp_enqueue_scripts', 'register_siat_includes' );
}

function register_siat_includes() {
	wp_register_script( 'siat_scripts', plugins_url('inc/siat-scripts.js', __FILE__), array('jquery'));
  wp_register_style( 'siat_styles', plugins_url('inc/siat-styles.css', __FILE__));
  wp_enqueue_style( 'siat_scripts' );
	wp_enqueue_script( 'siat_styles' );

}

add_filter('add_attachment', 'insert_image_alt_tag', 10, 2);

function insert_image_alt_tag($post_ID) {
	$title = get_the_title($post_ID);

	if ( ! add_post_meta( $post_ID, '_wp_attachment_image_alt', $title, true ) ) {
	   update_post_meta ( $post_ID, '_wp_attachment_image_alt', $title );
	}
}

function batch_update_image_tags() {
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

add_action( 'admin_menu', 'seo_image_tags_add_admin_menu' );


function seo_image_tags_add_admin_menu(  ) {

	add_submenu_page( 'tools.php', 'SEO Image Tags', 'SEO Image Tags', 'manage_options', 'seo_image_tags', 'seo_image_tags_options_page' );

}


function seo_image_tags_options_page(  ) {

	?>
	<form action='' method='post'>
		<?php wp_nonce_field('seo-image-alt-tags'); ?>
		<h2><b>SEO Image Tags</b></h2>
		THIS IS STILL UNDER DEVELOPMENT.
		<input type="submit" name="tag-update" id="tag-updater" value="Generate tags and Update Database" onclick=""  />
	</form>
	<?php

}

?>
