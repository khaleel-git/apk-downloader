<?php
#This code is written by khaleel Ahmad, the founder of apkfuel.com, facebook=khalil404ahmad
$url=$_POST['url'];
$url = trim($url);
//getting parameters from ajax call
//get device=['phone','TV','Tablet']
$device = $_POST['tbi'];
// echo "Device = $device <br>";
//get language
$hl = $_POST['hl'];
// get architecture -> universal arch = cloudbook
$arch = $_POST['arch'];
// echo "Architecture = $arch <br>";
// get android version
$android_ver = $_POST['android_ver'];
// echo "android_ver = $android_ver <br>";
//end of ajax call
$target_device = "cloudbook"; //default device
//matching calculation
// echo "Matching Calculation: <br>";

if ($device =='phone' && $arch == 'universal')//Default condition (use for the best case of algorithm in terms of performance)
{	
	$device = "no_Switch_Condidtion";
	//$target_Device = "cloudbook, fs454, maguro, nxtl09, wetekplay2";
	$target_device = "cloudbook";
	// echo "The Target device is = $target_device <br>";
}

switch($device)
{
	case 'phone':
						if($arch=="armeabi")//first if condition for armeabi cpu architecture
                        {
                        	if($android_ver == 2.3)
                            	{        
                            		$target_device = "bravo";
                            		echo "Target Device is = $target_device <br>";
                            	}
                        	else if($android_ver == 4.0)
                            	{
                            		$target_device = "pico";
                            		echo "Target Device is = $target_device <br>";
                            	}
                        	else if($android_ver == 4.1)
                            	{
                            		$target_device = "alien_jolla_bionic";
                            		echo "Target Device is = $target_device <br>";
                            	}
                        	else if($android_ver == 4.3)
                            	{
                            		$target_device = "eeepad";
                            		echo "Target Device is = $target_device <br>";
                            	}
                        	else if($android_ver == 4.4)
                            	{
                            		// $target_device = "cwv88s, fresh, JP-1601, m201, Tab_8_4C (for Tablet)";
                            		$target_device = "cwv88s";
                            		echo "Target Devices are = $target_device <br>";
                            	}
                        	else if($android_ver == 5.0)
                            	{
                            		$target_device = "t00q";
                            		echo "Target Device is = $target_device <br>";
                            	}
                        	else if($android_ver == 5.1)
                            	{
                            		$target_device = "sloane";
                            		echo "Target Device is = $target_device <br>";
                            	}
                        	else if($android_ver == 6.0)//6.0 will not run in this code becuase it has a priority condition above switch case, here just writing for code reuseablity
                            	{
                            		$target_device = "cloudbook";
                            		echo "Target Device is = $target_device <br>";
                            	}
                        	else if($android_ver == 7.0)
                            	{
                            		// $target_device = "BRAVIA_ATV_2 (probably for TV), gts3llte";
                            		$target_device = "cloudbook";
                            		echo "Target Devices are = $target_device <br>";
                            	}
                        	else if($android_ver == 7.1)
                            	{
                            		$target_device = "aries";
                            		echo "Target Devices are = $target_device <br>";
                            	}
                        	else if($android_ver == 8.0)
                            	{
                            		$target_device = "crackling";
                            		echo "Target Devices are = $target_device <br>";
                            	}
                        	else if($android_ver == 8.1)
                            	{
                            		// $target_device = "angler, bullhead, foster (TV), gemini, hammerhead, kenzo, manta, onepluse3, sailfish, shamu";
                            		$target_device = "hammerhead";
                            		echo "Target Devices are = $target_device <br>";
                            	}
                        	else if($android_ver == 9.0)
                            	{
                            		$target_device = "walleye";
                            		echo "Target Devices are = $target_device <br>";
                            	}
                        	else // for higher android version than 9.0 i.e 10,11,12 (latest)
                            	{
                            		$target_device = "walleye";
                            		echo "Target Devices are = $target_device <br>";
                            	}                  
                        	//higher android versions are not available in armeabi-v71 cpu architecture 
                        }
						else if($arch=="armeabi-v7a")
                        {
                        	if($android_ver == 2.3)
                            	{        
                            		$target_device = "bravo";
                            		echo "Target Device is = $target_device <br>";
                            	}
                        	else if($android_ver == 4.0)
                            	{
                            		$target_device = "pico";
                            		echo "Target Device is = $target_device <br>";
                            	}
                        	else if($android_ver == 4.1)
                            	{
                            		$target_device = "alien_jolla_bionic";
                            		echo "Target Device is = $target_device <br>";
                            	}
                        	else if($android_ver == 4.3)
                            	{
                            		$target_device = "eeepad";
                            		echo "Target Device is = $target_device <br>";
                            	}
                        	else if($android_ver == 4.4)
                            	{
                            		$target_device = "cwv88s";
                            		echo "Target Devices are = $target_device <br>";
                            	}
                        	else if($android_ver == 5.0)
                            	{
                            		$target_device = "t00q";
                            		echo "Target Device is = $target_device <br>";
                            	}
                        	else if($android_ver == 5.1)
                            	{
                            		$target_device = "sloane";
                            		echo "Target Device is = $target_device <br>";
                            	}
                        	else if($android_ver == 6.0)//6.0 will not run in this code becuase it has a priority condition above switch case, here just writing for code reuseablity
                            	{
                            		$target_device = "cloudbook";
                            		echo "Target Device is = $target_device <br>";
                            	}
                        	else if($android_ver == 7.0)
                            	{
                            		$target_device = "cloudbook";
                            		echo "Target Devices are = $target_device <br>";
                            	}
                        	else if($android_ver == 7.1)
                            	{
                            		$target_device = "aries";
                            		echo "Target Devices are = $target_device <br>";
                            	}
                        	else 
                            	{
                            		$target_device = "aries";
                            		echo "Any of 7.1 android version related device. Choosing this Target Device now = $target_device <br>";
                            	}
                        	//higher android versions are not available in armeabi-v71 cpu architecture 
                        }
						//start of 2nd if condition
						else if($arch=="arm64-v8a")
                        {
                        	if($android_ver == 5.1)
                            	{        
                            		$target_device = "sloane";
                            		echo "Target Device is = $target_device <br>";
                            	}
                        	else if($android_ver == 6.0)
                            	{
                            		$target_device = "cloudbook";
                            		echo "Target Device is = $target_device <br>";
                            	}
                        	else if($android_ver == 7.0)
                            	{
                            		$target_device = "cloudbook";
                            		echo "Target Devices are = $target_device <br>";
                            	}
                        	else if($android_ver == 7.1)
                            	{
                            		// $target_device = "aries, bacon, bbb100, fp2, gtp7510, honami, K013_1, m3xx, mako";
                            		$target_device = "aries";
                            		echo "Target Devices are = $target_device <br>";
                            	}
                        	else if($android_ver == 8.0)
                            	{
                            		$target_device = "crackling";
                            		echo "Target Devices are = $target_device <br>";
                            	}
                        	else if($android_ver == 8.1)
                            	{
                            		// $target_device = "angler, bullhead, foster, gemini, hammerhead, kenzo, manta, onepluse3, sailfish, shamu";
                            		$target_device = "shamu";
                            		echo "Target Devices are = $target_device <br>";
                            	}
                        	else if($android_ver >= 9.0)
                            	{
                            		$target_device = "walleye";
                            		echo "Target Devices are = $target_device <br>";
                            	}                       	
                        	else {
                            	$target_device = "cloudbook";
                            		echo "Target Devices are = $target_device <br>";
                            }
                        }
						//start of 3rd else if condition for x86 cpu architecture
						else if($arch=="x86")
                        {
                        	if($android_ver == 4.4)
                            	{        
                            		$target_device = "fresh";
                            		echo "Target Devices are = $target_device <br>";
                            	}
                        	else if($android_ver == 5.0)
                            	{
                            		$target_device = "t00q";
                            		echo "Target Device is = $target_device <br>";
                            	}
                        	else if($android_ver == 6.0)
                            	{
                            		$target_device = "cloudbook";
                            		echo "Target Devices are = $target_device <br>";
                            	}
                        	else if($android_ver == 7.1)
                            	{
                            		$target_device = "cloudbook";
                            		echo "Target Devices are = $target_device <br>";
                            	}
                        	
                        	else // for higher android version than 7.1 i.e 8,9,10,11,12 (latest)
                            	{
                            		$target_device = "aries";
                            		echo "Target Devices are = $target_device <br>";
                            	}                                       	
                        }
						//start of 4th else if condition for x86_64 cpu architecture
						else if($arch=="x86_64")
                        {
                        	if($android_ver == 6.1)
                            	{        
                            		$target_device = "cloudbook";
                            		echo "Target Devices are = $target_device <br>";
                            	}
                        	
                        	else 
                            	{
                            		$target_device = "cloudbook";
                            		echo "Target Devices are = $target_device <br>";
                            	}                                       	
                        }
						break;
	
	case 'tab':
						if($arch=="armeabi")//first if condition for armeabi cpu architecture
                        {
                        	
                        	if($android_ver == 4.3)
                            	{
                            		$target_device = "eeepad";
                            		echo "Target Device is = $target_device <br>";
                            	}                    
                        	else if($android_ver == 7.0)
                            	{
                            		$target_device = "gts3llte";
                            		echo "Target Devices are = $target_device <br>";
                            	}
                        	else if($android_ver == 7.1)
                            	{
                            		$target_device = "K013_1";
                            		echo "Target Devices are = $target_device <br>";
                            	}                        	
                        	else if($android_ver > 7.1)
                            	{
                            		$target_device = "K013_1";
                            		echo "Target Devices are = $target_device <br>";
                            	}                  
                        	 else if($android_ver < 7.0)
                            	{
                            		$target_device = "eeepad";
                            		echo "Target Devices are = $target_device <br>";
                            	} 
                        }
						else if($arch=="armeabi-v7a")
                        {
                        	if($android_ver == 4.3)
                            	{
                            		$target_device = "eeepad";
                            		echo "Target Device is = $target_device <br>";
                            	}
                        	else if($android_ver = 4.4 )
                            	{
                            		$target_device = "Tab_8_4C";
                            		echo "Target Devices are = $target_device <br>";
                            	}
                        	else if($android_ver == 7.0)
                            	{
                            		$target_device = "gts3llte";
                            		echo "Target Devices are = $target_device <br>";
                            	}
                        	else if($android_ver == 7.1)
                            	{
                            		$target_device = "K013_1";
                            		echo "Target Devices are = $target_device <br>";
                            	}                        	
                        	else if($android_ver > 7.1)
                            	{
                            		$target_device = "K013_1";
                            		echo "Target Devices are = $target_device <br>";
                            	}                  
                        	 else if($android_ver < 7.0)
                            	{
                            		$target_device = "Tab_8_4C";
                            		echo "Target Devices are = $target_device <br>";
                            	}                      
                        	//higher android versions are not available in armeabi-v71 cpu architecture 
                        }
						//start of 2nd if condition
						else if($arch=="arm64-v8a")
                        {
                        	
                        	if($android_ver == 7.0)
                            	{
                            		$target_device = "gts3llte";
                            		echo "Target Devices are = $target_device <br>";
                            	}
                        	else if($android_ver > 7.0)
                            	{
                            		$target_device = "gts3llte";
                            		echo "Target Devices are = $target_device <br>";
                            	} 
                        	else if($android_ver < 7.0)
                            	{
                            		$target_device = "cloudbook";
                            		echo "Target Devices are = $target_device <br>";
                            	} 
                          	
                        }
						//start of 3rd else if condition for x86 cpu architecture
						else if($arch=="x86")
                        {
                        	if($android_ver = 4.4 )
                            	{
                            		$target_device = "Tab_8_4C";
                            		echo "Target Devices are = $target_device <br>";
                            	}
                        	else if($android_ver >= 7.1)
                        	{
                        		$target_device = "K013_1";
                        		echo "Target Devices are = $target_device <br>";
                        	}  
                        	
                        	else if($android_ver < 7.1 && $android_ver > 4.4)
                            	{
                            		$target_device = "Tab_8_4C";
                            		echo "Target Devices are = $target_device <br>";
                            	} 
                            else{
                           			$target_device = "cloudbook";
                            		echo "Target Devices are = $target_device <br>";
                           		}
                        }
						//start of 4th else if condition for x86_64 cpu architecture
						else if($arch=="x86_64")
                        {
                        	$target_device = "cloudbook";	                                     	
                        }
						break; 

	case 'tv':
						if($arch=="armeabi" || $arch=="armeabi-v7a")//first if condition for armeabi cpu architecture
                        {
                        	
                        	if($android_ver == 4.4)
                            	{
                            		$target_device = "m201";
                            		echo "Target Device is = $target_device <br>";
                            	}                    
                        	else if($android_ver == 5.1)
                            	{
                            		$target_device = "sloane";
                            		echo "Target Devices are = $target_device <br>";
                            	}
                        	else if($android_ver == 6.0)
                            	{
                            		$target_device = "wetekplay2";
                            		echo "Target Devices are = $target_device <br>";
                            	}                        	
                        	else if($android_ver = 7.0)
                            	{
                            		$target_device = "BRAVIA_ATV2";
                            		echo "Target Devices are = $target_device <br>";
                            	}                  
                        	 else if($android_ver == 8.1)
                            	{
                            		$target_device = "foster";
                            		echo "Target Devices are = $target_device <br>";
                            	}
                        	 else if($android_ver > 8.1)
                            	{
                            		$target_device = "foster";
                            		echo "Target Devices are = $target_device <br>";
                            	}                        	
                        	else 
                            	{
                            		$target_device = "cloudbook";
                            	}
                        }
						
						//start of 2nd if condition
						else if($arch=="arm64-v8a")
                        {
                        	
                        	if($android_ver == 5.1)
                            	{
                            		$target_device = "sloane";
                            		echo "Target Devices are = $target_device <br>";
                            	}
                        	else if($android_ver == 8.1)
                            	{
                            		$target_device = "foster";
                            		echo "Target Devices are = $target_device <br>";
                            	}
                        	else if($android_ver > 8.1)
                            	{
                            		$target_device = "foster";
                            		echo "Target Devices are = $target_device <br>";
                            	} 
                        	else if($android_ver > 5.1 && $android_ver < 8.1)
                            	{
                            		$target_device = "sloane";
                            		echo "Target Devices are = $target_device <br>";
                            	}
                        	else 
                            	{
                            		$target_device = "cloudbook";
                            	}
                          	
                        }
						//start of 3rd else if condition for x86 cpu architecture
						else if($arch=="x86" || $arch=="x86_64")
                        {
                        	$target_device = "cloudbook";
                        }						
						break;							

}
//end of matching calcution

