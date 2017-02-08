<header>
			<div id = "login">
				<form action = "http://localhost/cas/login.php" method = "POST">
					<table>
						<tr>
							<td>
								Username:
							</td>
							<td style = "padding-left: 5px">
								Password:
							</td>
						</tr>
						<tr>
							<td>
								<input type = "text" name = "username" size = "13">
							</td>
							<td>
								<input type = "password" name = "password" size = "13">
								<input type = "submit" name = "login" value = "Log In" style = "margin-left: 10px">
							</td>
						</tr>
						<tr>
							<td colspan = "3" style = "padding-left: 5px">
								<a href = "#" id = "small-links">Did you forget your username or password?</a>
							</td>
						</tr>
					</table>
				</form>
			</div>
<?php
	
	$currentPage = basename($_SERVER['PHP_SELF']);
	$index = '';
	$register = '';
	$contact = '';

	if(strcmp($currentPage, 'index.php') == 0) {
		$index = 'current';
	} else if (strcmp($currentPage, 'registration.php') == 0) {
		$register = 'current';
	} else if (strcmp($currentPage, 'contactus.php') == 0) {
		$contact = 'current';
	}

			echo '<nav>
				<pre id = "menu">M
E
N
U</pre>
<p id = "verySmallMenu">MENU</p>
				<ul>
					<li>
						<a href="index.php" class = "'.$index.'">Home</a>
					</li>
					<li>
						<a href = "registration.php" class = "'.$register.'">Register...</a>
					</li>
					<li>
						<a href = "contactus.php" class = "'.$contact.'">Contact us...</a>
					</li>
					<li>
						<a href = "http://www.ibo.org/programmes/diploma-programme/curriculum/creativity-activity-and-service/" target="_blank">C.A.S. Info</a>
					</li>
				</ul>
			</nav>
		</header>';

?>