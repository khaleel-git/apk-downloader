<?php

define( 'WP_USE_THEMES', true );
require( $_SERVER['DOCUMENT_ROOT'] .'/wp-load.php' );	
require_once(ABSPATH . 'wp-admin/includes/image.php');

# func -> check if the file exists or not
function does_url_exists($url) {
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


session_start();
$_SESSION["mode"] = "apk-downloader";

$url=$_POST['url'];
// $url=$_GET['url']; // FOR WEB TESTING
$url = trim($url);
// echo $url;
// echo "<br>";  

$fresh_result = $_POST['fresh_result'];
$fresh_result  =  trim($fresh_result);
// echo $fresh_result;
// echo "<br>";  




#below is the code for splitting url into app id
   if (stripos($url, 'http://') === 0 || stripos($url, 'https://') === 0 || stripos($url, 'www.') === 0)# if statement runs when there is complete url with https://
   {
      $split_arr =parse_url($url);
      $split_ampr = explode("&",$split_arr['query']);#split with &
      $split_id = explode("=",$split_ampr[0]);# split with id 
      #echo $split_id[1];
      $appId = $split_id[1];
   	  $_SESSION['appId'] = $appId;
   	  
        $file_pointer = "https://apkfuel.com/apk-downloader/user_content/play_json/$appId.json";
        // echo $file_pointer;
        if (!does_url_exists($file_pointer)) {
            $output = shell_exec("python3 /home/apkfuel/htdocs/apkfuel.com/apk-downloader/playstore.py $appId 'appId' 'yes'"); //argv[1]=appId/search_q, argv[2]=mode, argv[3]=yes/no
        	// echo "<br> $output <br>";                                                       																															 		                                              
        }
        else
        {
            if($fresh_result == 'yes')
            {
                $output = shell_exec("python3 /home/apkfuel/htdocs/apkfuel.com/apk-downloader/playstore.py $appId 'appId' 'yes'");  
                // echo $output; echo "<br>";  
            }
        } 	
   	  $mode = 'appId';
    }
        
    elseif (strpos($url, ".") !== false){    
      	#initialize $url value to $appId if there is no url i.e only appId is given by user 
    	$appId = $url;
        $file_pointer = "https://apkfuel.com/apk-downloader/user_content/play_json/$appId.json";
        if (!does_url_exists($file_pointer)) {
            $output = shell_exec("python3 /home/apkfuel/htdocs/apkfuel.com/apk-downloader/playstore.py $appId 'appId' 'yes'");   
            // echo $output; echo "<br>";                                                 																															 		                                              
        }  
        else
        {
            if($fresh_result == 'yes')
            {
                $output = shell_exec("python3 /home/apkfuel/htdocs/apkfuel.com/apk-downloader/playstore.py $appId 'appId' 'yes'"); 
                // echo $output; echo "<br>";   
            }
        }                                                     																															 		                                              
    	$mode = 'appId';
     }
	else {
    	$search_q = $url;	
        // echo "search_q: ";  
        echo $search_q; echo "<br>";  	           
        $file_pointer = "https://apkfuel.com/apk-downloader/user_content/play_search/$search_q.txt";
    	// echo "<br> $file_pointer <br>";
          if (!does_url_exists($file_pointer)) {         	  
              $output = shell_exec("python3 /home/apkfuel/htdocs/apkfuel.com/apk-downloader/playstore.py '$search_q' 'search' 'no'");                                                       																															 		                                              
          }
          else
            {
                if($fresh_result == 'yes')
                {
                    $output = shell_exec("python3 /home/apkfuel/htdocs/apkfuel.com/apk-downloader/playstore.py '$search_q' 'search' 'yes'");  
                    // echo $output; echo "<br>";  
                }
            }
    	$mode = 'search';
    }

?>

<?php
// echo $mode; echo "<br>";  
switch($mode)
{
    case 'appId':
            #case logic here									                                     
            $get_json = file_get_contents("user_content/play_json/$appId.json");
            $json_obj = json_decode($get_json, true);?>

            <strong style="font-size: 18px !important; color: #218838"><?php echo $json_obj['title'] ?></strong> </br>
            <img style="margin-bottom: 5px !important; margin-top: 2px;" src= "<?php echo $json_obj['icon'] ?>" alt="icon" width="110"/></br>
            <strong>Package Name:</strong> <?php echo $json_obj['appId'] ?></br>
            <strong>Play Store Link: </strong> <a href="<?php echo $json_obj['url'] ?>" target="_blank">[Play Store]</a></br>
            <strong>App Rating:</strong> <?php echo round($json_obj['rating'], 1); ?></br>
            <strong>Downloads: </strong>    <?php echo $json_obj['num_of_downloads']  ?> </br>   
            
            <div class="w-button-green-out" style=" margin-top: 6px !important;">
            	<a style="color: white !important;" href="https://apkfuel.com/apk-downloader/apk.php?id=<?php echo $appId;?>" target="_blank";>Download APK Now</a>
            </div></hr>

            <?php                                      				

    break;

    case 'search':
        #logic          	
        $handle = fopen( "/home/apkfuel/htdocs/apkfuel.com/apk-downloader/user_content/play_search/$search_q.txt", "r");
        if ($handle) {
        	$count = 0;
            $line = fgets($handle);
            // print_r($line); echo "<br>";
            while ($line = fgets($handle)) {            
                $line = trim($line);    
                // echo $line; echo "<br>"; 
                $output = shell_exec("python3 /home/apkfuel/htdocs/apkfuel.com/apk-downloader/playstore.py $line 'appId' $fresh_result"); 
                // echo $output; echo "<br>"; 
                $get_json = file_get_contents("/home/apkfuel/htdocs/apkfuel.com/apk-downloader/user_content/play_json/$line.json");
                $json_obj = json_decode($get_json, true);          
                           		
        ?>

            <strong style="font-size: 18px !important; color: #218838"><?php echo $json_obj['title'] ?></strong> </br>
            <img style="margin-bottom: 5px !important; margin-top: 2px;" src= "<?php echo $json_obj['icon'] ?>" alt="icon" width="110"/></br>
            <strong>Package Name:</strong> <?php echo $json_obj['appId'] ?></br>
            <strong>Play Store Link: </strong> <a href="<?php echo $json_obj['url'] ?>" target="_blank">[Play Store]</a></br>
            <strong>App Rating:</strong> <?php echo round($json_obj['rating'], 1); ?></br>
            <strong>Downloads: </strong>    <?php echo $json_obj['num_of_downloads']  ?> </br>   
            
            <div class="w-button-green-out" style=" margin-top: 6px !important;">
            	<a style="color: white !important;" href="https://apkfuel.com/apk-downloader/apk.php?id=<?php echo $line;?>" target="_blank";>Download APK Now</a>
            </div></hr></br>                                                                                

        <?php 
               $count = $count + 1; 
            	// echo $count; echo "<br>";
               if($count >= 2)
               {
                    break;
               }
            } // end of while brace
            
        fclose($handle); 
        
        }# end of if condition 
     
    break;

    default:
    echo 'something wrong';
}

 ?>

