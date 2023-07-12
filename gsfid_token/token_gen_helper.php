<?php
$count = 0;
$all_devices = array("alien_jolla_bionic","angler","aries","bacon","bbb100","BRAVIA_ATV2","bravo","bullhead","crackling","cwv88s","eeepad","foster","fp2","fresh","fs454","gemini","gtp7510","gts3llte","hammerhead","hero2lte","honami","JP-1601","K013_1","kenzo","m201","m3xx","maguro","mako","manta","nxtl09","oneplus3","pico","sailfish","shamu","sloane","t00q","Tab_8_4C","walleye","wetekplay2");
foreach ($all_devices as $target_device) {
	
	$output = shell_exec("python3 /home/apkfuel/public_html/apk-downloader/gsfid_token/token_gen.py $target_device");
	
	echo "##############################################";echo "<br>";
	
	echo $count;echo"<br>";
	echo $output;echo "<br>";	
	echo date('h:i:s').'<br>'; //hour:minute:second
	sleep(4.5);//10 seconds
	echo date('h:i:s');echo '<br>';echo "<br>";
	
	$count = $count + 1;

	$myfile = fopen("output.txt", "a") or die("Unable to open file!");
	fwrite($myfile, $output);
	fwrite($myfile, "\n");
	fclose($myfile);
}

?>