
<?php
	
	include('checkLogin.php');

?>


<!DOCTYPE html>
<html>
	<head>
		<title>HOME - WELCOME</title>
		<script src = "scripts.js"></script>
		<link rel = "stylesheet" type = "text/css" href = "styles\personal.css">
		<link rel="stylesheet" type="text/css" href="styles\headerIn.css">
	</head>
	<body onresize = "setIdentityPosition()" onload = "setIdentityPosition()">
		
		<?php
			include('identity.php');
			include('headerIn.php');

		
			include('connectdb.php');

			$query = 'SELECT name, surname, birth, gender, address, addressnumber, area FROM accounts WHERE username=\''.$username.'\'';

			$result = mysql_query($query);

			$row = mysql_fetch_assoc($result);

			$name = $row['name'];
			$surname = $row['surname'];
			$birth = $row['birth'];
			$gender = $row['gender'];
			$fullAddress = $row['address'].' '.$row['addressnumber'].',<br />'.$row['area'].',<br />13561';

			echo '<section id = "personal">
					<div id = "wrap" style = "width: 576px;">
						<div id = "container">
							<div class = "line">
								<label>Full Name:</label>
								<p>'.$name.' '.$surname.'</p>
							</div>
							<div class = "line">
								<label>Date of Birth:</label>
								<p>'.$birth.'</p>
							</div>
							<div class = "line">
								<label>Gender:</label>
								<p>'.$gender.'</p>
							</div>
							<div class = "line">
								<label>Full Address:</label>
								<p>'.$fullAddress.'</p>
							</div>
						</div>
					</div>
				</section>';

				mysql_close();
		?>
	</body>
</html>