<?php
	
	$host = "localhost";
	$user = "root";
	$pass = "";
	$db = "cas";
	
	mysql_connect("$host", "$user", "$pass") or die("Could not connect to MySQL: ".mysql_error());
	mysql_select_db("$db") or die("No database with this name");
?>