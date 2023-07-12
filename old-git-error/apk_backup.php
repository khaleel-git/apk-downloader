<?php

define( 'WP_USE_THEMES', true );
require( $_SERVER['DOCUMENT_ROOT'] .'/wp-load.php' );	
require_once(ABSPATH . 'wp-admin/includes/image.php');

session_start();

$mode = "";

$appId=$_GET['id'];
$file_pointer = "https://apkfuel.com/apk-downloader/user_content/apk_data/$appId.apk";
$file_pointer_json = "https://apkfuel.com/apk-downloader/user_content/apk_json/$appId.json";

if (does_url_exists($file_pointer_json)){
		$get_json = file_get_contents("https://apkfuel.com/apk-downloader/user_content/apk_json/$appId.json");
		$json_obj = json_decode($get_json, true);
		// include 'publish.php';
		$mode     = "json";
}
elseif(!isset($post_id) && $mode==""){
	header("Location: https://apkfuel.com");
	die();
}
else {
	$post_id = $_SESSION['post_id'];
	if(isset($post_id)){
    	$mode = "post";
    }
}


?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>	
<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="theme-color" content="#fff">
	<title>Download 
    <?php 
    if($mode == "post"){echo get_the_title($post_id);}
    else{ if(isset($json_obj['title'])){echo $json_obj['title'];}else {echo "Android App";}}
     ?> 
    | APK for Android 2022</title>
		 		
	<link rel="shortcut icon" href="https://apkfuel.com/wp-content/uploads/2019/06/apkfuel-favicon-logo.png">
	<link rel="icon" type="image/png" href="https://apkfuel.com/wp-content/uploads/2019/06/apkfuel-favicon-logo.png" sizes="128x128" />

