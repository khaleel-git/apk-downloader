<?php
$myfile = fopen("appIds.txt", "a") or die("Unable to open file!");
fwrite($myfile, "\n". $appId);
fclose($myfile);


define( 'WP_USE_THEMES', true );
require( $_SERVER['DOCUMENT_ROOT'] .'/wp-load.php' );	


function upload_file($image_url, $post_id)
{
   $image = $image_url;
	//echo '$image is '; echo $image;echo'<br>';echo'<br>';

    $get = wp_remote_get($image);
	
	//echo '$get is '; echo $get;echo'<br>';echo'<br>';

    $type = wp_remote_retrieve_header($get, 'content-type');
	//echo '$type is ';echo $type;echo'<br>';echo'<br>';
	// $type = 'image/png';
       $type = 'image/webp';
    
	

    if (!$type) {
        return false;
    }
	$baseimage = basename($image);
	//echo '$baseimage is ';echo $baseimage; echo '<br>';echo'<br>';
	//echo $appId_image;
	$baseimage = $post_id.'_icon.webp';
	//echo 'base image: ';echo $baseimage;
	//echo 'new $baseimage is ';echo $baseimage; echo '<br>';echo'<br>';

    #$mirror = wp_upload_bits(basename($image), '', wp_remote_retrieve_body($get));
	$mirror = wp_upload_bits($baseimage, '', wp_remote_retrieve_body($get));
	 //echo '$mirror is ';echo'<br>';echo'<br>';
     //print_r($mirror);echo '<br>';
	//echo $mirror["file"];
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
											// $info = getimagesize($old_image);
											// print_r($info);echo '<br>';
                                        
                                        	$output = shell_exec("cwebp -q 80 $old_image -o $old_image");
// 											echo 'new image resiezed successfully';
// 											echo "<pre>$output</pre>";
                                        
//                                         	echo '<br>new image url: '; echo $old_image;echo '<br>';
//                                         	$info = getimagesize($old_image);
// 											print_r($info);echo '<br>';
	//

    require_once(ABSPATH . 'wp-admin/includes/image.php');

    $attach_data = wp_generate_attachment_metadata($attach_id, $mirror['file']);

    wp_update_attachment_metadata($attach_id, $attach_data);

    return $attach_id;
}
//end of custom khaleel function


										$post_title = $json_obj['title'];
										$post_title = str_replace("&", "&amp;", $post_title);
										$post_title = str_replace("–", "-", $post_title);
                                        
										$category = get_category_by_slug( $json_obj['genreId'] );

										global $wpdb; $count = $wpdb->get_var("select COUNT(*) from $wpdb->posts where post_title like '$post_title' ");
										//echo 'Post count = ';echo $count;echo '<br>';
										if ($count ==0)
										{
											$my_post = array(
  											'post_title'    =>$post_title ,
  											'post_content'  => $json_obj['description'],
  											'post_status'   => 'publish',
  											'post_author'   => 1,
  											'post_category' => array( $category->term_id ) #array( 30, 20 )
											);
 
											// Insert the post into the database
											//$post_id = post_exists( $post_title ); //or wp_insert_post( $my_post );
											//echo $post_id;
											$post_id = wp_insert_post( $my_post );

											$url = $json_obj['icon'];
                                        	
											//echo $post_id_image;
											$r = upload_file($url, $appId);
                                        	//echo $r;

											$thumbnail_id = $r;
//                                         	$old_image = wp_get_attachment_url( $thumbnail_id );
//                                         	echo '<br>old image url: '; echo $old_image;echo '<br>';
//                                         	$info = getimagesize($old_image);
// 											print_r($info);echo '<br>';
                                        
//                                         	$output = shell_exec("cwebp -q 80 $old_image -o $old_image");
// 											echo 'new image resiezed successfully';
// 											echo "<pre>$output</pre>";
                                        
//                                         	echo '<br>new image url: '; echo $old_image;echo '<br>';
//                                         	$info = getimagesize($old_image);
// 											print_r($info);echo '<br>';
                                        	
											set_post_thumbnail( $post_id, $thumbnail_id );

											//add_post_meta($post_id, 'custom_permalink', 'app/"'.$appId.'"/', true);
											$datos_download = array(
    										'option'  		=> 'links',
    										'0' 	  		=> array( 'link'=> 'https://play.xyyoutube.com/apks/'.$appId.'.apk',
    										'texto'     	=> 'Download Link 1',
    										'follow'		=> '1'
                                                                    ),
                                            '1' 	  		=> array( 'link'=> 'https://play.xyyoutube.com/apks/'.$appId.'.apk',
    										'texto'     	=> 'Download Link 2',
    										'follow'		=> '1'
                                                                    ),
    										"links" 	=> 'https://play.xyyoutube.com/apks/'.$appId.'.apk',
    										"direct-download" => 'https://play.xyyoutube.com/apks/'.$appId.'.apk'
  												//'post_category' => array( 10, -1 )
                                            
                                           /*$datos_download = array(
    										'option'  		=> 'links',
    										'link' 	  		=>'https://play.xyyoutube.com/apks/'.$appId.'',
    										'texto'     	=> 'Download Now',
    										'follow'		=> '1',
    										"links" 	=> 'https://play.xyyoutube.com/apks/'.$appId.'.apk',
    										"direct-download" => 'https://play.xyyoutube.com/apks/'.$appId.'.apk'
                                            */
											);
											$datos_informacion = array(
											'url_googleplay',
											'categoria'     => 'Apps',
											'descripcion'   => $json_obj['summary'],
											'desarrollador' => $json_obj['developer'],
											'desarrollador_crear'=> '1',
											'version' => $json_obj['version'],
											'tamano' => $json_obj['size'],
											'fecha_actualizacion' => $updated,
											'requerimientos' => $json_obj['androidVersionText'],
											'consiguelo' => $json_obj['url'],
											'novedades' => ''
											);
                                        	$string = str_replace(' ', '-', $json_obj['title']); // Replaces all spaces with hyphens.
   											$string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
   											$title_with_dashes = preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
                                        	//$string = str_replace(' ', '-', $json_obj['title']); // Replaces all spaces with hyphens.
   											//$title_with_dashes = preg_replace('/[^A-Za-z0-9\-]/', '', $string);
                                        	//$title_with_dashes = preg_replace('#[ -]+#', '-', $post_title);
                                        	//$meta_description = mb_strimwidth($json_obj['description'], 0, 150)
                    
											$title_with_dashes = strtolower($title_with_dashes);
											add_post_meta($post_id, 'custom_permalink', ''.$title_with_dashes.'/'.$appId.'/', true);
                                        
                                        	$permalink_var = ''.$title_with_dashes.'/'.$appId.'/';
                                        	//echo $permalink_var;
                                        
											add_post_meta($post_id, 'datos_download', $datos_download, true);
											add_post_meta($post_id, 'datos_informacion', $datos_informacion, true);
                                        	add_post_meta($post_id, 'rank_math_title', $post_title." for Android - Download APK - apkfuel.com",true);
                                            add_post_meta($post_id, 'rank_math_description',$json_obj['description'] ,true);
                                        	//set apk rating
                                   	
                                        	//$date = date("Y-m-d");
                                        	$rating = round($json_obj['score'], 0);
                                        	$wpdb->query("INSERT INTO wp_ap_rating (id, post_id, rating_count, ip, date) VALUES ('$post_id', '$post_id', '$rating', '192.168.9.1', '$date')"  );
                                        	//echo 'New Post link is: '
                                        ?>
                                        	<div class="w-button" style=" margin-top: 6px !important;">
                                            <a style="color: white !important;" href="https://apkfuel.com/<?php echo $permalink_var;?>" target="_blank">See More Details</a></div>
										<?php
                                        }// end of if statement
										else 
                                        {
                                        echo 'Post already exists on apkfuel.com. Updating this post to latest';
                                                                            
                                        }
										
                                        
                                        
											
?>