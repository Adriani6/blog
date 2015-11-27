<?php 
	require_once '../utils/requests.php'; 
	
	//$tokenUrl = $_SESSION['token'];
	if(empty($_SESSION['ucp'])){
		#header("Location: login.php?err=auth");
	}else{
		unset($_SESSION['ucp']);
	}?>
<!DOCTYPE html>
<html lang="en">
<head>
<script src="../js/html_utils.js"></script>
<link rel="stylesheet" href="../bootstrap_css/bootstrap.min.css">
<script>
var xmlhttp = new XMLHttpRequest();
var url = "../utils/requests.php?data=usercp";

xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        myFunction(xmlhttp.responseText);
    }
}
xmlhttp.open("GET", url, true);
xmlhttp.send();

function myFunction(response) {
    var arr = JSON.parse(response);
    var i;
	var out = "";

	document.getElementById("name").innerHTML = arr[0].Name;
	document.getElementById("loc").innerHTML = arr[0].Country;
	document.getElementById("ver").innerHTML = arr[0].Verified;
	document.getElementById("type").innerHTML = arr[0].Type;
}
</script>
</head>
<body>
<div class="container-fluid">
	<div class="row">
	<h2 style="margin-left:20px;">User CP</h2>
	  <div class="col-xs-6 col-md-3">
		<ul class="nav nav-pills nav-stacked" style="width: 150px; position: absolute; margin-top:30%;">
			<li role="presentation" class="active"><a href="#">Profile</a></li>
			<li role="presentation"><a href="#">My Comments</a></li>
			<?php if(isset($_SESSION['type'])){
				if($_SESSION['type'] === "AUTHOR" || $_SESSION['type'] === "ADMIN"){ ?>
			<li role="presentation"><a href="#">My Adventures</a></li>
			<?php } } ?>
			<li role="presentation"><a href="../index.php">Log Out</a></li>
		</ul>
	  </div>
	   <div class="col-xs-12 col-md-9">
	   <!-- Start Profile Tab -->
		<div id="profile" style="background-color: orange; height: 100px; margin-top: 10%; width: 100%;">
		<h3>Profile</h3>
		Your Name: <div id="name"></div><br />
		Location: <div id="loc"></div><br />
		Verified: <div id="ver"></div><br />
		Type: <div id="type"></div><br />
		
		</div>
		<!-- End Profile Tab -->
	  </div>
	</div>
</div>
</body>
</html>