<style>
*{margin:0;padding:0}body,html{overflow-x:hidden}a{color:#055fa7;text-decoration:none}li,ol,ul{list-style:none}html{font-size:63.5%}body{font-family:-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen,Ubuntu,Cantarell,"Fira Sans","Droid Sans","Helvetica Neue",sans-serif;font-size:1.4rem;background:#f5f5f5;color:#202124;font-size-adjust:none;-webkit-text-size-adjust:none;-moz-text-size-adjust:none;-ms-text-size-adjust:none;-webkit-font-smoothing:antialiased;text-size-adjust:100%}img{vertical-align:middle;border:0}input{outline:0;border-radius:0;box-shadow:0 0;border:none}.cl{clear:both;font-size:0;height:0;line-height:0;overflow:hidden}.inav{position:absolute}.so{height:34px;line-height:35px;margin-top:4px;width:100%;display:-webkit-box;display:-moz-box;display:box;-webkit-box-orient:horizontal;-moz-box-orient:horizontal;box-orient:horizontal}.so .bb{width:40px}.so .bb a{display:block;width:35px;height:35px;text-align:center}.so .ll{background:#fff;-webkit-box-flex:1;-moz-box-flex:1;border:1px solid #99999959;padding-left:5px;margin-left:5px}.so .rr{width:35px;cursor:pointer;background-size:35px 35px!important;border-radius:4px}.so .rr input{width:50px;background:rgba(255,0,0,0)}.so .query{display:block;box-sizing:border-box;padding-left:5px;background:rgba(255,0,0,0);height:35px;width:100%;font-size:14px}.menu-group{padding-top:10px}.menu-border{border-bottom:solid 1px #e0e0e0;padding-bottom:10px}.header_top{background:#fff;width:100%;height:65px;-moz-transition:top .3s ease-in-out;-ms-transition:top .3s ease-in-out;-o-transition:top .3s ease-in-out;transition:top .3s ease-in-out;z-index:999;box-shadow:0 2px 6px 0 rgba(0,0,0,.12),inset 0 -1px 0 0 #dadce0;position:absolute;border-bottom:2px solid #f15a24;padding-bottom:5px}.nav_a{position:fixed;top:0;width:100%;height:45px;line-height:45px;z-index:999}.inav{position:absolute}.nav_a .c{-webkit-box-flex:1;-moz-box-flex:1;box-flex:1}.nav_a .c a{display:block;width:175px;margin:0 auto;text-align:center}.nav_a .c a.logo img{margin-top:-4px;height:100%;width:100%}input{outline:0;border-radius:0;box-shadow:0 0;border:none}.m-drawer{background:#fafafa none repeat scroll 0 0;box-sizing:border-box;color:#424242;display:flex;flex-flow:column nowrap;height:100%;left:0;max-height:100%;overflow-x:visible;overflow-y:auto;position:relative;top:55px;transform:translateX(-250px);transform-style:preserve-3d;transition-duration:.2s;transition-property:transform,-webkit-transform;transition-timing-function:cubic-bezier(.4,0,.2,1);width:240px;will-change:transform;z-index:998;border:medium none;display:none}.m-drawer.is-visible{-webkit-transform:translateX(0);transform:translateX(0);position:relative;display:block}.m-obfuscator{background-color:transparent;height:100%;left:0;position:absolute;top:42px;transition-duration:.2s;transition-property:background-color;transition-timing-function:cubic-bezier(.4,0,.2,1);visibility:hidden;width:100%;z-index:997;background-color:rgba(0,0,0,.5);opacity:0;pointer-events:none;transition-property:opacity;visibility:visible}.m-obfuscator.is-visible{background-color:rgba(0,0,0,.5);visibility:visible;opacity:.8;pointer-events:auto;position:fixed;background-color:#000;right:0;left:0}.so .rr{background:url(https://lh3.androidcontents.com/images/search-min.png) no-repeat center center}.tg{box-sizing:border-box;padding-left:1px;padding-right:1px;font-size:14px;position:absolute;right:77px;top:4px}.tg select{height:30px;border:0;background-color:#f5f5f5}.site-footer>*{margin:0 auto;box-sizing:border-box}.site-footer .currency-social{padding-top:15px;text-align:center;padding-bottom:10px}.site-footer .legal{font-size:13px;line-height:120%;padding-bottom:30px;padding-left:10px}.f-list-bottom a{display:inline-block;color:#202124;padding:8px 0;margin:0 0 0 40px;text-decoration:none}.footer-sites-logo{max-width:120px;display:inline-block;height:auto;vertical-align:middle}.l-footer__social{list-style:none;padding:0}.l-footer__social li{display:inline-block;margin:0 10px}.l-footer__social a{color:#6f7476;fill:#757575;-webkit-transition:color .2s ease-in-out;transition:color .2s ease-in-out}footer{border-top:1px solid #ddd;margin-bottom:10px}footer .bullet{padding:0 5px}footer .legal{background-color:#fff;color:#202124;font-size:12px;padding:15px 0}#Footer-component{clear:both}.searchbu{background:url(https://lh3.androidcontents.com/images/search-min.png) no-repeat center center}.searchbu{padding-top:65px;width:35px;margin:0 5px;padding-left:5px;cursor:pointer;background-size:33px 33px!important;border-radius:4px}.other-list{border-top:1px solid #ddd}.f-list-bottom li{display:inline-block}@media screen and (max-width:600px){.f-list-bottom li,.other-list-bottom li{display:block;padding:5px}.f-list-bottom a,.other-list-bottom a{margin:0}}@media screen and (max-width:840px){.f-list-bottom a{margin:0 40px 0 0}}.apksupport{padding:10px;font-size:13px;text-align:center;color:#666}.menu-body{padding-top:15px position: !important relative}.btctm-top .hmbgr-wrap{position:absolute!important;top:16px!important;display:inline-block!important;vertical-align:top!important;cursor:pointer!important;width:4.4em!important}.btctm-top .hmbgr-wrap:before{content:'';color:#333;padding-right:.25em;display:inline-block;transition:color .2s!important}.btctm-top .hmbgr-wrap .hmbgr,.btctm-top .hmbgr-wrap .hmbgr:after,.btctm-top .hmbgr-wrap .hmbgr:before{display:inline-block!important;width:20px!important;height:2px!important;background-color:#333!important;border-radius:1.5px!important;line-height:0!important;position:absolute!important;cursor:pointer!important;transition:transform .5s,background-color .2s!important}.btctm-top .hmbgr-wrap .hmbgr{vertical-align:middle!important;top:16px!important;margin-top:-1px!important}.btctm-top .hmbgr-wrap .hmbgr:after,.btctm-top .hmbgr-wrap .hmbgr:before{content:''}.btctm-top .hmbgr-wrap .hmbgr:before{top:-6px}.btctm-top .hmbgr-wrap .hmbgr:after{top:6px}.btctm-top .hmbgr-wrap:hover:before{color:#333!important}.btctm-top .hmbgr-wrap:hover .hmbgr,.btctm-top .hmbgr-wrap:hover .hmbgr:after,.btctm-top .hmbgr-wrap:hover .hmbgr:before{background-color:#333!important}.action-bar-menu-button{cursor:pointer;display:inline-block;height:46px;position:absolute;top:1;width:46px}p .action-bar-menu-button{left:4px}.action-bar-menu-button{cursor:pointer;display:inline-block;height:46px;position:absolute;top:-2px;width:46px;left:2px}.action-bar-menu-button{color:#fff;margin-top:5px;margin-left:8px}.btctm-top.open .hmbgr-wrap .hmbgr{background-color:#fff!important}.btctm-top.open .hmbgr-wrap .hmbgr:after,.btctm-top.open .hmbgr-wrap .hmbgr:before{background-color:#333!important}.btctm-top.open .hmbgr-wrap .hmbgr:before{transform:translateY(6px) rotate(135deg)!important}.btctm-top.open .hmbgr-wrap .hmbgr:after{transform:translateY(-6px) rotate(-135deg)!important}.btctm-top{width:45px}.menu-group li{padding:15px 0 5px 20px;position:relative;top:-3px;cursor:pointer}.menu-group li a,.menu-group li a:visited{color:rgba(0,0,0,.87);overflow:hidden;white-space:nowrap;text-overflow:ellipsis;display:block}.footer-locales{-moz-appearance:none;-webkit-appearance:none;appearance:none;background:#eee url(https://lh3.androidcontents.com/images/icon-dropdown.png) right 50% no-repeat;background-size:10px 5px;border:none;border-radius:0;color:inherit;padding-right:15px;min-width:120px}.footer-locale-switcher{display:inline-block;display:inline-block;background-color:#eee;margin:0 0 0 40px;padding:5px;border-radius:5px}@media screen and (max-width:840px){.footer-locale-switcher{margin:0 40px 0 0}}@media screen and (max-width:600px){.footer-locale-switcher{margin:0}}.grecaptcha-badge{display:none!important}.main{padding-top:42px;max-width:990px;margin:0 auto}.share-wrap{height:32px;text-align:center;white-space:nowrap;text-overflow:ellipsis;margin-bottom:18px}.apklive,.genrate_b,.obblive,.ziplive{border-radius:3px;display:inline-block;color:#fff;font-size:13px;padding:5px;text-decoration:none;box-shadow:0 2px 5px 0 rgba(0,0,0,.26);line-height:20px}.apklive{background-color:#03897c;border:1px solid #03897c}.obblive{background-color:#9e9e9e;border:1px solid #9e9e9e}.ziplive{background-color:#01324f}a_de{font-size:16px;font-weight:700}.downloader_area{padding:10px;clear:both;margin-bottom:10px;border-radius:5px;border:1px #9e9e9e solid}.dd_info{text-align:left}.linkapkshow{clear:both;padding-top:20px;text-align:left}.linkapkshow li{display:inline-block;padding-bottom:10px;margin-right:10px}.dd_info img{float:left;border-radius:10px;margin-right:10px}.dd_info li{line-height:22px}.static_s p{font-size:16px;line-height:1.7em;overscroll-behavior:none}.static_s_h3{font-size:24px;line-height:1.3em;margin-top:1.5em;margin-bottom:.3em}.hr_s{box-sizing:content-box;height:0;overflow:visible;display:block;unicode-bidi:isolate;margin-block-start:.5em;margin-block-end:.5em;margin-inline-start:auto;margin-inline-end:auto;overflow:hidden;border-style:inset;border-width:1px}.apksupport_w{padding:10px 20px;margin-top:15px;margin-bottom:25px}.download-box{overflow:hidden}.download-box .down-wrap{padding:20px 20px 0 20px;overflow:hidden}.download-box .down-wrap h1{overflow:visible;margin:0 auto 11px;letter-spacing:-.5px;font-weight:400;font-size:32px;line-height:40px;text-align:center}.down-wrap p{text-align:center;line-height:22px;overflow:hidden;margin:0 auto 10px;max-width:668px}.download-box .down-form{margin-top:10px;background:#fff;height:40px;line-height:40px;border:1px solid #437ea6;-webkit-border-radius:5px;border-radius:5px;width:100%;display:-webkit-box;display:-moz-box;display:box;-webkit-box-orient:horizontal;-moz-box-orient:horizontal;box-orient:horizontal}.download-box .down-form .text-box1{display:block;-webkit-box-flex:1;-moz-box-flex:1;box-flex:1}#region-package{display:block;box-sizing:border-box;padding-left:5px;background:rgba(255,0,0,0);height:40px;width:100%;font-size:14px}@-webkit-keyframes indeterminate{0%{left:-35%;right:100%}60%{left:100%;right:-90%}100%{left:100%;right:-90%}}@keyframes indeterminate{0%{left:-35%;right:100%}60%{left:100%;right:-90%}100%{left:100%;right:-90%}}web-progress-bar .web-progress-bar-wrapper{position:relative;height:4px;display:block;width:100%;background-color:#01324f29;border-radius:2px;overflow:hidden;contain:strict}web-progress-bar .web-progress-bar-indeterminate{background-color:#01324f}web-progress-bar .web-progress-bar-indeterminate::before{content:"";position:absolute;background-color:inherit;top:0;left:3px;bottom:0;will-change:left,right;-webkit-animation:indeterminate 2.1s cubic-bezier(.65,.815,.735,.395) infinite;animation:indeterminate 2.1s cubic-bezier(.65,.815,.735,.395) infinite}web-progress-bar .web-progress-bar-indeterminate::after{content:"";position:absolute;background-color:inherit;top:0;left:0;bottom:0;will-change:left,right;-webkit-animation:indeterminate-short 2.1s cubic-bezier(.165,.84,.44,1) infinite;animation:indeterminate-short 2.1s cubic-bezier(.165,.84,.44,1) infinite;-webkit-animation-delay:1.15s;animation-delay:1.15s}.video-container{max-width:460px;margin:0 auto}.video-container embed,.video-container iframe,.video-container object{width:100%}.apk_op{padding:10px;border:1px #01324f solid;margin:5px 5px 5px 5px}.apk_op li{padding-right:5px;margin-bottom:10px;display:inline-block}.w-button {align-items: center;background: transparent;border: 0;border-radius: 4px;box-shadow: none;background-color: #F15A24;color: white;cursor: pointer;display: inline-flex;font-size: 1.0em;font-weight: 500;justify-content: center;letter-spacing: 1px;outline: 0;overflow: hidden;padding: 8px 8px;position: relative;text-decoration: none;transition: background-color .2s, box-shadow .2s;-moz-osx-font-smoothing: grayscale;-webkit-font-smoothing: antialiased;text-rendering: optimizeLegibility;box-shadow: 0 2px 4px -1px rgba(0, 0, 0, .2), 0 4px 5px 0 rgba(0, 0, 0, .14), 0 1px 10px 0 rgba(0, 0, 0, .12);outline: none;text-decoration: none;}.w-button:hover{box-shadow:0 4px 8px -2px rgba(0,0,0,.2),0 8px 10px 0 rgba(0,0,0,.14),0 2px 20px 0 rgba(0,0,0,.12);outline:0;text-decoration:none}.w-button-disable{cursor:not-allowed;pointer-events:none;color:#9e9e9e;background-color:#e6e6e6}.shadetabs{padding:3px 0;margin-left:0;margin-top:1px;margin-bottom:0;list-style-type:none;text-align:left}.shadetabs li{display:inline;margin:0}.shadetabs li a.selected{background-color:#f15a24!important;color:#fff}.shadetabs li a{text-decoration:none;position:relative;z-index:1;padding:3px 7px;margin-right:3px;border:1px solid #000;position:relative;top:4px;color:#000}.apk_op input{border:1px solid #000;margin-top:5px;padding:3px 9px}.apk_op select{margin-top:5px;padding:3px 9px}.android_se select{margin-top:5px;padding:3px 9px}.ad-box{width:100%;overflow:hidden;text-align:center;padding-bottom:12px;padding-top:12px;background-color:#f5f5f5}.advertisement{position:relative;padding:2px 5px 0;color:#696969;font-weight:300;font-size:12px;top:0;right:0;text-align:center;z-index:1}.sugder a,.sugder a:visited{padding:5px;color:#055fa7;text-decoration:underline}.browser{position:relative;display:block;padding:0;margin:0;width:100%;border:1px solid #9e9e9e5e;background-color:#fff;font-weight:500;margin-top:15px}.dvContents{padding:0;margin:0;width:100%;overflow:auto}.ft_folder{padding:5px 0 5px 45px;margin:0;line-height:20px;background-position:3px 50%;background-repeat:no-repeat;background-image:url(https://lh3.androidcontents.com/images/folder.svg);height:20px;color:#333}.dvContents li{display:block;border-top:1px dashed #33333338;vertical-align:middle;white-space:nowrap;cursor:pointer}.dvContents li:hover{background-color:#33333312}.dvContents li a{margin-left:10px;overflow:hidden;display:block;padding:10px;color:#00875f}.dersize{float:right;color:#666}.site-footer .collapsable-lists a{color:#555;display:block;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;word-break:break-all}.footer-columns li{font-size:13px;background-color:#e6e6e66e;padding:5px;border-radius:5px;margin:5px;display:inline-block;text-align:center;border:1px solid #9e9e9e36}#zip_area a,#zip_area a:visited{font-weight:700;color:#222}.zipping{font-size:13px;padding:5px}.zipping:after{content:' .';animation:dots 1s steps(5,end) infinite}@keyframes dots{0%,20%{color:transparent;text-shadow:.25em 0 0 transparent,.5em 0 0 transparent}40%{color:#000;text-shadow:.25em 0 0 transparent,.5em 0 0 transparent}60%{text-shadow:.25em 0 0 #000,.5em 0 0 transparent}100%,80%{text-shadow:.25em 0 0 #000,.5em 0 0 #000}}.zip_b{float:right;padding-top:5px;padding-bottom:15px}.zip_b li{display:inline}.zip_b select{height:32px;padding:3px 9px}.zip_b li:first-of-type{padding-right:10px}.helpapk{clear:both;padding-top:15px}.helpapk ol{list-style-type:decimal;list-style:decimal;padding-left:20px;padding-top:10px}.helpapk li{list-style-type:decimal;list-style:decimal;margin-bottom:8px;word-break:break-word}.autocomplete-suggestions{text-align:left;cursor:default;border:1px solid #aaa;border-top:#d6d6d6;background:#fff;position:absolute;display:none;z-index:9999;max-height:254px;overflow:hidden;overflow-y:auto}.autocomplete-suggestion{position:relative;padding:.75rem;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;cursor:pointer}.autocomplete-suggestion b{font-weight:700}.autocomplete-suggestion.selected{background:#f0f0f0}.popular-list{margin:0;padding:0}.popular-list li{display:inline-block;padding-left:1%;width:30%}.popular-list li a{display:block;text-decoration:underline;padding:8px 0 4px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;word-break:break-all}.popular-list li a img{margin-right:10px;vertical-align:middle;width:32px;height:32px;display:inline-block}@media screen and (max-width:768px){.topic-wrap li{width:33.33333%}.popular-list li{width:100%}.w-button-c{width:50%}}.popular-downloader{margin:10px;padding:10px}.YL4uqd{color:#333;font-weight:100;margin:0 0 10px 0;padding-bottom:10px}.as_hotapps .list{width:45%;float:left;position:relative;min-height:60px;padding:8px;-moz-border-radius:4px;-webkit-border-radius:4px;border-radius:4px}.as_hotapps a,.as_hotapps a:visited{text-decoration:none}.as_hotapps .list:hover{background:#f9f9f9;-webkit-box-shadow:0 1px 2px 0 rgba(0,0,0,.1);box-shadow:0 1px 2px 0 rgba(0,0,0,.1)}.as_hotapps .list:hover .icon{opacity:.9}.as_hotapps .list:hover .text .title{color:#3483ce}@media (min-width:720px){.as_hotapps .list{width:33.33%}}@media (min-width:1024px){.as_hotapps .list{width:25%}}.as_hotapps .list .icon{width:60px;height:60px;position:absolute;left:8px;top:8px}.as_hotapps .list .icon img{width:100%;height:100%;position:absolute;left:50%;top:50%;transform:translate(-50%,-50%);background:#f6f9fc;border:1px solid #f6f9fc;-moz-border-radius:20%;-webkit-border-radius:20%;border-radius:20%}.as_hotapps .list .icon img.loaded{background:#fff}.as_hotapps .list .text{margin-left:68px;min-height:60px}.as_hotapps .list .text .rating{padding-left:16px;color:#fa8b16;background-image:url(https://lh3.androidcontents.com/images/blackstar.svg);background-repeat:no-repeat;background-position:left 2px;background-size:13px}.as_hotapps .list .text .title{overflow:hidden;text-overflow:ellipsis;white-space:nowrap}.as_hotapps .list .text .other{overflow:hidden;text-overflow:ellipsis;white-space:nowrap;color:#888;font-weight:100}.static_s{padding:10px}.static_s h2{font-weight:500;font-size:20px}#seotopa{padding-top:10px;max-width:990px;margin:0 auto;overflow:hidden;padding:20px}#seotopa .item{float:left;width:39%;padding-right:30px}#seotopa .item .title{font-size:14px;padding:20px 0;font-weight:500}#seotopa .item ul{display:block;padding-left:20px;padding-bottom:20px}#seotopa .item ul li{list-style:disc;font-size:14px;color:#6f6f6f}#seotopa a{color:#222}#seotopa .item ul a{color:#222;font-size:12px;padding:0 5px;overflow:hidden;width:100%;height:35px;line-height:35px;display:block;white-space:nowrap;text-overflow:ellipsis;-webkit-box-sizing:border-box;box-sizing:border-box}#seotopa .item ul a:hover{text-decoration:underline}#seotopa .item ul a:hover{text-decoration:underline}#seotopa .item .title.discover{border-top:1px solid #484848}@media (min-width:601px){#seotopa .item{width:30%}}@media (min-width:993px){#seotopa .item{width:20%}}.howtoinstall{text-align:center;padding-bottom:10px}.howtoinstall a,.howtoinstall a:visited{text-decoration:underline}.apkinstall{position:relative;margin-bottom:10px;width:100%;height:65px;background:-webkit-linear-gradient(top,#fff 0,#f6f6f6 47%,#ededed 100%);background:linear-gradient(to bottom,#fff 0,#f6f6f6 47%,#ededed 100%);border-top:1px solid #e0e0e0;border-bottom:1px solid #e0e0e0}.apkinstall a{display:block;position:relative;height:65px;color:#555!important}.apkinstall .icon{position:absolute;top:10px;left:10px;width:45px;height:45px}.apkinstall .icon img{width:45px;height:45px}.apkinstall .text{padding:0 95px 0 65px}.apkinstall .tit{font-size:14px;line-height:16px;padding-top:14px;white-space:nowrap;text-overflow:ellipsis;overflow:hidden;text-shadow:0 1px 1px #fff}.apkinstall .des{font-size:12px;line-height:14px;padding-top:6px;white-space:nowrap;text-overflow:ellipsis;overflow:hidden;text-shadow:0 1px 1px #fff}.apkinstall .btn{position:absolute;width:80px;height:30px;top:17px;right:10px;font-size:14px;background:#3fc48f;line-height:30px;text-align:center;color:#fff;text-decoration:none;border-radius:5px;overflow:hidden}
@import url(https://fonts.googleapis.com/css?family=Montserrat);.accordion{width:90%;max-width:1000px;margin:auto;padding-top:0;padding-bottom:10px;padding-left:0;padding-right:10px}.accordion-item{padding:5px;background-color:#fff;color:#111;margin:1rem 0;border-radius:.5rem;box-shadow:0 2px 5px 0 rgba(0,0,0,.25)}.accordion-item-header{padding:.5rem 3rem .5rem 1rem;min-height:3.5rem;line-height:1.6rem;font-weight:700;display:flex;align-items:center;position:relative;cursor:pointer}.accordion-item-header::after{content:"\002B";font-size:2rem;position:absolute;right:1rem}.accordion-item-header.active::after{content:"\2212"}.accordion-item-body{max-height:0;overflow:hidden;transition:max-height .2s ease-out}.accordion-item-body-content{padding:1rem;line-height:1.6rem;border-top:1px solid;border-image:linear-gradient(to right,transparent,#34495e,transparent) 1}
.w-button-green-out {align-items: center;background: transparent;border: 0;border-radius: 5px;box-shadow: none;background-color: #F15A24;color: white;cursor: pointer;display: inline-flex;font-size: 1.0em;font-weight: 500;justify-content: center;letter-spacing: 1px;outline: 0;overflow: hidden;padding: 9px 9px;position: relative;text-decoration: none;transition: background-color .2s, box-shadow .2s;-moz-osx-font-smoothing: grayscale;-webkit-font-smoothing: antialiased;text-rendering: optimizeLegibility;box-shadow: 0 2px 4px -1px rgba(0, 0, 0, .2), 0 4px 5px 0 rgba(0, 0, 0, .14), 0 1px 10px 0 rgba(0, 0, 0, .12);outline: none;text-decoration: none;background:linear-gradient(to right,#F15A24 50%,#689f38 50%);background-size:200% 100%;background-position:left bottom;margin-left:10px;transition:all 2s ease }.w-button-green-out:hover {box-shadow: 0 4px 8px -2px rgba(0, 0, 0, .2), 0 8px 10px 0 rgba(0, 0, 0, .14), 0 2px 20px 0 rgba(0, 0, 0, .12);outline: none;text-decoration: none; background-position: right bottom;}.w-button-green-out-disable {cursor: not-allowed;pointer-events: none;color: #9E9E9E;background-color: #e6e6e6;}
</style>

	<link rel="stylesheet" href="https://apkfuel.com/post-app-downloading/assets/circle.css">
	<link rel="stylesheet" href="https://apkfuel.com/post-app-downloading/assets/yellowcircle.css">
	<link rel="stylesheet" href="https://apkfuel.com/post-app-downloading/assets/purplecircle.css">
	<link rel="stylesheet" href="https://apkfuel.com/post-app-downloading/assets/firecircle.css">
	<link rel="stylesheet" href="https://apkfuel.com/post-app-downloading/assets/whitecircle.css">
	<link rel="stylesheet" href="https://apkfuel.com/post-app-downloading/assets/simplecircle.css">

	<link rel="stylesheet" href="https://apkfuel.com/wp-content/themes/APKFuel/style.min.css">
    <link rel="stylesheet" href="https://apkfuel.com/wp-content/themes/APKFuel/assets/css/font-awesome.min.css">

<script src="http://code.jquery.com/jquery-3.2.1.min.js"></script>

<script>
function jsload(t, e, o) {
    var n = document.createElement("script");
    if (n.type = "text/javascript", n.async = !0, n.src = t, e)
        for (var s in e) n.dataset[s] = e[s];
    var i = o ? document.querySelector(o) : document.getElementsByTagName("script")[0];
    i.parentNode.insertBefore(n, i)
}
(function () {
	var dload = false;

	function dyload() {
		if (dload === false) {
			dload = true;
			document.removeEventListener('scroll', dyload);
			document.removeEventListener('mousemove', dyload);
			document.removeEventListener('mousedown', dyload);
			document.removeEventListener('touchstart', dyload);
						
			jsload('//s7.addthis.com/js/300/addthis_widget.js#pubid=apupuu');		
	
		}
	}
	
	 setTimeout(function() {
            ! function(e, a, t, n, g, c, o) {
                e.GoogleAnalyticsObject = g, e.ga = e.ga || function() {
                    (e.ga.q = e.ga.q || []).push(arguments)
                }, e.ga.l = 1 * new Date, c = a.createElement(t), o = a.getElementsByTagName(t)[0], c.async = 1, c.src = "https://www.google-analytics.com/analytics.js", o.parentNode.insertBefore(c, o)
            }(window, document, "script", 0, "ga"), ga("create", "UA-141210412-4", "auto"), ga("set", "allowAdFeatures", false), ga("send", "pageview");
            window.onerror = function(message, source, lineno, colno, error) {
                var label = location.href + ': ' + message + ' (' + source + ':' + lineno + (colno ? ':' + colno : '') + ')';
                ga('send', 'event', 'performance', 'error', label, 1, {
                    nonInteraction: true
                });
                window.onerror = null;
            };     
        }, 1)
		
	document.addEventListener("scroll", dyload),
	document.addEventListener("mousemove", dyload),
	document.addEventListener("mousedown", dyload), 
	document.addEventListener("touchstart", dyload),
	document.addEventListener("load", function () {
	document.body.clientHeight != document.documentElement.clientHeight && 0 == document.documentElement.scrollTop && 0 == document.body.scrollTop || dyload()
	});
})();
</script>
<script type="application/ld+json">
	{"@context":"http://schema.org","@type":"Organization","url":"https://apkfuel.com","logo":"https://apkfuel.com/wp-content/uploads/2019/07/APKFuel-Logo.png","sameAs":["https://www.facebook.com/apkfuel/","https://twitter.com/apkfuel","https://www.youtube.com/c/APKFuel"]}
</script>
<script type="application/ld+json">
	{"@context":"http://schema.org","@type":"WebSite","name":"APK Search","url":"https://apkfuel.com/","potentialAction":{"@type":"SearchAction","target":"https://apkfuel.com/?s={search_term_string}","query-input":"required name=search_term_string"}}
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>

	<div class="header_top" id="header_menu">
		<div class="nav_a inav">
            <form class="formsearch" action="https://apkfuel.com/" method="get">
				<div id="inav" style="display: none">
					<div class="so">
						<div class="btctm-top" id="menu_btn">
							<span class="action-bar-menu-button hmbgr-wrap">
							 <div class="hmbgr"></div>
							</span>
						</div>
						<div class="c">
                            <a href="https://apkfuel.com" class="logo" ><img src="https://apkfuel.com/wp-content/uploads/2019/07/APKFuel-Logo.png" alt="APK Fuel" ></a>
						</div>
						<div class="searchbu" id="showsearch"></div>
					</div>
				</div>
				<div id="iso">
					<div class="so">
						<div class="ll">
						<input id="searchform" autofocus="autofocus" role="combobox" aria-autocomplete="list" class="query autocomplete" type="text" name="s" placeholder="Search..." value="" required/>
						</div>
						<div class="tg">
						<!--<select name="t">-->
						<option value="support" selected>APKFuel</option>
						<!--<option value="google">Google</option></select>-->
						</div>
						<div class="rr">
						<input type="submit" value="" />
						</div>
						<div class="bb"><a id="hiddensearch" href="javascript:void(0);" title="Search Close"><img src="https://lh3.androidcontents.com/images/close.svg" alt="Search Close" style="width: 35px;height: 35px"></a></div>
					</div>
				</div>
			</form>
		</div>
	</div>	
	<div class="menu m-drawer" id="menu-body">
		<div class="menu-body">				
			<div class="menu-info">
				<ul class="menu-group menu-border">
				<li><a href="https://apkfuel.com/">Home</a></li>
                <li><a href="https://apkfuel.com/category/apps/">Apps</a></li>
				<li><a href="https://apkfuel.com/category/games/">Games</a></li>
				<li><a href="https://apkfuel.com/journal">Journal</a></li>
                <li><a href="https://apkfuel.com/y3mate/">Video Downloader</a></li>
				<li><a href="https://apkfuel.com/apk-downloader" target="_blank">APK Downloader</a></li>				
				</ul>
				<ul class="menu-group">
				<li><a href="https://apkfuel.com/journal/contact-us/">Contact US</a></li>
				<li><a href="https://apkfuel.com/journal/write-for-us/">Write for US</a></li>					
				</ul>					
			</div>
		</div>
	</div>
	<div class="m-obfuscator" id="m_obfuscator"></div>
	<div class="main pageapp" id="pageapp">
<!--apkfuel built in subheader-->
<div style="padding-top: 28px!important;"></div>
	<div id="subheader" class="np" style="padding-top:35px!important;">
		<div id="searchBox">
			<form action="<?php bloginfo('url'); ?>">
				<input type="text" name="s" placeholder="<?php echo __('Buscar una aplicación', 'appyn'); ?>" required autocomplete="off" id="sbinput">
				<button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
			</form>
			<ul></ul>
		</div>
		<?php get_template_part( 'https://apkfuel.com/wp-content/themes/APKFuel/parts/header_social' ); ?>
	</div>
<!-- end of subheader -->
<div style="margin-bottom: 2px !important; margin-top: 0px !important; margin-left:45px; margin-right:45px; display: flex;justify-content: center;align-items: center;">

<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1443182149991411"
     crossorigin="anonymous"></script>
<!-- post app downloading fixed, apkfuel, above the fold -->
<ins class="adsbygoogle"
     style="display:inline-block;width:320px;height:100px"
     data-ad-client="ca-pub-1443182149991411"
     data-ad-slot="2411772938"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
    </div>

<?php if ($mode == "json"){?>
    
<div style="margin-bottom: 2px !important; margin-top: 1px; margin-left:auto; margin-right:auto; display: flex;justify-content: center;align-items: center;">
		<strong style="font-family: 'Roboto', sans-serif; font-size: 25px !important; color: #218838; padding-left: 5%; padding-right: 5%;"><?php echo $json_obj['title'] ?></strong> </br>
		</div>
<div style="margin-bottom: 5px !important; margin-top: 1px; display: flex;justify-content: center;align-items: center;">
		<img  src= "<?php echo $json_obj['image'][1]['imageUrl'] ?>" alt="App icon" width="110"/></br>  
		</div>

<?php } else {?>

<div style="margin-bottom: 2px !important; margin-top: 1px; margin-left:auto; margin-right:auto; display: flex;justify-content: center;align-items: center;">
		<strong style="font-family: 'Roboto', sans-serif; font-size: 25px !important; color: #218838; padding-left: 5%; padding-right: 5%;"><?php echo get_the_title($post_id);?></strong> </br>
</div>
<div style="margin-bottom: 5px !important; margin-top: 1px; display: flex;justify-content: center;align-items: center;">
		<img  src= "<?php echo $url = wp_get_attachment_url( get_post_thumbnail_id($post_id), 'thumbnail' );  ?>" alt="App icon" width="110"/></br> 
</div>
<?php }?>   

<div class="download-box" style="margin-top:5px; margin-bottom:10px; display: flex;justify-content: center;align-items: center;">   
<div onload="download()"></div>					
	<a id="dl" style="display: none" href="https://apkfuel.com/apk-downloader/user_content/apk_data/<?php echo $appId; ?>.apk" ></a> 	  
</div>

<h2 style="margin-top:1px; margin-bottom:5px; display: flex;justify-content: center;align-items: center">Your App is now Downloading</h2>

<div style="margin-top:10px; margin-bottom:10px; display: flex;justify-content: center;align-items: center">
 		<div class="snippet" data-title=".dot-typing">
          <div class="stage">
            <div class="dot-typing"></div>
          </div>
        </div>
</div>

<p style="margin-top:1px; margin-bottom:5px; display: flex;justify-content: center;align-items: center">If the download doesn't start, click below </p>

<a  class="w-button" id="w-button"
    style="margin-top: 6px !important; margin-bottom: 6px !important;  margin-left:auto; margin-right:auto; width: 40%; 
                           display: flex;justify-content: center;align-items: center;" 
    href="https://apkfuel.com/apk-downloader/user_content/apk_data/<?php echo $appId; ?>.apk">Click Here</a>

<!-- <a class="w-button" id="w-button-disabled" disabled="disabled"
    style="margin-top: 6px !important; margin-bottom: 6px !important;  left: 40% !important; right: 40% !important; position: relative !important; 
    href="https://apkfuel.com/apk-downloader/user_content/apk_data/<?php echo $appId; ?>.apk">Click Here</a> -->

<div style="margin-top:1px; margin-bottom:5px; display: flex;justify-content: center;align-items: center">
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1443182149991411"
     crossorigin="anonymous"></script>
<!-- post app downloading fixed.php, apkfuel, below the fold -->
<ins class="adsbygoogle"
     style="display:inline-block;width:320px;height:250px"
     data-ad-client="ca-pub-1443182149991411"
     data-ad-slot="7063310296"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
</div>    

</div>
<div id="Footer-component">
<!--div class="cl"></div-->
<footer class="site-footer" style="text-align: center !important">
<div class="legal">	
<div style="margin-bottom: 10px; margin-right: 25px;"> 
<ul>
<li><a href="https://apkfuel.com/" title="APK Fuel"><img class="footer-sites-logo lazy_load" src="https://apkfuel.com/wp-content/uploads/2019/07/APKFuel-Logo.png"  alt="APK Fuel" height="100px" width="120px"></a></li>
</ul>
</div>
	<div class="f-list-bottom other-list"> 
		<ul>
			<li><a href="https://apkfuel.com/dmca/" rel="nofollow" title="DMCA Disclaimer">DMCA</a></li>
			<li> <a title="Terms Of Use" class="terms-of-service" href="https://apkfuel.com/terms-of-use/" rel="nofollow">Terms Of Use</a></li>
			<li> <a title="Privacy Policy" class="privacy-policy" href="https://apkfuel.com/privacy-policy/" rel="nofollow">Privacy Policy</a></li>	
			<li><a href="https://apkfuel.com/journal/contact-us/" rel="follow" title="Contact us">Contact us</a></li>
        	<li><a href="https://apkfuel.com/journal/write-for-us/" title="APKFuel Write for us">Write for us</a></li>
			<li>
            <a href="https://www.youtube.com/c/APKFuel" target="_blank">Youtube</a>
			<!--div class="footer-locale-switcher">
				<select class="footer-locales" onchange="var href=this[this.selectedIndex].value;if(href!=''){window.location.href=href};" aria-label="Change language or region:">          	
								<option value="/apk-downloader" selected>English</option>
				<option value="/fa/apk-downloader" >فارسی</option>					
				<option value="/ru/apk-downloader" >Pусский</option>					
				<option value="/th/apk-downloader" >ภาษาไทย</option>					
				<option value="/vi/apk-downloader" >Tiếng Việt</option>					
				<option value="/id/apk-downloader" >Indonesia</option>					
				<option value="/de/apk-downloader" >Deutsch</option>					
				<option value="/es/apk-downloader" >Español</option>					
				<option value="/fr/apk-downloader" >Français</option>					
				<option value="/ar/apk-downloader" >العربية‎</option>						
				<option value="/ko/apk-downloader" >한국어</option>					
				<option value="/ja/apk-downloader" >日本語</option>					
				<option value="/it/apk-downloader" >Italiano</option>					
				<option value="/tr/apk-downloader" >Türkiye</option>					
				<option value="/pt/apk-downloader" >Português</option>					
				<option value="/bg/apk-downloader" >Bulgarian</option>
				<option value="/af/apk-downloader" >Afrikaans</option>
				<option value="/hi/apk-downloader" >हिन्दी</option>	
				<option value="/ur/apk-downloader" >Urdu</option>	
				<option value="/zh_cn/apk-downloader" >中文(简体)</option>					
				<option value="/zh_tw/apk-downloader" >中文(繁體)</option>	
						
				</select>
			</div-->
			</li>

		</ul>
	</div>
		
		
		</div>
		<div class="apksupport">
		<p>Notice a bug? <a target="_blank" rel="noopener" href="mailto:apkfuel.com">Let us know here.</a></p>
		<span>© APKFuel Inc. Ltd. 2019 - 2021</span><!--span class="bullet">•</span><span>Made in Lahore, Pakistan by <a href="https://www.linkedin.com/in/khaleel-ahmad/" target="_blank">khaleel Ahmad</a></span--><br>
		<span>All copyright assets are the trademarks of their respective Company LLC.</span>
		</div>
		
	</footer>	
</div>



<script>
var plist={"samsung":["Samsung Galaxy Note 10+ SM-N975F","Samsung Galaxy Note 10 SM-N970F","Samsung Galaxy Note 9","Samsung Galaxy S10 plus","Samsung Galaxy S10","Samsung Galaxy S6 edge","Samsung Galaxy S3","Samsung Galaxy Grand Prime","Samsung Galaxy A3 SM-A300FU","Samsung Galaxy A5 SM-A500FU","Samsung Galaxy A6 SM-A600FN","Samsung Galaxy A7","Samsung Galaxy A8 SM-A530F","Samsung Galaxy A10 SM-A105F","Samsung Galaxy J7 7.0","Samsung Galaxy Note 3 SC-01F","Samsung Galaxy Camera 2 EK-GC200","Samsung Galaxy Tab 3","Samsung Galaxy Tab 4 SM-T230NU","Samsung Galaxy Tab A T550","Samsung Galaxy Tab S 10.5 SM-T800"],"huawei":["Huawei Honor 7i","Huawei P9","Huawei P10","Huawei Nova 3i","Huawei nova 4","Huawei Honor NOTE 8","Huawei Honor 6 H60-L04","Huawei Honor 6 H60-L01","Huawei Honor 5X","Huawei Honor 4X Play Che2-TL00","Huawei Honor 3C Play H30-T00","Huawei Ascend Y300","Huawei Ascend P8 Lite","Huawei Ascend Mate 7","Huawei Ascend G6-C00","Huawei Ascend G6-L11 4G LTE","Huawei Ascend Mate MT1-U06","Huawei Ascend P6-U06","Huawei Ascend P8","Huawei MediaPad 10 LINK"],"google":["Google Nexus 5","Google Nexus 6","Google Nexus 7","Google Pixel 2","Google Nexus 4","Google Pixel 3 XL","Google Pixel XL","Google Pixel 3A XL","Google Nexus 6P","Google Nexus 10 P8110"],"xiaomi":["Xiaomi Redmi Note 7","Xiaomi Redmi 7A","Xiaomi Redmi Note 5","Xiaomi MI Note LTE","Xiaomi MI Note Pro","Xiaomi Mi Mix 3","Xiaomi Redmi 15"],"sony":["Sony Xperia XZ","Sony Xperia XZ3","Sony Xperia Z1","Sony Xperia Z2","Sony Xperia Z3","Sony Xperia Z5","Sony Xperia ZL","Sony Xperia ZR","Sony Xperia V","Sony Xperia E1","Sony Xperia C5","Sony Xperia M2","Sony Xperia M4","Sony Xperia SP","Sony Xperia T","Sony Xperia UL","Sony Xperia XA1 Ultra","Sony Xperia Tablet Z","Sony Xperia Tablet Z2","Sony Xperia Tablet Z4"],"lg":["LG G8 ThinQ","LG G3","LG G4","LG G5 H830","LG Optimus L70","LG Q7","LG G6","LG K7","LG Volt","LG Vu 3"],"motorola":["Motorola X4","Motorola E6","Motorola Z2 Play","Motorola One","Motorola Moto G7","Motorola Moto G6","Motorola Moto G4","Motorola Moto C","Motorola Moto E (2nd gen)","Motorola DROID Ultra"],"oneplus":["OnePlus 6","OnePlus 7 Pro Dual-SIM GM1910"],"htc":["HTC One M8","HTC One M9","HTC One E8","HTC 10","HTC Desire 610","HTC Droid DNA","HTC One Mini 2","HTC One S Z520e","HTC U11","HTC U12","LG G2 Mini"],"oppo":["OPPO A37fw","Oppo Neo5"],"other":["Panasonic Eluga Note","Acer Iconia B1-A71","Dell Venue 8","Lenovo K3 Note","Infinix Hot 6X","Realme 3 Pro","Blu","Fujitsu","Symphony","vivo Y55L"],"tablet":["Samsung Galaxy Tab 3","Sony Xperia Tablet Z","Sony Xperia Tablet Z2","Sony Xperia Tablet Z4","NVIDIA SHIELD Tablet","NVIDIA SHIELD Tablet K1","Huawei MediaPad 10 LINK","Bq Curie 2"]};

var req = new XMLHttpRequest();

function Processing(name, tg, tx) {
	obj = document.getElementById(name);
	obj.innerHTML = '<web-progress-bar role="progressbar"><div class="zipping">' + tx + '</div><div class="web-progress-bar-wrapper"><div class="web-progress-bar-indeterminate"></div></div></web-progress-bar>';
	if (tg) {
		tg.classList.toggle('w-button-disable');
		tg.disabled = true;
	}
}

function DisplayContent(name, tg) {
	obj = document.getElementById(name);
	obj.innerHTML = req.responseText;
	if (tg) {
		tg.disabled = false;
		tg.classList.remove('w-button-disable');
	}
}

function SendQuery(url, callbackFunction, method, cache, request) {
	req.onreadystatechange = function () {
		if (req.readyState == 4) {
			if (req.status == 200) {
				eval(callbackFunction);
			}
		}
	};
	if (cache != 1) {
		url += "&rand=" + Math.random() * 1000;
	}
	if (method == 'POST') {
		req.open("POST", url, true);
		req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		req.send(request);
	} else {
		req.open("GET", url, true);
		req.send(null);
	}
}

function sd_type() {
	document.getElementById("opd").setAttribute("style", "display: bock;");
	document.getElementById("yid").setAttribute("style", "display: none;");
	document.getElementById('b1').classList.add('selected');
	document.getElementById('b2').classList.remove('selected');
	document.getElementById('device_id').value = "";
	document.getElementById('av_u').value = 0;
}

function yid_type() {
	document.getElementById("opd").setAttribute("style", "display: none;");
	document.getElementById("yid").setAttribute("style", "display: bock;");
	document.getElementById('b2').classList.add('selected');
	document.getElementById('b1').classList.remove('selected');
	document.getElementById('tbi').value = 0;
	document.getElementById('model').value = "";
	document.getElementById('av').value = 0;
	document.getElementById("mdl").setAttribute("style", "display: none;");
}

function only_s(sel, id) {
	var value = sel.value;
	if (value == 0 || value == "other" || value == "") {
		document.getElementById(id).disabled = false;
	} else {
		document.getElementById(id).disabled = true;
	}
}
window.onload = function () {
	var tbi = document.getElementById("tbi"),
		model = document.getElementById("model"),
		mdl = document.getElementById("mdl");
	tbi.onchange = function () {
		if (tbi.value == 0 || tbi.value == "other" || tbi.value == "") {
			mdl.style.display = "none";
			
		} 
		model.length = 1;
		if (this.selectedIndex < 1) return;
		var nsx = plist[tbi.value];
		if (nsx) {
			mdl.style.display = "inline-block";
			for (var i = 0; i < nsx.length; i++) {
				model.options[model.options.length] = new Option(nsx[i], nsx[i]);
			}
		} else {
			mdl.style.display = "none";
		}
	};
	tbi.onchange();
}
function qrshow(e) {
	var _popup = document.getElementById("qr-code-popup");
	e.stopPropagation(), "none" === _popup.style.display ? ((_popup.style.display = "block"), document.addEventListener("click", qrshow)) : ((_popup.style.display = "none"), document.removeEventListener("click", qrshow));
}
</script>
	
<script type="text/javascript">
var apksubmit = document.getElementById("apksubmit");
var ddea_o = document.getElementById("ddea");
ddea_o.style.display = "none";

function ajax(url,request){  
		SendQuery(url,'DisplayContent("downloader_area",apksubmit)','POST',1,request);	
}

apkdownloader.addEventListener("submit", function (evt) {
Processing('downloader_area',apksubmit,'Please Wait, We are Searching for you');
evt.preventDefault();
ga('send', 'event', 'downloaderpage', 'generate', '');
var a = document.getElementById("region-package").value;
var tb = document.getElementById("tbi").value;
var av = document.getElementById("av").value;
var model = document.getElementById("model").value;
var device_id = document.getElementById("device_id").value;
var av_u = document.getElementById("av_u").value;
ddea_o.style.display = "block";
ajax('https://apkfuel.com/apk-downloader/play_api_helper.php','url='+a+'&x=downloader&tbi='+tb+'&av_u='+av_u+'&device_id='+device_id+'&model='+encodeURI(model)+'&hl=en&de_av=&android_ver='+av);
});

function zip_apk(key)
{
var key;
idx=document.getElementById("zipapk");
var e = document.getElementById("sl");
if(e){
var selo = e.options[e.selectedIndex].value;
}
Processing('zip_area',idx,'Zipping: Takes 20 seconds on average');
SendQuery('/_covid19_/zip.php','DisplayContent("zip_area",idx)','POST',1,'&gl=US&key='+key+'&sl='+selo);
}
</script>

<script>
var autoComplete=function(e){if(document.querySelector){var t={selector:0,source:0,minChars:3,delay:150,offsetLeft:0,offsetTop:1,cache:1,menuClass:"",renderItem:function(e,t){t=t.replace(/[-/\^$*+?.()|[]{}]/g,"\$&");var o=new RegExp("("+t.split(" ").join("|")+")","gi");return'<div class="autocomplete-suggestion" data-val="'+e+'">'+e.replace(o,"<b>$1</b>")+"</div>"},onSelect:function(e,t,o){}};for(var o in e)e.hasOwnProperty(o)&&(t[o]=e[o]);for(var n="object"==typeof t.selector?[t.selector]:document.querySelectorAll(t.selector),s=0;s<n.length;s++){var l=n[s];l.sc=document.createElement("div"),l.sc.className="autocomplete-suggestions "+t.menuClass,l.autocompleteAttr=l.getAttribute("autocomplete"),l.setAttribute("autocomplete","off"),l.cache={},l.last_val="",l.updateSC=function(e,o){var n=l.getBoundingClientRect();if(l.sc.style.left=Math.round(n.left+(window.pageXOffset||document.documentElement.scrollLeft)+t.offsetLeft)+"px",l.sc.style.top=Math.round(n.bottom+(window.pageYOffset||document.documentElement.scrollTop)+t.offsetTop)+"px",l.sc.style.width=Math.round(n.right-n.left)+"px",!e&&(l.sc.style.display="block",l.sc.maxHeight||(l.sc.maxHeight=parseInt((window.getComputedStyle?getComputedStyle(l.sc,null):l.sc.currentStyle).maxHeight)),l.sc.suggestionHeight||(l.sc.suggestionHeight=l.sc.querySelector(".autocomplete-suggestion").offsetHeight),l.sc.suggestionHeight)) if(o){var s=l.sc.scrollTop,a=o.getBoundingClientRect().top-l.sc.getBoundingClientRect().top;a+l.sc.suggestionHeight-l.sc.maxHeight>0?l.sc.scrollTop=a+l.sc.suggestionHeight+s-l.sc.maxHeight:a<0&&(l.sc.scrollTop=a+s)}else l.sc.scrollTop=0},i(window,"resize",l.updateSC),document.body.appendChild(l.sc),r("autocomplete-suggestion","mouseleave",function(e){var t=l.sc.querySelector(".autocomplete-suggestion.selected");t&&setTimeout(function(){t.className=t.className.replace("selected","")},20)},l.sc),r("autocomplete-suggestion","mouseover",function(e){var t=l.sc.querySelector(".autocomplete-suggestion.selected");t&&(t.className=t.className.replace("selected","")),this.className+=" selected"},l.sc),r("autocomplete-suggestion","mousedown",function(e){if(c(this,"autocomplete-suggestion")){var o=this.getAttribute("data-val");l.value=o,t.onSelect(e,o,this),l.sc.style.display="none"}},l.sc),l.blurHandler=function(){try{var e=document.querySelector(".autocomplete-suggestions:hover")}catch(t){e=0} e?l!==document.activeElement&&setTimeout(function(){l.focus()},20):(l.last_val=l.value,l.sc.style.display="none",setTimeout(function(){l.sc.style.display="none"},350))},i(l,"blur",l.blurHandler);var a=function(e){var o=l.value;if(l.cache[o]=e,e.length&&o.length>=t.minChars){for(var n="",s=0;s<e.length;s++)n+=t.renderItem(e[s],o);l.sc.innerHTML=n,l.updateSC(0)}else l.sc.style.display="none"};l.keydownHandler=function(e){var o,n=window.event?e.keyCode:e.which;if((40==n||38==n)&&l.sc.innerHTML)return(s=l.sc.querySelector(".autocomplete-suggestion.selected"))?(o=40==n?s.nextSibling:s.previousSibling)?(s.className=s.className.replace("selected",""),o.className+=" selected",l.value=o.getAttribute("data-val")):(s.className=s.className.replace("selected",""),l.value=l.last_val,o=0):((o=40==n?l.sc.querySelector(".autocomplete-suggestion"):l.sc.childNodes[l.sc.childNodes.length-1]).className+=" selected",l.value=o.getAttribute("data-val")),l.updateSC(0,o),!1;if(27==n)l.value=l.last_val,l.sc.style.display="none";else if(13==n||9==n){var s;(s=l.sc.querySelector(".autocomplete-suggestion.selected"))&&"none"!=l.sc.style.display&&(t.onSelect(e,s.getAttribute("data-val"),s),setTimeout(function(){l.sc.style.display="none"},20))}},i(l,"keydown",l.keydownHandler),l.keyupHandler=function(e){var o=window.event?e.keyCode:e.which;if(!o||(o<35||o>40)&&13!=o&&27!=o){var n=l.value;if(n.length>=t.minChars){if(n!=l.last_val){if(l.last_val=n,clearTimeout(l.timer),t.cache){if(n in l.cache)return void a(l.cache[n]);for(var s=1;s<n.length-t.minChars;s++){var c=n.slice(0,n.length-s);if(c in l.cache&&!l.cache[c].length)return void a([])}} l.timer=setTimeout(function(){t.source(n,a)},t.delay)}}else l.last_val=n,l.sc.style.display="none"}},i(l,"keyup",l.keyupHandler),l.focusHandler=function(e){l.last_val="n",l.keyupHandler(e)},t.minChars||i(l,"focus",l.focusHandler)} this.destroy=function(){for(var e=0;e<n.length;e++){var t=n[e];u(window,"resize",t.updateSC),u(t,"blur",t.blurHandler),u(t,"focus",t.focusHandler),u(t,"keydown",t.keydownHandler),u(t,"keyup",t.keyupHandler),t.autocompleteAttr?t.setAttribute("autocomplete",t.autocompleteAttr):t.removeAttribute("autocomplete"),document.body.removeChild(t.sc),t=null}}} function c(e,t){return e.classList?e.classList.contains(t):new RegExp("\b"+t+"\b").test(e.className)} function i(e,t,o){e.attachEvent?e.attachEvent("on"+t,o):e.addEventListener(t,o)} function u(e,t,o){e.detachEvent?e.detachEvent("on"+t,o):e.removeEventListener(t,o)} function r(e,t,o,n){i(n||document,t,function(t){for(var n,s=t.target||t.srcElement;s&&!(n=c(s,e));)s=s.parentElement;n&&o.call(s,t)})}};function debounce(e,t,o){var n;return function(){var s=this,l=arguments,a=o&&!n;clearTimeout(n),n=setTimeout(function(){n=null,o||e.apply(s,l)},t),a&&e.apply(s,l)}}"function"==typeof define&&define.amd?define("autoComplete",function(){return autoComplete}):"undefined"!=typeof module&&module.exports?module.exports=autoComplete:window.autoComplete=autoComplete;for(var $input=null,$inputs=document.querySelectorAll('input[name="s"]'),i=0;i<$inputs.length;i++) if(null!=$inputs[i].offsetParent){$input=$inputs[i];break} null!=$input&&new autoComplete({selector:$input,cache:!0,delay:0,minChars:1,source:debounce(function(e,t){try{o.abort()}catch(e){} var o=new XMLHttpRequest;o.addEventListener("readystatechange",function(){if(4===this.readyState&&200===this.status){for(var e=JSON.parse(this.responseText),o=[],n=0;n<e.length;++n)o.push(e[n].s);t(o.slice(0,5))}}),o.open("GET","https://lh3.androidcontents.com/key/?hl=en&q="+e.toLowerCase()),o.send()},250),onSelect:function(e,t,o){var n=o.getAttribute("data-val");window.location.href="https://apkfuel.com/?s="+n.replace(/ /g,"+")}});
var iso_sh = document.getElementById("iso");
var inav_sh = document.getElementById("inav"); 
 iso_sh.style.display = "none";
	inav_sh.style.display = "block"; 
 function s_op(){document.getElementById('iso').setAttribute("style","display: bock;");document.getElementById('inav').setAttribute("style","display: none;");document.getElementById('searchform').focus();var x=document.getElementById('headadv');if(x){x.style.display="none";}} function s_cl(){document.getElementById('iso').setAttribute("style","display: none;");document.getElementById('inav').setAttribute("style","display: bock;");var x=document.getElementById('headadv');if(x){x.style.display="block";}} function menu_lang(){document.getElementById("arrow_lang").classList.toggle("menu-lang-up");document.getElementById("list_lang").classList.toggle("is-active");} function menu_op(){document.getElementById('menu-body').classList.toggle('is-visible');document.getElementById('m_obfuscator').classList.toggle('is-visible');document.getElementById('menu_btn').classList.toggle('open');var x=document.getElementById('pageapp');if(x){x.classList.toggle('is-visible');}} menu_btn.addEventListener("click",menu_op);m_obfuscator.addEventListener("click",menu_op);showsearch.addEventListener("click",s_op);hiddensearch.addEventListener("click",s_cl);
</script>

<script>
 var disqus_config = function () {
	this.page.url = 'https://apkfuel.com/apk-downloader/';
	this.page.identifier = 'https://apkfuel.com/apk-downloader/';
};

var disqus_observer = new IntersectionObserver(function(entries) {
    if(entries[0].isIntersecting) {
        (function() {
            var d = document, s = d.createElement('script');
            s.src = 'https://https-apkfuel-com-apk-downloader.disqus.com/embed.js';
            s.setAttribute('data-timestamp', +new Date());
            (d.head || d.body).appendChild(s);
        })();
        disqus_observer.disconnect();
    }
}, { threshold: [0] });
disqus_observer.observe(document.querySelector("#disqus_thread"));
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript> 

<!-- <script src="assets/function.js">
</script> -->
<!-- adsense lazy load -->

<script type='text/javascript'> 
// var arpianLazyLoadAds = false; 
// window.addEventListener("scroll", function() { 
// if((document.documentElement.scrollTop != 0 && arpianLazyLoadAds === false) || 
// (document.body.scrollTop != 0 && arpianLazyLoadAds === false)) { 
// (function() { 
// var ad = document.createElement('script'); 
// ad.setAttribute('data-ad-client', 'ca-pub-1443182149991411'); 
// ad.async = true; 
// ad.src = 'https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js'; 
// var sc = document.getElementsByTagName('script')[0]; 
// sc.parentNode.insertBefore(ad, sc); 
// })(); 
// arpianLazyLoadAds = true; 
// } 
// }, true); 

//faq javascript
const accordionItemHeaders=document.querySelectorAll(".accordion-item-header");accordionItemHeaders.forEach(accordionItemHeader=>{accordionItemHeader.addEventListener("click",event=>{accordionItemHeader.classList.toggle("active");const accordionItemBody=accordionItemHeader.nextElementSibling;if(accordionItemHeader.classList.contains("active")){accordionItemBody.style.maxHeight=accordionItemBody.scrollHeight+"px";}
else{accordionItemBody.style.maxHeight=0;}});});
</script>
<!-- end of adsense lazy load -->
<!-- Below script is used for downloading app automatically -->

<script>
<!-- This script is used for downloading app automatically -->
(function download() {	
						
					var x = document.getElementById("w-button");					
    				x.style.display = "none";             
                        
                            let data = {
                                'appId': '<?= $appId ?>'                             
                            }
                            console.log(data)
                            $.ajax({
                                url: "background.php",
                                type: "post",
                                data: data ,
                                success: function (response) {                                
                           		
                                var url = '<?php echo $file_pointer; ?>';                               
                                function UrlExists(url) {
                                    var http = new XMLHttpRequest();
                                    http.open('HEAD', url, false);
                                    http.send();
                                    if (http.status != 404){
                                    
                                        const interval = setInterval(function() {	
                    						document.getElementById('dl').click();              
    										clearInterval(interval);                   
    										x.style.display = "flex";   
                                        
                						},10);	
                                    }
                                    else{                                        
                                		// alert("Oooops, Either the App is deleted from Play Store or \
                                		// APK is not available for this configuration! Please USE https://apk-downloader & set device configurations");
                                		                               	
    									if (window.confirm("Oooops, Either the App is deleted from Play Store or APK is not available for this configuration! Please use APK-Downloader with appropriate configurations.")) 
										{
											window.location.href='https://apkfuel.com/apk-downloader/';
										};										
                                    }
                                }
                                UrlExists(url);
                               
                                // You will get response from your PHP page (what you echo or print)
                                },
                                error: function(jqXHR, textStatus, errorThrown) {
                                    console.log(textStatus, errorThrown);
                                }
                            });                 
     	
})()	
</script>
<?php session_destroy(); ?>
</body>
</html>
