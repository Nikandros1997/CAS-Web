<?php
	
	include('checkLogin.php');

?>

<!DOCTYPE html>
<html>
	<head>
		<title>HOME - WELCOME</title>
		<script src = "scripts.js"></script>
		<link rel = "stylesheet" type = "text/css" href = "styles\feedback.css">
		<link rel="stylesheet" type="text/css" href="styles\headerIn.css">
	</head>
	<body onresize = "setIdentityPosition()" onload = "setIdentityPosition()">
		<?php
			include('identity.php');
			include('headerIn.php');

			include('connectdb.php');

			if($priv == 1) {
				$query = 'SELECT * FROM records WHERE username=(SELECT username FROM accounts WHERE advisor=\''.$_SESSION['username'].'\')';
			} else if ($priv == 0) {
				$query = 'SELECT * FROM records WHERE username = \''.$username.'\'';
			}

			$counter = 1;
			$result = mysql_query($query);

			echo '<section id = "feed-section">';

				if($priv == 1) {
					while($records = mysql_fetch_assoc($result)) {

						$rec_id = $records['id'];
						$query2 = 'SELECT approval FROM feedback WHERE id_record='.$rec_id;
						$feedback = mysql_query($query2);
						$approval = 0;

						while($records2 = mysql_fetch_assoc($feedback)) {
							if($records2['approval'] == 1) {
								$approval = 1;
								break;
							}
						}

						$submitted = $records['submitted'];
						$edit = $records['edit'];

						if($submitted == 1 && $edit == 0 && $approval == 0) {
							$username = $records['username'];
							$date = $records['day'];
							$type = $records['type'];
							$title = $records['name'];
							$hours = $records['hours'];
							$taskundertaken = $records['taskundertaken'];
							$reflection = $records['reflection'];
							$a = $records['a'];
							$b = $records['b'];
							$c = $records['c'];
							$d = $records['d'];
							$e = $records['e'];
							$f = $records['f'];
							$g = $records['g'];
							$h = $records['h'];
							$submitted = $records['submitted'];
						
							$query = 'SELECT name, surname, birth, gender, address, addressnumber, area FROM accounts WHERE username=\''.$username.'\'';
							$result2 = mysql_query($query);
							$studentsInfo = mysql_fetch_assoc($result2);

							$name = $studentsInfo['name'];
							$surname = $studentsInfo['surname'];
							$birth = $studentsInfo['birth'];
							$gender = $studentsInfo['gender'];
							$fullAddress = $studentsInfo['address'].' '.$studentsInfo['addressnumber'].',<br />'.$studentsInfo['area'].',<br />13561';
							

							echo	'<div id = "feed'.$counter.'" class = "feedback">

										<p class = "left">
											'.$counter.'
										</p>

										<p class = "center">
											'.$name.' '.$surname.'
										</p>

										<div class = "right">
											<p>▼</p>
										</div>

										<div class = "oneFeedback" onclick = "setBackgroundPerFeedBack(\'feed'.$counter.'\')">
										</div>

										<div class = "content">
											<div class = "studentsInfo">
												<table>
													<tr>
														<td>
															<p>Username:</p>
														</td>
														<td>
															<p>'.$username.'</p>
														</td>
													</tr>
													<tr>
														<td>
															<p>Full Name:</p>
														</td>
														<td>
															<p>'.$name.' '.$surname.'</p>
														</td>
													</tr>
													<tr>
														<td>
															<p>Date of Birth</p>
														</td>
														<td>
															<p>'.$birth.'</p>
														</td>
													</tr>
													<tr>
														<td>
															<p>Gender</p>
														</td>
														<td>
															<p>'.$gender.'</p>
														</td>
													</tr>
													<tr>
														<td>
															<p>Full Address</p>
														</td>
														<td>
															<p>'.$fullAddress.'</p>
														</td>
													</tr>
												</table>

												<div style = "position: relative; width: 100%; height: 50px; text-align: center;">
													<input type = "button" value = "See more..." style = "position: relative; margin: auto; background-color: blue; color: white;" onclick = "alert()"></input>
												</div>

											</div>
											<div class = "studentWork">
												<div class = "leftBorder"></div>
												<table>
													<tr>
														<td><label>Date: </label></td><td><p>'.$date.'</p></td>
													</tr>
													<tr>
														<td><label>Type: </label></td><td><p>'.$type.'</p></td>
													</tr>
													<tr>
														<td><label>Title: </label></td><td><p>'.$title.'</p></td>
													</tr>
													<tr>
														<td><label>Hours spent: </label></td><td><p>'.$hours.'</p></td>
													</tr>
													<tr>
														<td><label>Task Undertaken: </label></td><td><p>'.$taskundertaken.'</p></td>
													</tr>
													<tr>
														<td><label>Reflection: </label></td><td><p>'.$reflection.'</p></td>
													</tr>
													<tr>
														<td><label>Outcomes: </label></td><td><p>';

													if($a == 1) {
														echo 'A';
													}

													if($b == 1) {

														if($a == 1)
															echo ', ';

														echo 'B';
													}

													if($c == 1) {

														if($a == 1 || $b == 1)
															echo ', ';

														echo 'C';
													}

													if($d == 1) {

														if($a == 1 || $b == 1 || $c == 1)
															echo ', ';

														echo 'D';
													}

													if($e == 1) {

														if($a == 1 || $b == 1 || $c == 1 || $d == 1)
															echo ', ';

														echo 'E';
													}

													if($f == 1) {

														if($a == 1 || $b == 1 || $c == 1 || $d == 1 || $e == 1)
															echo ', ';

														echo 'F';
													}

													if($g == 1) {

														if($a == 1 || $b == 1 || $c == 1 || $d == 1 || $e == 1 || $f == 1)
															echo ', ';

														echo 'G';
													}

													if($h == 1) {

														if($a == 1 || $b == 1 || $c == 1 || $d == 1 || $e == 1 || $f == 1 || $g == 1)
															echo ', ';

														echo 'H';
													}

													echo '</p></td>
													</tr>
												</table>
											</div>

											<div class = "feedback-comments">
												<div class = "leftBorder"></div>
												<form name = "feedback" action = "submitFeedback.php" method = "POST">
													<input type = "hidden" value = "'.$username.'" name = "username" readonly></input>
													<input type = "hidden" value = "'.$rec_id.'" name = "id" readonly></input>
													<label>Comments:</label><br><br>
													<textarea class = "textarea" name = "comments"></textarea>
													<label>Confirm submission acceptance: </label>
													<input name = "acceptance" type = "checkbox" onclick = "warningAcceptance()"></input> <br>
													<input type = "submit" value = "Submit Comments"></input>
												</form>
											</div>
										</div>
									</div>';

								$counter++;
						}
					}
				} else if ($priv == 0) {
					while($record = mysql_fetch_assoc($result)) {
						$editable = $record['edit'];
						$submit = $record['submitted'];
							
						$original_id = $record['id'];
						$username = $record['username'];
						$date = $record['day'];
						$type = $record['type'];
						$title = $record['name'];
						$hours = $record['hours'];
						$taskundertaken = $record['taskundertaken'];
						$reflection = $record['reflection'];
						$a = $record['a'];
						$b = $record['b'];
						$c = $record['c'];
						$d = $record['d'];
						$e = $record['e'];
						$f = $record['f'];
						$g = $record['g'];
						$h = $record['h'];
						//if this is 0 then us a radio button to choose store / submit.
						$submitted = $record['submitted'];
						$editable = $record['edit'];

						$query2 = 'SELECT approval FROM feedback WHERE id_record=\''.$original_id.'\'';
						$result2 = mysql_query($query2);

						$img_met = '/cas/proj-images/No.png';

						$approval = 0;

						while($feedback = mysql_fetch_assoc($result2)) {
							if($feedback['approval'] == 1) {
								$approval = 1;
								break;
							}
						}

						if($approval == 1) {
							$img_met = '/cas/proj-images/stick.png';
						}

						if(($submit == 0 && $editable == 1 && $approval == 0) || ($submit == 1 && $editable == 0 && $approval == 1) || ($submit == 1 && $editable == 1 && $approval == 0)) {
							echo	'<div id = "feed'.$counter.'" class = "feedback">

										<p class = "left">
											'.$counter.'
										</p>

										<p class = "center">
											'.$date.' - Approved: <img src = "'.$img_met.'" style = "height: 14px;">
										</p>

										<div class = "right">
											<p>▼</p>
										</div>

										<div class = "oneFeedback" onclick = "setBackgroundPerFeedBack(\'feed'.$counter.'\')">
										</div>

										<div class = "content">
											<div class = "teacherFeedback">
												<div style = "text-align: center;">Teacher Feedback</div>';

								//asks for the records, which pairs with the specific feedback
								$query2 = 'SELECT comments FROM feedback WHERE id_record=\''.$original_id.'\'';
								$result2 = mysql_query($query2);
								$feedbackCounter = 0;
								while($feedback = mysql_fetch_assoc($result2)) {
									$feedbackCounter++;
									$comments = $feedback['comments'];
									echo '<p>'.$feedbackCounter.') '.$comments.'</p>';
								}

								echo 	'</div>
											<div class = "studentWork">
												<div class = "leftBorder"></div>
												<table>
													<tr>
														<td><label>Date: </label></td><td><p>'.$date.'</p></td>
													</tr>
													<tr>
														<td><label>Type: </label></td><td><p>'.$type.'</p></td>
													</tr>
													<tr>
														<td><label>Title: </label></td><td><p';
														if($editable == 1) {
															echo ' ondblclick="textareaCreation(this)"';
														}
														echo 'id = "titleInit">'.$title.'</p></td>
													</tr>
													<tr>
														<td><label>Hours spent: </label></td><td><p';
														if($editable == 1) {
															echo ' ondblclick="textareaCreation(this)"';
														}
														echo '>'.$hours.'</p></td>
													</tr>
													<tr>
														<td><label>Task Undertaken: </label></td><td><p';
														if($editable == 1) {
															echo ' ondblclick="textareaCreation(this)"';
														}
														echo '>'.$taskundertaken.'</p></td>
													</tr>
													<tr>
														<td><label>Reflection: </label></td><td><p';
														if($editable == 1) {
															echo ' ondblclick="textareaCreation(this)"';
														}
														echo '>'.$reflection.'</p></td>
													</tr>
													<tr>
														<td><label>Outcomes: </label></td><td><p>';

													if($a == 1) {
														echo 'A';
													}

													if($b == 1) {

														if($a == 1)
															echo ', ';

														echo 'B';
													}

													if($c == 1) {

														if($a == 1 || $b == 1)
															echo ', ';

														echo 'C';
													}

													if($d == 1) {

														if($a == 1 || $b == 1 || $c == 1)
															echo ', ';

														echo 'D';
													}

													if($e == 1) {

														if($a == 1 || $b == 1 || $c == 1 || $d == 1)
															echo ', ';

														echo 'E';
													}

													if($f == 1) {

														if($a == 1 || $b == 1 || $c == 1 || $d == 1 || $e == 1)
															echo ', ';

														echo 'F';
													}

													if($g == 1) {

														if($a == 1 || $b == 1 || $c == 1 || $d == 1 || $e == 1 || $f == 1)
															echo ', ';

														echo 'G';
													}

													if($h == 1) {

														if($a == 1 || $b == 1 || $c == 1 || $d == 1 || $e == 1 || $f == 1 || $g == 1)
															echo ', ';

														echo 'H';
													}

													echo '</p></td>
													</tr>
												</table>';

												if($editable == 1) {
													echo '<u onclick = "alert(\'In order to edit the task undertaken and the reflection, double click the respective fields.\')">Now you can edit the entry.</u><br>';
												}
										echo '	</div>


										<div class = "blackArea">
											<div class = "leftBorder"></div>
											</div>
										</div>
									</div>';

								$counter++;
							}
						}
			}
			echo '</section>';
		?>
	</body>
</html>