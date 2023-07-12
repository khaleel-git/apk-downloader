<?php   
	
	$title_with_version = $json_obj['title']. " " . $json_obj['version'];
	$check = post_exists_custom($title_with_version);
	echo "<br> check: $check<br>";

	if($check == ''){

    // $parent_category = get_category_by_slug( $json_obj['main_cat'] );
    $parent_category = get_category_by_slug( 'apps' );
    // $child_category = get_category_by_slug( $json_obj['sub_cat'] );
    if($json_obj['sub_cat'] == 'Books & Reference')
    {
    	$child_category = get_category_by_slug( 'books_and_reference');
    }
    elseif($json_obj['sub_cat'] == 'Health & Fitness')
    {
    	$child_category = get_category_by_slug( 'health_and_fitness');
    }
    elseif($json_obj['sub_cat'] == 'Food & Drink')
    {
    	$child_category = get_category_by_slug( 'food_and_drink');
    }
    elseif($json_obj['sub_cat'] == 'House & Home')
    {
    	$child_category = get_category_by_slug( 'house_and_home');
    }
    elseif($json_obj['sub_cat'] == 'Libraries & Demo')
    {
    	$child_category = get_category_by_slug( 'libraries_and_demo');
    }
    elseif($json_obj['sub_cat'] == 'Maps & Navigation')
    {
    	$child_category = get_category_by_slug( 'maps_and_navigation');
    }
    elseif($json_obj['sub_cat'] == 'Music & Audio')
    {
    	$child_category = get_category_by_slug( 'music_and_audio');
    }
    elseif($json_obj['sub_cat'] == 'Music & Audio')
    {
    	$child_category = get_category_by_slug( 'news_and_magazines');
    }
    elseif($json_obj['sub_cat'] == 'Travel & Local')
    {
    	$child_category = get_category_by_slug( 'travel_and_local');
    }
    elseif($json_obj['sub_cat'] == 'Video Players & Editors')
    {
    	$child_category = get_category_by_slug( 'video_players');
    }
    else{
    	$child_category = get_category_by_slug( $json_obj['sub_cat']);
    }


    $my_post = array(
    'post_title'    =>$json_obj['title'] . " ". $json_obj['version'] ,
    'post_content'  => $json_obj['description'],
    'post_status'   => 'publish',
    'post_author'   => 1,
    'post_category' => array( $parent_category->term_id, $child_category->term_id  ) #array( 30, 20 )
    );

    $post_id = wp_insert_post( $my_post );
    $url = $json_obj['app_icon'];
    $r = upload_file($url, $appId);
    $thumbnail_id = $r;
    
    set_post_thumbnail( $post_id, $thumbnail_id );										
    $datos_download = array(
    'option'  		=> 'links',
    '0' 	  		=> array( 'link'=> 'https://apkfuel.com/apk-downloader/apk.php?id='.$appId.'&src=apr',
    'texto'     	=> 'Download Link 1',
    'follow'		=> '1'
                            ),
    '1' 	  		=> array( 'link'=> 'https://apkfuel.com/apk-downloader/apk.php?id='.$appId.'&src=apr',
    'texto'     	=> 'Download Link 2',
    'follow'		=> '1'
                            ),
    "links" 	=> 'https://apkfuel.com/apk-downloader/apk.php?id='.$appId. '&src=pure',
    "direct-download" => 'https://apkfuel.com/apk-downloader/apk.php?id='.$appId.'&src=apr'
    );

    $datos_informacion = array(
    'url_googleplay'=> $json_obj['playstore_url'],
    'categoria'     => $json_obj['sub_cat'],
    'descripcion'   => $json_obj['short_description'],
    'desarrollador' => $json_obj['dev'],
    'desarrollador_crear'=> '1',
    'version' => $json_obj['version'],
    'tamano' => $json_obj['size'],
    'fecha_actualizacion' => $json_obj['updated'],
    'requerimientos' => $json_obj['requirements'],
    'consiguelo' => $json_obj['playstore_url'],
    'novedades' => $json_obj['whats_new']
    );

    add_post_meta($post_id, 'datos_download', $datos_download, true);
    add_post_meta($post_id, 'datos_informacion', $datos_informacion, true);
    add_post_meta($post_id, 'rank_math_title', $json_obj['title']. " " . $json_obj['version']. " for Android - Download APK - apkfuel.com",true);
    add_post_meta($post_id, 'rank_math_description',$json_obj['title']. " " . $json_obj['version']. " for Android - Download APK - apkfuel.com updated latest version, original playstore app ...",true);
    add_post_meta($post_id, 'rank_math_focus_keyword',$json_obj['title'] ,true);
    add_post_meta($post_id, 'new_rating_users',$json_obj['total_reviews'] ,true);
    add_post_meta($post_id, 'new_rating_count',$json_obj['total_reviews'] ,true);
    add_post_meta($post_id, 'new_rating_average',$json_obj['rating'] ,true);
    //set apk rating

    // $date = date("Y-m-d");
    // $rating = round($json_obj['rating']);
    // $wpdb->query("INSERT INTO wp_ap_rating (id, post_id, rating_count, ip, date) VALUES ('$post_id', '$post_id', '$rating', '192.168.9.1', '$date')"  );
    
    }
else {
	echo "<br>Stop! This post exists with post-id: $check <br>";
}
?>