
<!DOCTYPE html>
<html>
	<head>
		<title>REGISTRATION</title>
		<!--link rel = "stylesheet" type = "text/css" href = "styles\background-styles.css"-->
		<link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<link href='https://fonts.googleapis.com/css?family=Niconne' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="styles\main.css">
		<link rel="stylesheet" type="text/css" href="styles\formStyle.css">

		<style type="text/css">
		
		/*Do not put it in external*/
		h1 {
			position: absolute;
			padding: 10% 0px;
			font-size: 400%;
			width: 100%;
		}

		#contact {
			margin-top: 10%;
			position: relative;
			width: 100%;
			height: 700px;
			text-align: center;
		}

		#con-form {
			background: url('background-images/back.png') no-repeat;
			height: 100%;
			width: 1022px;
			margin: 0px auto;
		}

		div.line input, textarea {
			height: 50px;
			background: transparent;
			font-size: 24px;
			padding: 5px;
			border: 2px solid white;
			color: white;
			float: right;
			letter-spacing: 2px;
		}

		#lineTxtArea {
			height: 200px;
		}

		div.line input[type=submit] {
			padding: 0px 20px;
		}

		textarea {
			height: 200px;
			resize: none;
		}

		input:focus, textarea {
			outline: none;
		}

		div.line input[type=submit]:hover {
			background-color: rgba(256, 256, 256, 0.1);
		}

		@media screen and (max-width: 1022px) {
			h1 {
				position: fixed;
				padding: 100px 0px;
				width: auto;
				left: 370px;
				white-space: nowrap;
			}

			#contact {
				margin-top: 100px;
			}
		}

		</style>
	</head>
	<body style = "background: url('background-images/wooden.jpg') no-repeat;">
		<?php
			include('header.php');
		?>

		<h1>Contact Us...</h1>

		<section id = "contact">
			<form id = "con-form">
				<div id = "container">
					<div class = "line">
						<label>Email: </label>
						<input type="text" name="email">
					</div>
					<div class = "line">
						<label>Full Name: </label>
						<input type="text" name="name">
					</div>
					<div class = "line" id = "lineTxtArea">
						<label>Message: </label>
						<textarea name="message"></textarea>
					</div>
					<div class = "line">
						<input type="submit" name="Submit">
					</div>
				</div>
			</form>
		</section>
		<!--section>
			<h1>Contact Us...</h1>
			<div id = "telephones">
				<h2>Technical support:</h2>

			</div>
			<hr style="width: 1px; height: 500px; display: inline-block; position: absolute; left: 50%; top: 95px">
			<div id = "email-form">
				
			</div>
		</section-->
	</body>
</html>