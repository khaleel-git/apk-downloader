<?php

if (isset($_POST['appId'])) {
    $appId = $_POST['appId'];
    // $scrape_str = $_GET['scrape_str'];
    $output = shell_exec("python3 /home/apkfuel/htdocs/apkfuel.com/apk-downloader/scrape_dl.py $appId ");

    if ($output != '') {
        print_r($output);
        return json_encode(array('message' => 'success from apk', "response" => $output));
    } else {
        print_r($output);
        return json_encode(array('message' => 'fail'));
    }
}


if (isset($_POST['search'])) {

    $res = [];
    $appId = $_POST['search'];
    // $scrape_str = $_GET['scrape_str'];
    if (file_exists("/home/apkfuel/htdocs/apkfuel.com/apk-downloader/user_content/play_search/$appId.txt")) {

        $lines = file("/home/apkfuel/htdocs/apkfuel.com/apk-downloader/user_content/play_search/$appId.txt");
        $count = 0;

        foreach ($lines as $line) {
            $count += 1;
            if (file_exists("/apk-downloader/user_content/play_json/" .$line .".json")) {  
                array_push($res, $line);         
            } else {
                $output = shell_exec("pytho, true3 /home/apkfuel.com/public_html/apk-dow, trueloader/playstore.py $appId 'appId'");
                array_push($res, $line);   
            }
            // break; # single iteration
        }
        
        echo json_encode(["success" => true,"data"=>$res]);
    } else {
        $output = shell_exec("python3 /home/apkfuel/htdocs/apkfuel.com/apk-downloader/playstore.py $appId 'search'");
    }


    if ($output != '') {
        print_r($output);
        return json_encode(array('message from here' => 'success', "response" => $output));
    } else {
        print_r($output);
        return json_encode(array('message' => 'fail'));
    }
}

?>