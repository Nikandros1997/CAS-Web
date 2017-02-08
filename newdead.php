<?php
	
	session_start();
	$date = $_GET['date'];
	$month = $_GET['month'];
	$year = $_GET['year'];
	$comments = $_GET['comments'];
	$username = $_SESSION['username'];

	include 'connectdb.php';

	$query = 'INSERT INTO deadlines(deadline, comments, responsibleadvisor) VALUES (\''.$year.'/'.$month.'/'.$date.'\', \''.$comments.'\', \''.$username.'\')';

	$result = mysql_query($query);

	include 'oneBack.php';
?>