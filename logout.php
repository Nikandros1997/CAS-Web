<?php

	session_start();

	if(!empty($_SESSION)) {
		unset($_SESSION['login']);

		session_destroy();

		header('Location: /cas/');
	}
?>