<?php
$appId=$_POST['package'];
$device=$_POST['device'];
echo $appId;echo '<br>';
echo $device;echo '<br><br><br>';


$appIdsArray = array("com.netflix.mediaclient", "com.google.android.apps.tachyon", "com.fingersoft.hillclimb", "org.telegram.plus", 
                     "org.aka.messenger", "com.linearstudioapps.senibudayakelas9kurikulum2013", "com.TextVoice.TextVoiceG",
                    "com.UCMobile.intl","air.com.EXswap.Mindomo","com.chatium.app","com.usertesting.recorder.krsna","com.valar.pintu","com.cisco.webex.meetings");
 
// Printing array size
echo "apps found = " . count($appIdsArray) . "<br>";

for($i=0;$i<count($appIdsArray);$i++){
echo "################################# loop = $i ##########################<br><br>";
$appId = $appIdsArray[$i];
 
$output = shell_exec("python3 /home/apkfuel/public_html/apk-downloader/arch_testing/dl_obb.py $appId $device");
// echo "/home/apkfuel/public_html/apk-downloader/arch_test/$appId/dl-obb.py";echo '<br>';
// echo "/home/apkfuel/public_html/apk-downloader/arch_test/$device/dl-obb.py";
echo $output;

echo "<br>download link is: <br> https://apkfuel.com/apk-downloader/arch_testing/$appId" . "_$device.zip";

$filename = "/home/apkfuel/public_html/apk-downloader/arch_testing/$appId" . "_$device.apk";



echo "<br>the apk size is: " . round(filesize($filename)/(1024*1024),2) . " MB <br>";

echo "-> Renaiming the $appId";


 // header("Location: /apk-downloader/$device/'.$appId.'.apk");
$old_apk_name = "/home/apkfuel/public_html/apk-downloader/arch_testing/$appId" . "_$device.apk";
$new_apk_name = "/home/apkfuel/public_html/apk-downloader/arch_testing/$appId" . "_$device.zip";
$unzip_apk_folder = "/home/apkfuel/public_html/apk-downloader/arch_testing/apk_reverse/$appId" . "_$device";
$apk_lib_folder = "/home/apkfuel/public_html/apk-downloader/arch_testing/apk_reverse/$appId" . "_$device/lib/";

$oldname = "$appId" . "_$device.apk";
$newname = "$appId" . "_$device.zip";

if (rename($oldname, $newname)) {
	$message = sprintf(
		'<br>The file %s was renamed to %s successfully!',
		$oldname,
		$newname
	);
} else {
	$message = sprintf(
		'<br>There was an error renaming file %s',
		$oldname
	);
}

echo $message;

// exit();
$zip = new ZipArchive;
$res = $zip->open($new_apk_name);
if ($res === TRUE) {
  $zip->extractTo($unzip_apk_folder);
  $zip->close();
  unlink($new_apk_name);#delete zip file
  echo '<br>woot! Unzip Successfully <br>';
    
  if ($handle = opendir($apk_lib_folder)) {
    while (false !== ($entry = readdir($handle))) {
        if ($entry != "." && $entry != "..") 
         {
            echo "$entry\n";
         }
    }#end of while loop

    closedir($handle);
  }#end of if condition inner
} 


else {
  echo "<br>doh! Can't Unzip";
}

}
?>