<?php

define( 'WP_USE_THEMES', true );
require( $_SERVER['DOCUMENT_ROOT'] .'/wp-load.php' );	
require_once(ABSPATH . 'wp-admin/includes/image.php');

$path    = '/home/apkfuel/public_html/apk-downloader/bulk_publish_posts/genre/content/apk_jsons';
$files = scandir($path);

	for ($i = 2; $i < count($files); $i++) # first two entries of array are single dot(.) and double dot(..)
	{
	$appId = substr($files[$i]	, 0, -5);
    echo "$appId <br>";
	$get_json = file_get_contents("content/apk_jsons/$files[$i]");
	$json_obj = json_decode($get_json, true);    	
	include 'bulk_publish.php';
	}
?>