<?php        

// define( 'WP_USE_THEMES', true );
// require( $_SERVER['DOCUMENT_ROOT'] .'/wp-load.php' );	
// require_once(ABSPATH . 'wp-admin/includes/image.php');

											$post_title = $json_obj['title'];
											// echo "<br><br>############################################<br>Post Title: $post_title <br>";
											// echo "Full Description: "; echo $json_obj['descriptionHtml'];echo "<br>";
											$post_title = str_replace("&", "&amp;", $post_title);
											$post_title = str_replace("–", "-", $post_title);
                                        	
											if(isset($json_obj['details']['appDetails']['appType'])){
											// echo "apptype -> category: ";echo $json_obj['details']['appDetails']['appType'];echo "<br>";
                                            		$category_name = "games";
                                            		// echo $category_name;
                                            }
											else {$category_name = "apps";}
											$category = get_category_by_slug( $category_name );											

											// global $wpdb; $count = $wpdb->get_var("select COUNT(*) from $wpdb->posts where post_title like '$post_title' ");
											$count = 1;
											$string = str_replace(' ', '-', $json_obj['title']); // Replaces all spaces with hyphens.
   											$string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
   											$title_with_dashes = preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
                    
											$title_with_dashes = strtolower($title_with_dashes);											                                      
                                        	$permalink_var = $title_with_dashes;
											// $permalink_var = ''.$title_with_dashes.'/'.$appId.'/';
											// echo "Permalink is: $permalink_var <br>";
											$file_pointer = "https://apkfuel.com/$permalink_var";
// 											echo "<br>Post link is: $file_pointer <br>";
											
											 if (!does_url_exists($file_pointer)) {
            										// echo "Post does not exist, Publishing the post now ... <br>";
            										$count = 0;                                            		
        										}
										
										if ($count == 0)
										{
											$my_post = array(
  											'post_title'    => $post_title ,
  											'post_content'  => $json_obj['descriptionHtml'],
  											'post_status'   => 'publish',
  											'post_author'   => 1,
  											'post_category' => array( $category->term_id ) #array( 30, 20 )
											);

											$post_id = wp_insert_post( $my_post );
											// $url = $json_obj['icon'];
                                        	$url = $json_obj['image'][1]['imageUrl'];
											$r = upload_file($url, $appId);
											$thumbnail_id = $r;
                                        	
											set_post_thumbnail( $post_id, $thumbnail_id );										
											$datos_download = array(
    										'option'  		=> 'links',
    										'0' 	  		=> array( 'link'=> 'https://apkfuel.com/apk-downloader/apk.php?id='.$appId.'',
    										'texto'     	=> 'Download Link 1',
    										'follow'		=> '1'
                                                                    ),
                                            '1' 	  		=> array( 'link'=> 'https://apkfuel.com/apk-downloader/apk.php?id='.$appId.'',
    										'texto'     	=> 'Download Link 2',
    										'follow'		=> '1'
                                                                    ),
    										"links" 	=> 'https://apkfuel.com/apk-downloader/apk.php?id='.$appId.'',
    										"direct-download" => 'https://apkfuel.com/apk-downloader/apk.php?id='.$appId.''
											);
                                        
											$datos_informacion = array(
											'url_googleplay',
											'categoria'     => 'Apps',
											'descripcion'   => $json_obj['descriptionShort'],
											'desarrollador' => $json_obj['creator'],
											'desarrollador_crear'=> '1',
											'version' => $json_obj['details']['appDetails']['versionString'],                                          
											'tamano' => round($json_obj['details']['appDetails']['installationSize']/(1024*1024),1) . ' MB',
											'fecha_actualizacion' => $json_obj['details']['appDetails']['uploadDate'],
											'requerimientos' => 'Smart Phone',
											'consiguelo' => $json_obj['shareUrl'],
											'novedades' => $json_obj['details']['appDetails']['uploadDate']
											);
                                        
                                        	
                                        	$string = str_replace(' ', '-', $json_obj['title']); // Replaces all spaces with hyphens.
   											$string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
   											$title_with_dashes = preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
                    
											$title_with_dashes = strtolower($title_with_dashes);
											
                                        	// echo "Post title is: " . $title_with_dashes;echo "<br>";
												// if($title_with_dashes == "" or $title_with_dashes == "-" or $title_with_dashes == "---" or $title_with_dashes == " " ){
												// // echo "Cross language Post title is: " . $title_with_dashes;echo "<br>";
												// $string_without_spaces = str_replace(' ', '-', $json_obj['title']); // Replaces all spaces with hyphens.
												// // echo "String without spaces: " . $string_without_spaces;
												// $title_with_dashes_all_languages = preg_replace('/-+/', '-', $string_without_spaces); // Replaces multiple hyphens with single one.
												// // $title_with_dashes_all_languages = strtolower($title_with_dashes_all_languages);		
												// $file = $appId;											
												// // file_put_contents($file, $title_with_dashes_all_languages);
												// # Below line sets permalink of post
												// // echo "writing alternate title: " . $title_with_dashes_all_languages;
												// // add_post_meta($post_id, 'custom_permalink', ''.$title_with_dashes_all_languages.'/'.$appId.'/', true);
												// // add_post_meta($post_id, 'custom_permalink', $appId.'/', true);
												// }
												// else{
												// # Below line creating an issue with post publish function
												// // add_post_meta($post_id, 'custom_permalink', ''.$title_with_dashes.'/'.$appId.'/', true);
												// }
//                                         
                                        	// $permalink_var = ''.$title_with_dashes.'/'.$appId.'/';
                                        	$permalink_var = $title_with_dashes;
                                        
											add_post_meta($post_id, 'datos_download', $datos_download, true);
											add_post_meta($post_id, 'datos_informacion', $datos_informacion, true);
											
                                        	# Below line is used for seo title
                                        	add_post_meta($post_id, 'rank_math_title', $post_title." for Android - Download APK - apkfuel.com",true); 
                                            # Above line is used for seo title which displays in SERP
                                        	
                                        	add_post_meta($post_id, 'rank_math_description',$json_obj['descriptionShort'] ,true);
                                        	//set apk rating
                                   	
                                        	$date = date("Y-m-d");
                                        	$rating = round($json_obj['aggregateRating']['starRating'], 0);
                                        	$wpdb->query("INSERT INTO wp_ap_rating (id, post_id, rating_count, ip, date) VALUES ('$post_id', '$post_id', '$rating', '192.168.9.1', '$date')"  );
                                        	
                                        	// echo "Success! Post Published. Post link is: $file_pointer <br>";
                                        	
                                        	// $path    = "/home/apkfuel/public_html/apk-downloader/bulk_publish_posts/apk_json/$appId.json";
                                        	// unlink($path);
                                        	
                                       		// end of if statement
                                        }
										else 
                                        {
                                        	// echo "Post already exists on apkfuel.com. Post link: $file_pointer <br>";
                                        	// $path    = "/home/apkfuel/public_html/apk-downloader/bulk_publish_posts/apk_json/$appId.json";
                                        	// unlink($path);
                                        	
                                                                            
                                        }
										
                                        
                                        
											
?>