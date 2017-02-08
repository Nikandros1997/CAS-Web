<?php
	session_start();

	$error = '';

	if(isset($_POST['login'])) {

		if(isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password'])) {

			$username = mysql_real_escape_string($_POST['username']);
			$password = mysql_real_escape_string($_POST['password']);

			$query = 'SELECT username, pass, administrator, advisor FROM accounts WHERE username=\''.$username.'\'';

			include('connectdb.php');
			$result = mysql_query($query);
			$row = mysql_fetch_assoc($result);

			if($row['username'] == $username && $row['pass'] == $password) {
				$_SESSION['login'] = true;
				$_SESSION['username'] = $row['username'];
				$_SESSION['$password'] = $row['pass'];
				$_SESSION['administrator'] = $row['administrator'];

				if($_SESSION['administrator'] == 0) {
					$_SESSION['advisorname'] = $row['advisor'];
				} else {
					$_SESSION['advisorname'] = 'none';
				}

				mysql_close();

				header('Location: /cas/personal.php');
			} else {
				echo 'You could not log in!';
			}
		}
	}
?>