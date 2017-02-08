<?php
	session_start();
	$id = mysql_real_escape_string($_POST['id']);
	$username = mysql_real_escape_string($_POST['username']);
	$comments = mysql_real_escape_string($_POST['comments']);
	$acceptance = 0;

	if(isset($_POST['acceptance'])) {
		$acceptance = mysql_real_escape_string($_POST['acceptance']);

		if($acceptance == "on")
			$acceptance = 1;
	}

	include 'connectdb.php';

	$query = 'INSERT INTO feedback(comments, approval, id_record, subdate, writtenby) VALUES(\''.$comments.'\', '.$acceptance.', \''.$id.'\', \''.date("Y-m-d").'\', \''.$_SESSION['username'].'\')';
	$result = mysql_query($query);

	$edit = 0;

	if($acceptance == 0) {
		$edit = 1;
	}

	$query = 'UPDATE records SET edit='.$edit.' WHERE id='.$id;
	$result = mysql_query($query);

	include('oneBack.php');
?>