#below is the code for splitting url into app id
   if (stripos($url, 'http://') === 0 || stripos($url, 'https://') === 0 || stripos($url, 'www.') === 0)# if statement runs when there is complete url with https://
   {
      $split_arr =parse_url($url);
      $split_ampr = explode("&",$split_arr['query']);#split with &
      $split_id = explode("=",$split_ampr[0]);# split with id 
      #echo $split_id[1];
      $appId = $split_id[1];
   	 
   	  // echo 'i am in if stripos condition'; echo "<br>";
   	  // echo "$target_device <br>";
   	  $output = shell_exec("python3 /home/apkfuel/public_html/apk-downloader/gsfid_token/play_api_appId.py $appId $target_device");
   	  // echo 'Python3 play_api_appId.py executed with these outputs to console: <br';
   	  // echo $output;
   	  $mode = 'appId';
    }
        
    elseif (strpos($url, ".") !== false)
    {    
      	#initialize $url value to $appId if there is no url i.e only appId is given by user 
    	$appId = $url;
    	// echo "$target_device <br>";
    	$output = shell_exec("python3 /home/apkfuel/public_html/apk-downloader/gsfid_token/play_api_appId.py $appId $target_device");
    	// echo 'Python3 play_api_appId.py executed with these outputs to console: <br';
    	// echo $output;
    	// echo 'play_api_appId worked....  ';
    	$mode = 'appId';
     }
	else {
    	$appId = $url;
    	// echo "$target_device <br>";
		$output = shell_exec("python3 /home/apkfuel/public_html/apk-downloader/gsfid_token/play_api_search.py $appId");
		// echo 'Python3 play_api_appId.py executed with these outputs to console: <br';
		// echo $output;
		// echo 'play_api_search worked....  ';
		$mode = 'search';
    }

