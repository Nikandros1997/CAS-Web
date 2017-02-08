<?php

	session_start();
	// alter using as WHERE statements the username and date
	$initTitle = mysql_real_escape_string($_POST['titleInitInput']);
	$query = 'UPDATE records SET';

	if(isset($_POST['title']) && $_POST['title'] != '')  {
		$title = mysql_real_escape_string($_POST['title']);
		$query = $query.' name=\''.$title.'\'';

		if($_POST['hours'] != '' || $_POST['task'] != '' || $_POST['reflection'] != '') {
			$query = $query.',';
		}
	}

	if(isset($_POST['hours']) && $_POST['hours'] != '') {
		$hours = mysql_real_escape_string($_POST['hours']);
		$query = $query.' hours='.$hours;

		if($_POST['task'] != '' || $_POST['reflection'] != '') {
			$query = $query.',';
		}
	}

	if(isset($_POST['task']) && $_POST['task'] != '') {
		$task = mysql_real_escape_string($_POST['task']);
		$query = $query.' taskundertaken=\''.$task.'\'';

		if($_POST['reflection'] != '') {
			$query = $query.',';
		}
	}

	if(isset($_POST['reflection']) && $_POST['reflection'] != '') {
		$reflection = mysql_real_escape_string($_POST['reflection']);
		$query = $query.' reflection=\''.$reflection.'\'';
	}

	echo $query = $query.', edit=0 WHERE username=\''.$_SESSION['username'].'\' && name=\''.$initTitle.'\'';
	include('connectdb.php');

	$result = mysql_query($query);

	mysql_close();

	include('oneBack.php');

?>