<?php                                    

											$post_title = $json_obj['title'];
											$post_title = str_replace("&", "&amp;", $post_title);
											$post_title = str_replace("–", "-", $post_title);
                                        
											$category = get_category_by_slug( $json_obj['genreId'] );

											// global $wpdb; $count = $wpdb->get_var("select COUNT(*) from $wpdb->posts where post_title like '$post_title' ");
											$count = 1;
											$string = str_replace(' ', '-', $json_obj['title']); // Replaces all spaces with hyphens.
   											$string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
   											$title_with_dashes = preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
                    
											$title_with_dashes = strtolower($title_with_dashes);											                                      
                                        	$permalink_var = ''.$title_with_dashes.'/'.$appId.'/';
											// echo "Permalink is: $permalink_var <br>";
											$file_pointer = "https://apkfuel.com/$permalink_var";
											// echo "Post link is: $file_pointer <br>";
											
											 if (!does_url_exists($file_pointer)) {
            										echo "Post does not exist, Publishing the post now ... <br>";
                                             		$count = 0;                                            		
        										}
										
										if ($count == 0)
										{
											$my_post = array(
  											'post_title'    =>$post_title ,
  											'post_content'  => $json_obj['description'],
  											'post_status'   => 'publish',
  											'post_author'   => 1,
  											'post_category' => array( $category->term_id ) #array( 30, 20 )
											);

											$post_id = wp_insert_post( $my_post );
											$url = $json_obj['icon'];
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
                    
											$title_with_dashes = strtolower($title_with_dashes);
											add_post_meta($post_id, 'custom_permalink', ''.$title_with_dashes.'/'.$appId.'/', true);
                                        
                                        	$permalink_var = ''.$title_with_dashes.'/'.$appId.'/';
                                        
											add_post_meta($post_id, 'datos_download', $datos_download, true);
											add_post_meta($post_id, 'datos_informacion', $datos_informacion, true);
                                        	add_post_meta($post_id, 'rank_math_title', $post_title." for Android - Download APK - apkfuel.com",true);
                                            add_post_meta($post_id, 'rank_math_description',$json_obj['description'] ,true);
                                        	//set apk rating
                                   	
                                        	$date = date("Y-m-d");
                                        	$rating = round($json_obj['score'], 0);
                                        	$wpdb->query("INSERT INTO wp_ap_rating (id, post_id, rating_count, ip, date) VALUES ('$post_id', '$post_id', '$rating', '192.168.9.1', '$date')"  );
                                        	echo "Success! Post Published. Post link is: $file_pointer <br>";
                                        	
                                       		// end of if statement
                                        }
										else 
                                        {
                                        	echo "Post already exists on apkfuel.com. Post link: $file_pointer <br>";
                                        	
                                                                            
                                        }
										
                                        
                                        
											
?>