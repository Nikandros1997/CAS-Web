<nav>
	<ul>
		<?php

			include('connectdb.php');

			if($priv == 1) {
				$query = 'SELECT COUNT(*) AS number FROM records WHERE username=(SELECT username FROM accounts WHERE advisor=\''.$_SESSION['username'].'\' AND submitted=1 AND edit=0)';
				$result = mysql_query($query);
				$number = mysql_fetch_assoc($result);

				$query = 'SELECT COUNT(*) AS number2 FROM feedback WHERE approval=1 AND writtenby=\''.$_SESSION['username'].'\'';
				$result = mysql_query($query);
				$number2 = mysql_fetch_assoc($result);

				$total = $number['number'] - $number2['number2'];

				$entries = 'Entries Submitted ('.$total.')';
			} else {
				$query = 'SELECT id, submitted, edit FROM records WHERE username = \''.$username.'\'';
				$result = mysql_query($query);
				$numberFeed = 0;
				while($record = mysql_fetch_assoc($result)) {
					$original_id = $record['id'];
					$submit = $record['submitted'];
					$editable = $record['edit'];

					$query2 = 'SELECT approval FROM feedback WHERE id_record=\''.$original_id.'\'';
					$result2 = mysql_query($query2);
					$approval = 0;

					while($feedback = mysql_fetch_assoc($result2)) {
						if($feedback['approval'] == 1) {
							$approval = 1;
							break;
						}
					}

					if(($submit == 0 && $editable == 1 && $approval == 0) || ($submit == 1 && $editable == 0 && $approval == 1) || ($submit == 1 && $editable == 1 && $approval == 0)) {
						$numberFeed++;
					}


				}
				$entries = 'Feedback ('.$numberFeed.')';
			}


			$currentPage = basename($_SERVER['PHP_SELF']);
			$personal = '';
			$deadlines = '';
			$feedback = '';
			$submit = '';

			if(strcmp($currentPage, 'personal.php') == 0) {
				$personal = 'current';
			} else if (strcmp($currentPage, 'deadlines.php') == 0) {
				$deadlines = 'current';
			} else if (strcmp($currentPage, 'feedback.php') == 0) {
				$feedback = 'current';
			} else if(strcmp($currentPage, 'submission.php') == 0) {
				$submit = 'current';
			}

			echo
			'
				<li class = "'.$personal.'"><a href="/cas/personal.php">

					Personal Info
				</a>
			</li>
				<li class = "'.$deadlines.'"><a href="/cas/deadlines.php">Deadlines</a>
			</li>
			<li class = "'.$feedback.'"><a href="/cas/feedback.php">'.$entries.'</a>
				</li>';

			mysql_close();

			if($priv == 0) {
			echo '
					<li class = "'.$submit.'"><a href="/cas/submission.php">Submission form</a></li>';
			}
			echo '<!--li>
				<a href="/cas/page.php?option=settings"><img style = "position: relative; height: 40px; top: 14px; left: -4px;" src="https://cdn3.iconfinder.com/data/icons/fez/512/FEZ-04-512.png"></a>
			</li-->';
		?>
	</ul>
</nav>