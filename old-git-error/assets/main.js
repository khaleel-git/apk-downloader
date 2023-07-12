
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
						/* (function() {
			var n = document.createElement("script");
			n.async = !0, n.setAttribute('data-ad-client', 'ca-pub-1443182149991411'), document.head.appendChild(n), n.src = '//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js'
			})();*/
						
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

	<!--end of javascript-->
	<!--end of custom header css files and javascript-->
	
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



var autoComplete=function(e){if(document.querySelector){var t={selector:0,source:0,minChars:3,delay:150,offsetLeft:0,offsetTop:1,cache:1,menuClass:"",renderItem:function(e,t){t=t.replace(/[-/\^$*+?.()|[]{}]/g,"\$&");var o=new RegExp("("+t.split(" ").join("|")+")","gi");return'<div class="autocomplete-suggestion" data-val="'+e+'">'+e.replace(o,"<b>$1</b>")+"</div>"},onSelect:function(e,t,o){}};for(var o in e)e.hasOwnProperty(o)&&(t[o]=e[o]);for(var n="object"==typeof t.selector?[t.selector]:document.querySelectorAll(t.selector),s=0;s<n.length;s++){var l=n[s];l.sc=document.createElement("div"),l.sc.className="autocomplete-suggestions "+t.menuClass,l.autocompleteAttr=l.getAttribute("autocomplete"),l.setAttribute("autocomplete","off"),l.cache={},l.last_val="",l.updateSC=function(e,o){var n=l.getBoundingClientRect();if(l.sc.style.left=Math.round(n.left+(window.pageXOffset||document.documentElement.scrollLeft)+t.offsetLeft)+"px",l.sc.style.top=Math.round(n.bottom+(window.pageYOffset||document.documentElement.scrollTop)+t.offsetTop)+"px",l.sc.style.width=Math.round(n.right-n.left)+"px",!e&&(l.sc.style.display="block",l.sc.maxHeight||(l.sc.maxHeight=parseInt((window.getComputedStyle?getComputedStyle(l.sc,null):l.sc.currentStyle).maxHeight)),l.sc.suggestionHeight||(l.sc.suggestionHeight=l.sc.querySelector(".autocomplete-suggestion").offsetHeight),l.sc.suggestionHeight)) if(o){var s=l.sc.scrollTop,a=o.getBoundingClientRect().top-l.sc.getBoundingClientRect().top;a+l.sc.suggestionHeight-l.sc.maxHeight>0?l.sc.scrollTop=a+l.sc.suggestionHeight+s-l.sc.maxHeight:a<0&&(l.sc.scrollTop=a+s)}else l.sc.scrollTop=0},i(window,"resize",l.updateSC),document.body.appendChild(l.sc),r("autocomplete-suggestion","mouseleave",function(e){var t=l.sc.querySelector(".autocomplete-suggestion.selected");t&&setTimeout(function(){t.className=t.className.replace("selected","")},20)},l.sc),r("autocomplete-suggestion","mouseover",function(e){var t=l.sc.querySelector(".autocomplete-suggestion.selected");t&&(t.className=t.className.replace("selected","")),this.className+=" selected"},l.sc),r("autocomplete-suggestion","mousedown",function(e){if(c(this,"autocomplete-suggestion")){var o=this.getAttribute("data-val");l.value=o,t.onSelect(e,o,this),l.sc.style.display="none"}},l.sc),l.blurHandler=function(){try{var e=document.querySelector(".autocomplete-suggestions:hover")}catch(t){e=0} e?l!==document.activeElement&&setTimeout(function(){l.focus()},20):(l.last_val=l.value,l.sc.style.display="none",setTimeout(function(){l.sc.style.display="none"},350))},i(l,"blur",l.blurHandler);var a=function(e){var o=l.value;if(l.cache[o]=e,e.length&&o.length>=t.minChars){for(var n="",s=0;s<e.length;s++)n+=t.renderItem(e[s],o);l.sc.innerHTML=n,l.updateSC(0)}else l.sc.style.display="none"};l.keydownHandler=function(e){var o,n=window.event?e.keyCode:e.which;if((40==n||38==n)&&l.sc.innerHTML)return(s=l.sc.querySelector(".autocomplete-suggestion.selected"))?(o=40==n?s.nextSibling:s.previousSibling)?(s.className=s.className.replace("selected",""),o.className+=" selected",l.value=o.getAttribute("data-val")):(s.className=s.className.replace("selected",""),l.value=l.last_val,o=0):((o=40==n?l.sc.querySelector(".autocomplete-suggestion"):l.sc.childNodes[l.sc.childNodes.length-1]).className+=" selected",l.value=o.getAttribute("data-val")),l.updateSC(0,o),!1;if(27==n)l.value=l.last_val,l.sc.style.display="none";else if(13==n||9==n){var s;(s=l.sc.querySelector(".autocomplete-suggestion.selected"))&&"none"!=l.sc.style.display&&(t.onSelect(e,s.getAttribute("data-val"),s),setTimeout(function(){l.sc.style.display="none"},20))}},i(l,"keydown",l.keydownHandler),l.keyupHandler=function(e){var o=window.event?e.keyCode:e.which;if(!o||(o<35||o>40)&&13!=o&&27!=o){var n=l.value;if(n.length>=t.minChars){if(n!=l.last_val){if(l.last_val=n,clearTimeout(l.timer),t.cache){if(n in l.cache)return void a(l.cache[n]);for(var s=1;s<n.length-t.minChars;s++){var c=n.slice(0,n.length-s);if(c in l.cache&&!l.cache[c].length)return void a([])}} l.timer=setTimeout(function(){t.source(n,a)},t.delay)}}else l.last_val=n,l.sc.style.display="none"}},i(l,"keyup",l.keyupHandler),l.focusHandler=function(e){l.last_val="n",l.keyupHandler(e)},t.minChars||i(l,"focus",l.focusHandler)} this.destroy=function(){for(var e=0;e<n.length;e++){var t=n[e];u(window,"resize",t.updateSC),u(t,"blur",t.blurHandler),u(t,"focus",t.focusHandler),u(t,"keydown",t.keydownHandler),u(t,"keyup",t.keyupHandler),t.autocompleteAttr?t.setAttribute("autocomplete",t.autocompleteAttr):t.removeAttribute("autocomplete"),document.body.removeChild(t.sc),t=null}}} function c(e,t){return e.classList?e.classList.contains(t):new RegExp("\b"+t+"\b").test(e.className)} function i(e,t,o){e.attachEvent?e.attachEvent("on"+t,o):e.addEventListener(t,o)} function u(e,t,o){e.detachEvent?e.detachEvent("on"+t,o):e.removeEventListener(t,o)} function r(e,t,o,n){i(n||document,t,function(t){for(var n,s=t.target||t.srcElement;s&&!(n=c(s,e));)s=s.parentElement;n&&o.call(s,t)})}};function debounce(e,t,o){var n;return function(){var s=this,l=arguments,a=o&&!n;clearTimeout(n),n=setTimeout(function(){n=null,o||e.apply(s,l)},t),a&&e.apply(s,l)}}"function"==typeof define&&define.amd?define("autoComplete",function(){return autoComplete}):"undefined"!=typeof module&&module.exports?module.exports=autoComplete:window.autoComplete=autoComplete;for(var $input=null,$inputs=document.querySelectorAll('input[name="s"]'),i=0;i<$inputs.length;i++) if(null!=$inputs[i].offsetParent){$input=$inputs[i];break} null!=$input&&new autoComplete({selector:$input,cache:!0,delay:0,minChars:1,source:debounce(function(e,t){try{o.abort()}catch(e){} var o=new XMLHttpRequest;o.addEventListener("readystatechange",function(){if(4===this.readyState&&200===this.status){for(var e=JSON.parse(this.responseText),o=[],n=0;n<e.length;++n)o.push(e[n].s);t(o.slice(0,5))}}),o.open("GET","https://lh3.androidcontents.com/key/?hl=en&q="+e.toLowerCase()),o.send()},250),onSelect:function(e,t,o){var n=o.getAttribute("data-val");window.location.href="https://apkfuel.com/?s="+n.replace(/ /g,"+")}});
var iso_sh = document.getElementById("iso");
var inav_sh = document.getElementById("inav"); 
 iso_sh.style.display = "none";
	inav_sh.style.display = "block"; 
 function s_op(){document.getElementById('iso').setAttribute("style","display: bock;");document.getElementById('inav').setAttribute("style","display: none;");document.getElementById('searchform').focus();var x=document.getElementById('headadv');if(x){x.style.display="none";}} function s_cl(){document.getElementById('iso').setAttribute("style","display: none;");document.getElementById('inav').setAttribute("style","display: bock;");var x=document.getElementById('headadv');if(x){x.style.display="block";}} function menu_lang(){document.getElementById("arrow_lang").classList.toggle("menu-lang-up");document.getElementById("list_lang").classList.toggle("is-active");} function menu_op(){document.getElementById('menu-body').classList.toggle('is-visible');document.getElementById('m_obfuscator').classList.toggle('is-visible');document.getElementById('menu_btn').classList.toggle('open');var x=document.getElementById('pageapp');if(x){x.classList.toggle('is-visible');}} menu_btn.addEventListener("click",menu_op);m_obfuscator.addEventListener("click",menu_op);showsearch.addEventListener("click",s_op);hiddensearch.addEventListener("click",s_cl);
