<?php

	include ('login.php');

	if(!empty($_SESSION)) {
		session_destroy();
		header('Location: /cas/');
	}

?>

<!DOCTYPE html>
<html>
	<head>
		<title>HOME</title>
		<!--link rel = "stylesheet" type = "text/css" href = "styles\background-styles.css"-->
		<link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<link href='https://fonts.googleapis.com/css?family=Niconne' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="styles\main.css">
		<link rel="stylesheet" type="text/css" href="styles\index_media.css">
		<script src = "scripts.js"></script>
		<style type="text/css">
			
			.from-bottom {
				position: relative;
				-webkit-animation: animatebottom 0.8s;
				animation: animatebottom 0.8s;
			}

			@-webkit-keyframes animatebottom {
				from {
					bottom:-300px;
					opacity:0;
				}
				to {
					bottom: 0px;
					opacity:1;
				}
			}

			@keyframes animatebottom {
				from {
					bottom: -300px;
					opacity: 0;
				}
				to {
					bottom: 0;
					opacity: 1;
				}
			}

			.shadow {
				position: absolute;
				width: 100%;
				bottom: 0px;
				right: 0px;
			}

		</style>
	</head>
	<body onscroll = "showSolution()">
		<?php
			include('header.php');
		?>

		<h1 class = "cas">CAS &nbsp; JOURNALER</h1>

		<section class = "index">
			<img src="http://localhost/cas/proj-images/inClass.jpg" class="from-bottom">
			<h2 class="from-bottom">Loads of paperwork?</h2>
			<img src="http://localhost/cas/proj-images/shadow.png" class = "shadow">
		</section>
		<section class = "index">
			<img src="http://localhost/cas/proj-images/time.jpg" class="from-bottom">
			<h2 class=" from-bottom">Do the students use as their excuse that they forgot their C.A.S. Journal to their homes?</h2>
			<img src="http://localhost/cas/proj-images/shadow.png" class = "shadow">
		</section>
		<section class = "index">
			<img src="http://localhost/cas/proj-images/mess.jpg" class="from-bottom">
			<h2 class="from-bottom">Do you struggle trying to handle all these papers?</h2>
			<img src="http://localhost/cas/proj-images/shadow.png" class = "shadow">
		</section>
		<hr>
		<div id = "solution">
			<a href="page.html" class="from-bottom" id = "solution1"><img src="http://localhost/cas/proj-images/casJournaler2.jpg" id = "logo"></a>
			<h2 style = "color: grey; display: none" class="from-bottom" id = "solution2">All these problems solved.</h2>
			<a href = "http://localhost/cas/index.php#video" class="from-bottom" id = "solution3" style = "display: none"><img src="http://localhost/cas/proj-images/transparent.png" style = "height: 70px;"></a>
		</div>
		<hr>
		<a name = "video"></a>
		<iframe src="https://www.youtube.com/embed/xA6as6cxf4M" frameborder="0" allowfullscreen></iframe>

		<?php
			include('footer.php');
		?>
	</body>
</html>