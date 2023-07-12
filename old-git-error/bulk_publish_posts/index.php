<?php

define( 'WP_USE_THEMES', true );
require( $_SERVER['DOCUMENT_ROOT'] .'/wp-load.php' );	
require_once(ABSPATH . 'wp-admin/includes/image.php');


 										function does_url_exists($url) 
                                        {
                                            $ch = curl_init($url);
                                            curl_setopt($ch, CURLOPT_NOBODY, true);
                                            curl_exec($ch);
                                            $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                                            if ($code == 200) {
                                            $status = true;
                                            } else {
                                            $status = false;
                                            }
                                            curl_close($ch);
                                            return $status;
                                        } 

 											function upload_file($image_url, $post_id)
                                            {
                                                $image = $image_url;
                                                // echo '$image is '; echo $image;echo'<br>';echo'<br>';

                                                $get = wp_remote_get($image);
                                                
                                                // echo '$get is '; echo $get;echo'<br>';echo'<br>';

                                                $type = wp_remote_retrieve_header($get, 'content-type');
                                                // echo '$type is ';echo $type;echo'<br>';echo'<br>';
                                                // $type = 'image/png';
                                                $type = 'image/webp';
                                                
                                                

                                                if (!$type) {
                                                    return false;
                                                }
                                                $baseimage = basename($image);
                                                // echo '$baseimage is ';echo $baseimage; echo '<br>';echo'<br>';
                                                // echo $appId_image;
                                                $baseimage = $post_id.'_icon.webp';
                                                // echo 'base image: ';echo $baseimage;
                                                // echo 'new $baseimage is ';echo $baseimage; echo '<br>';echo'<br>';

                                                #$mirror = wp_upload_bits(basename($image), '', wp_remote_retrieve_body($get));
                                                $mirror = wp_upload_bits($baseimage, '', wp_remote_retrieve_body($get));
                                                // echo '$mirror is ';echo'<br>';echo'<br>';
                                                // print_r($mirror);echo '<br>';
                                                // echo $mirror["file"];
                                                $old_image = $mirror["file"];

                                                $attachment = array(
                                                    'post_title' => $baseimage,
                                                    'post_mime_type' => $type
                                                );

                                                // echo '$attachement array is ';//echo $arrachment;echo'<br>';echo'<br>';
                                                // print_r($attachment);echo '<br>';

                                                $attach_id = wp_insert_attachment($attachment, $mirror['file'], $post_id);
                                                // echo '$attach_id is ';//echo $attach_id;echo'<br>';echo'<br>';
                                                // print_r($attach_id);echo '<br>';

                                                //convert image to webp
                                                                                        
                                                                                        // echo '<br>old image url: '; echo $old_image;echo '<br>';
                                                                                        $info = getimagesize($old_image);
                                                                                        // print_r($info);echo '<br>';
                                                                                    
                                                                                        $output = shell_exec("cwebp -q 80 $old_image -o $old_image");
                                            											// echo 'new image resiezed successfully';
                                            											// echo "<pre>$output</pre>";
                                                                                    
                                                                                    	// echo '<br>new image url: '; echo $old_image;echo '<br>';
                                                                                    	$info = getimagesize($old_image);
                                            											// print_r($info);echo '<br>';
                                                

                                                // require_once(ABSPATH . 'wp-admin/includes/image.php');

                                                $attach_data = wp_generate_attachment_metadata($attach_id, $mirror['file']);

                                                wp_update_attachment_metadata($attach_id, $attach_data);

                                                return $attach_id;
                                            }
                                            //end of custom khaleel function


	$path    = '/home/apkfuel/public_html/apk-downloader/bulk_publish_posts/apk_json';
	$files = scandir($path);

 	$files_count = count($files);
	$files_count = $files_count;
	
	if($files_count == 0 or $files_count == 1){
    	echo "No more file is left, exiting ... <br>";
    	exit();
    }

	for ($i = 2; $i < 12; $i++) # first two entries of array are single dot(.) and double dot(..)
	{
    	if($i > $files_count){break;}
    
	$appId = substr($files[$i]	, 0, -5);
    
    echo "######################<br> <strong>App ID: $appId </strong><br>";
	
    $get_json = file_get_contents("apk_json/$files[$i]");
	$json_obj = json_decode($get_json, true);    	
	
    include 'publish.php';   
     #sleep(6);
	}

	$path    = '/home/apkfuel/public_html/apk-downloader/bulk_publish_posts/apk_json';
    $files = scandir($path);
    $files_count = count($files);
	$files_count = $files_count - 2;
    echo "there are ". $files_count . " number of files left in the directory at the end <br> -> This script has processed 10 files and successfully deleted from server<br>";
   