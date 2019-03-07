<?php 


/**
*  Trigger this file on uninstall 
*
*/

if ( !defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	die;
}

// Here clearing the database stored value.

// $headertop = get_post(	array( 'post_type' => 'headertop' , 'numberpost' => -1 ) );

// foreach ($headertop as $items) {
// 	wp_delete_posts($headertop->ID, true);
// }

// Access the Databases via SQL

global $wpdb;

$wpdb->query( "DELETE FROM wp_posts WHERE post_type = 'headertop'" );
$wpdb->query( "DELETE FROM wp_postmeta WHERE post_id NOT IN (SELECT id FROM wp_posts)" );
$wpdb->query( "DELETE FROM wp_term_relationships WHERE object_id NOT IN (SELECT id FROM wp_posts)" );