<?php
	
	session_start();
	$date = mysql_real_escape_string($_GET['date']);
	$creativity = mysql_real_escape_string($_GET['creativity']);
	$action = mysql_real_escape_string($_GET['action']);
	$service = mysql_real_escape_string($_GET['service']);
	$comments = mysql_real_escape_string($_GET['comments']);
	$username = $_SESSION['username'];

	include 'connectdb.php';

	$query = 'UPDATE deadlines SET deadline=\''.$date.'\', comments=\''.$comments.'\', creativity=\''.$creativity.'\', action=\''.$action.'\', service=\''.$service.'\', responsibleadvisor=\''.$username.'\'';

	$result = mysql_query($query);

	include 'oneBack.php';
?>D