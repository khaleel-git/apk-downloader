<?php
$appId=$_POST['package'];
$device=$_POST['device'];
echo $appId;echo '<br>';
echo $device;echo '<br>';
 echo 'Now printing shell exec output<br>';
 $output = shell_exec ( "python3 /home/apkfuel/public_html/apk-downloader/gsfid_token/dl_obb.py $appId $device" );

// $output = shell_exec("python3 /home/apkfuel/public_html/apk-downloader/gsfid_token/dl_obb.py ".$appId."".$device."");
// echo "/home/apkfuel/public_html/apk-downloader/arch_test/$appId/dl-obb.py";echo '<br>';
// echo "/home/apkfuel/public_html/apk-downloader/arch_test/$device/dl-obb.py";
echo $output;


 // header("Location: /apk-downloader/$device/'.$appId.'.apk");
// exit();
?>
