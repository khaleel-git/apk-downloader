<!DOCTYPE html>

<html>

<head>

<title>
	File Upload With Progress Bar Using PHP
</title>

<style type="text/css">
#upload_container {
	border-top:#F0F0F0 2px solid;
	background:#FAF8F8;
	padding:10px;
	width:600px;
}
#upload_container label {
	margin:2px; 
	font-size:1em; 
	font-weight:bold;
	}
.demoInputBox {
	padding:5px; 
	border:#F0F0F0 1px solid; 
	border-radius:4px; 
	background-color:#FFF;
	}
#progress-bar {
	background-color: skyblue;
	height:20px;color: #FFFFFF;
	width:0%;
	-webkit-transition: width .3s;
	-moz-transition: width .3s;
	transition: width .3s;
	}
.btnSubmit {
	background-color:azure;
	padding:10px 40px;
	color:blue;
	border:skyblue 1px solid; 
	border-radius:4px;
	}
#progress-div {
	border:blue 2px solid;
	padding: 5px 0px;
	margin:30px 0px;
	border-radius:4px;
	text-align:center;
	}
#targetLayer {
	width:100%;
	text-align:center;
	}
#targetLayer img {
	border:red 2px solid;
	padding:8px;
	border-radius:8px;
	}

</style>

<script src="js/code_js.js" type="text/javascript"></script>

<script src="js/code_js1.js" type="text/javascript"></script>

<script type="text/javascript">
$(document).ready(function() { 
	 $('#upload_container').submit(function(e) {	
		if($('#userImage').val()) {
			e.preventDefault();
			$('#loader-icon').show();
			$(this).ajaxSubmit({ 
				target:   '#targetLayer', 
				beforeSubmit: function() {
				  $("#progress-bar").width('0%');
				},
				uploadProgress: function (event, position, total, percentComplete){	
					$("#progress-bar").width(percentComplete + '%');
					$("#progress-bar").html('<div id="progress-status">' + percentComplete +' %</div>')
				},
				success:function (){
					$('#loader-icon').hide();
				},
				resetForm: true 
			}); 
			return false; 
		}
	});
}); 
</script>

</head>

<body>

<center>
<form style="background-color: #B4FD0B" id="upload_container" action="upload.php" method="post">
<div>
<label>Upload Image File:</label>
<input name="userImage" id="userImage" type="file" class="demoInputBox" />
</div>
<br />
<div><input type="submit" id="btnSubmit" value="Submit" class="btnSubmit" /></div>
<div id="progress-div"><div id="progress-bar"></div></div>
<div id="targetLayer"></div>
</form>
<div id="loader-icon" style="display:none;"><img src="loading.gif" /></div>
</center>

</body>

</html>