?>

<?php

switch($mode)
{
                  case 'appId':
                   						#case logic here
								
									    // echo 'i am in appId case statement....';
										$get_json = file_get_contents("user_content/apk_json/$appId.json");
                                        $json_obj = json_decode($get_json, true);?>

										<img style="margin-bottom: 5px !important;" src= "<?php echo $json_obj['icon'] ?>" alt="icon" width="110"/></br>
                                        <strong>Package Name:</strong> <?php echo $json_obj['appId'] ?></br>
                                        <strong>Play Store Link: </strong> <a href="<?php echo $json_obj['url'] ?>" target="_blank">[Play Store]</a></br>
                                        <strong>App Rating:</strong> <?php echo round($json_obj['score'], 1); ?></br>
                                        <strong>App Size: </strong>    <?php echo $json_obj['size']  ?></br>
                                        <strong>Current Version:</strong> <?php echo $json_obj['version'] ?></br>
                                        <strong>Android: </strong><?php echo $json_obj['androidVersionText'] ?> </br>
                                        <strong>Updated: </strong><?php echo $updated = date("M d, Y", substr($json_obj['updated'], 0, 10));  ?> [latest] </br>

                                        <?php 
                                        if($json_obj['price']!=0)
                                        {?>
                                            <strong>This is a paid app: </strong> <?php echo "App Price is = "; echo $json_obj['price'];echo'$.'; echo " You can't download it.";?></br>
                                            <div class="w-button-green-out" style=" margin-top: 6px !important;">
                                            <a style="color: white !important;" href="https://apkfuel.com/apk-downloader/">Try Free App</a></div></br>
                                        <?php	
                                        }
										
										else{
										
                                        	$app_ver = $json_obj['version'];
                                        	$app_ver = str_replace(' ', '', $app_ver);
                                        	$output = shell_exec("python3 /home/apkfuel/public_html/apk-downloader/gsfid_token/upload_to_digitalOcean.py $appId $app_ver $target_device");// cloud server has different app name
                                        	$file_pointer = "/home/apkfuel/public_html/apk-downloader/gsfid_token/user_content/apk_data/".$appId.".apk";//app name is appId.apk on local server
   
												// Use unlink() function to delete a file 
											if (!unlink($file_pointer)) {
    											echo ("<div style='background-color: #FFFD8E !important; padding: 2px !important; font: 19px !important; '> We aren't able to download your app! May be the selected Architecture does not support this App, Plz Change Architecture </div><br>");                                               																															 		                                              
												} 
											#end of case logic
											else
                                        	{
                                            	echo "<div class='w-button' style='margin-top: 6px !important;'>
											<a style='color: white !important;' href='https://play.xyyoutube.com/apks/".$appId."_CodeName=".$target_device."_App_Version=$app_ver.apk'>Download APK Now</a></br>
 											<!--a style='color: white !important;' href='https://apkfuel.com/apk-downloader/gsfid_token/user_content/apk_data/$appId.apk'>Download Local Server</a></div></br-->";
                                       
                                        	}
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        	// $apk_name = "https://apkfuel.com/apk-downloader/gsfid_token/user_content/apk_data/$appId.apk";                                       	
                                        	// echo "$apk_name</br>";                                             	
// 											if(is_file(''.$apk_name.'')){
                                        	
//     										echo "<div class='w-button' style='margin-top: 6px !important;'>
// 											<!--<a style='color: white !important;' href='https://play.xyyoutube.com/apks/$appId.apk'>Download APK Now</a></br> -->
// 											<a style='color: white !important;' href='https://apkfuel.com/apk-downloader/gsfid_token/user_content/apk_data/$appId.apk'>Download Local Server</a></div></br>";
                                       
//                                         	} 
// 											#end of case logic
// 											else
//                                         	{	
//                                         		//echo 'Post published <br>';
//                                         		echo ("<div style='background-color: #FFFD8E !important; padding: 2px !important; font: 19px !important; '> We aren't able to download your app! May be the selected Architecture does not support this App, Plz Change Architecture </div><br>");                                               																					
// 										 		//include 'publish_playstore_post.php';
//                                         	}                                           								
                                         } 
										#add wp-post code
										//echo 'https://apkfuel.com/apk-downloader/user_content/apk_data/'.$appId.'.apk';
										//echo 'Post link is: '; echo 'https://apkfuel.com/'.$json_obj[''].'/'.$appId.''
										
										
										//$output = shell_exec('python3 /home/apkfuel/public_html/apk-downloader/upload_to_s3.py "'.$appId.'"');upload_to_digitalOcean.py
										// $output = shell_exec('python3 /home/apkfuel/public_html/apk-downloader/upload_to_digitalOcean.py "'.$appId.'"');

//s3cmd put file.txt s3://spacename/path/
/*										
										include('Net/SSH2.php');

										$ssh = new Net_SSH2('50.21.190.130');
										$ssh->login('root', 'znH*6nV35@');

										$ssh->read('[prompt]');
										$ssh->write("sudo ls \n");
										$ssh->read('Password:');
										$ssh->write("Password\n");
										echo $ssh->read('[prompt]');*/

										//$output = shell_exec('s3cmd put /home/apkfuel/public_html/apk-downloader/user_content/apk_data/'.$appId.'.apk s3://play.xyyoutube.com/apks/');//upload to sfo3
										//echo 's3cmd put /home/apkfuel/public_html/apk-downloader/user_content/apk_data/'.$appId.'.apk s3://play.xyyoutube.com/apks/'; echo '<br>';
										//$output = shell_exec('s3cmd setacl s3://play.xyyoutube.com/apks/'.$appId.'.apk --acl-public');//make it public
										//echo 's3cmd setacl s3://play.xyyoutube.com/apks/'.$appId.'.apk --acl-public';echo '<br>';
										//echo exec("whoami");echo '<br>';
										//echo 'Amazon S3 Debugging :';echo $output;
										//include 'publish_playstore_post.php';
										//delete a file from local server
// 										$file_pointer = "/home/apkfuel/public_html/apk-downloader/user_content/apk_data/".$appId.".apk";
   
// 										// Use unlink() function to delete a file 
// 										if (!unlink($file_pointer)) {
//     										echo ("We aren't able to download your app! May be the selected device does not support this app or its a paid app or your region is not supported!<br>");                                               
// 											} 
// 											#end of case logic
// 										else
//                                         {	
//                                         	//echo 'Post published <br>';
//                                         	include 'publish_playstore_post.php';
//                                         }
										
										

                    break;

                    case 'search':
                    #logic          	
                                        $handle = fopen( "user_content/apk_search/", "r");
                                    
                                        if ($handle) {
                                            while (($line = fgets($handle)) !== false) {
                                                $line = trim($line);
                                                
                                                $get_json = file_get_contents("user_content/apk_json/$line.json");
                                                $json_obj = json_decode($get_json, true);
                                            	echo "$line <br>";
                                        ?>

                                        <img style="margin-bottom: 5px !important;" src= "<?php echo $json_obj['icon'] ?>" alt="icon" width="110"/></br>
                                        <strong>Package Name:</strong> <?php echo $json_obj['appId'] ?></br>
                                        <strong>Play Store Link: </strong> <a href="<?php echo $json_obj['url'] ?>" target="_blank">[Play Store]</a></br>
                                        <strong>App Rating:</strong> <?php echo round($json_obj['score'], 1); ?></br>
                                        <strong>App Size: </strong>    <?php echo $json_obj['size']  ?></br>
                                        <strong>Current Version:</strong> <?php echo $json_obj['version'] ?></br>
                                        <strong>Android: </strong><?php echo $json_obj['androidVersionText'] ?> </br>
                                        <strong>Updated: </strong><?php echo date("M d, Y", substr($json_obj['updated'], 0, 10));  ?> [latest] </br>

                                        <?php 
                                        if($json_obj['price']!=0)
                                        {?>
                                            <strong>This is a paid app: </strong> <?php echo "App Price is = "; echo $json_obj['price'];echo'$.'; echo " You can't download it.";?></br>
                                            <div class="w-button-green-out" style=" margin-top: 6px !important;">
                                            <a style="color: white !important;" href="https://apkfuel.com/apk-downloader/">Try Free App</a></div></br></br>
                                        <?php	
                                        }else{?>
                                        <div class="w-button-green-out" style=" margin-top: 6px !important;">
                                        <a style="color: white !important;" href="https://apkfuel.com/apk-downloader/play_api_download_single.php?id=<?php echo $line;?>">Download APK Now</a></div></hr></br></br>
                                        <?php } //include 'publish_playstore_post.php';
                                            }#end of while loop
                                        fclose($handle); 
                                        } else {
                                            echo 'error opening file';
                                        } 
										

                                        #end of logic
                    break;

                    default:
                    echo 'something wrong';
}




#$get_json = file_get_contents("user_content/apk_json/$appId.json");
#$json_obj = json_decode($get_json, true);
 ?>

