<?php
	session_start();

	if(!empty($_SESSION)) {
		if($_SESSION['login'] == true) {

			$priv = $_SESSION['administrator'];
			$username = $_SESSION['username'];

		} else {
			header('Location: /cas/');
		}
	} else {
		header('Location: /cas/');
	}

?>
