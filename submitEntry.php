<?php

	if(isset($_POST['date'])) {
		$deadline_id = mysql_real_escape_string($_POST['deadline_id']);
		$date = mysql_real_escape_string($_POST['date']);
		$type = mysql_real_escape_string($_POST['type']);
		$name = mysql_real_escape_string($_POST['name']);
		$hours = mysql_real_escape_string($_POST['hours']);
		$task = mysql_real_escape_string($_POST['task']);
		$reflection = mysql_real_escape_string($_POST['reflection']);
		$outcomes = array("false", "false", "false", "false", "false", "false", "false", "false");
		$imageLink = mysql_real_escape_string($_POST['image_path']);
		$longi = mysql_real_escape_string($_POST['long']);
		$lat = mysql_real_escape_string($_POST['lat']);
		$editable = 0;

		foreach ($_POST['outcomes'] as $selected) {

			if($selected == 'A') {

				$outcomes[0] = 'true';

			} else if($selected == 'B') {

				$outcomes[1] = 'true';

			} else if($selected == 'C') {

				$outcomes[2] = 'true';

			} else if($selected == 'D') {

				$outcomes[3] = 'true';

			} else if($selected == 'E') {

				$outcomes[4] = 'true';

			} else if($selected == 'F') {

				$outcomes[5] = 'true';

			} else if($selected == 'G') {

				$outcomes[6] = 'true';

			} else if($selected == 'H') {

				$outcomes[7] = 'true';

			}
		}

		include 'connectdb.php';

		$date = '2016/04/01';

		$query = 'INSERT INTO records(username, deadline_id, day, type, name, hours, taskundertaken, reflection, a, b, c, d, e, f, g, h, submitted, edit, image, longi, lat) VALUES(\'Nikandros0\', '.$deadline_id.', \''.$date.'\', \''.$type.'\', \''.$name.'\', \''.$hours.'\', \''.$task.'\', \''.$reflection.'\'';

		for ($i=0; $i < 8; $i++) { 
			$query = $query.', '.$outcomes[$i];
		}

		$query = $query.', true, \''.$editable.'\', \' '.$imageLink.'\', \''.$longi.'\', \''.$lat.'\');';
		$result = mysql_query($query);

		include 'oneBack.php';

	} else {
		echo 'NO';
	}





?>