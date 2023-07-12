<?php
$appId=$_GET['id'];
shell_exec('python3 /home/apkfuel/public_html/apk-downloader/play_api_download_single.py "'.$appId.'"');

header('Location: /apk-downloader/user_content/apk_data/'.$appId.'.apk');
exit();
?>
