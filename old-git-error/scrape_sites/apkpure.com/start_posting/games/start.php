<?php

define( 'WP_USE_THEMES', true );
require( $_SERVER['DOCUMENT_ROOT'] .'/wp-load.php' );	
require_once(ABSPATH . 'wp-admin/includes/image.php');

function post_exists_custom( $title ) {
  global $wpdb;

  $post_title   = wp_unslash( sanitize_post_field( 'post_title', $title, 0, 'db' ) );

  $query = "SELECT ID FROM $wpdb->posts WHERE 1=1";
  $args  = array();

  if ( ! empty( $title ) ) {
    $query .= ' AND post_title = %s';
    $args[] = $post_title;
  }

  if ( ! empty( $args ) ) {
    return (int) $wpdb->get_var( $wpdb->prepare( $query, $args ) );
  }

  return 0;
}


$path    = '/home/apkfuel/public_html/apk-downloader/scrape_sites/apkpure.com/Games_content/';
$files = scandir($path);

	for ($i = 2; $i < 5; $i++) # first two entries of array are single dot(.) and double dot(..)
	{
	$appId = substr($files[$i]	, 0, -5);
    echo "$appId <br>";
	$get_json = file_get_contents("/home/apkfuel/public_html/apk-downloader/scrape_sites/apkpure.com/Games_content/$files[$i]");
	$json_obj = json_decode($get_json, true);    	
	include 'publish.php';
    #sleep(6);
    unlink('/home/apkfuel/public_html/apk-downloader/scrape_sites/apkpure.com/Games_content/'. $appId . '.json');
	}
?>