<?php
	
	include('checkLogin.php');

?>

<!DOCTYPE html>
<html>
	<head>
		<title>HOME - WELCOME</title>
		<script src = "scripts.js"></script>
		<link rel="stylesheet" type="text/css" href="styles\deadlines.css">
		<link rel="stylesheet" type="text/css" href="styles\headerIn.css">
	</head>
	<body onresize = "setIdentityPosition()" onload = "setIdentityPosition()">
		<?php
			include('identity.php');
			include('headerIn.php');

			echo	'<section id = "dead-section">
						<div id = "wrap" style = "1000px">
							<div id = "container" style = "min-width: 1000px; margin-top: 0.5%; padding-top: 0.5%;">
								<table style = "font-size: 24px; border: 1px solid black; padding: 10px; min-width: 1000px; margin: 0px auto; border-radius: 10px; background-color: wheat; box-shadow: inset 0px 1px 5px #000; max-width: 800px;">';

						include('connectdb.php');

						if($priv == 1) {
 							$query = 'SELECT * FROM deadlines WHERE responsibleAdvisor=\''.$username.'\'';
						} else if($priv == 0) {
							$query = 'SELECT * FROM deadlines WHERE responsibleAdvisor=\''.$_SESSION['advisorname'].'\'';
						}

						$result = mysql_query($query);
						$counter = 1;

						echo		'<tr>
										<td>
											<p>No.</p>
										</td>
										<td>
											<p>Date</p>
										</td>
										<td>
											<p>Comments</p>
										</td>
										<td>';
											if($priv != 1)
												echo '<p>Met</p>';
						echo			'</td>
										<td>
											<p style = "float: right">Requirements</p>
										</td>
									</tr>';

						while($row = mysql_fetch_assoc($result)) {

							$deadlineId = $row['id'];
							$date = $row['deadline'];
							$comments = $row['comments'];
							// create a .js query in order to get this data using the id of the deadline.
							$creativity = $row['creativity'];
							$action = $row['action'];
							$service = $row['service'];

							$query2 = 'SELECT hours, type FROM records WHERE username=\''.$username.'\' AND deadline_id=\''.$deadlineId.'\'';
							$result2 = mysql_query($query2);
							$totalCHours = 0;
							$totalAHours = 0;
							$totalSHours = 0;
							$imageLink = 'http://localhost/cas/proj-images/No.png';

							if($creativity == 0 && $action == 0 && $service == 0 && $priv != 1) {
								$text = 'No requirements yet. Ask Advisor.';
							} else {
								while($hours = mysql_fetch_assoc($result2)) {
									$h = $hours['hours'];
									$type = $hours['type'];

									if(strcmp($type, 'Creativity') == 0) {
										$totalCHours += $h;
									} else if(strcmp($type, 'Action') == 0) {
										$totalAHours += $h;
									} else if(strcmp($type, 'Service') == 0) {
										$totalSHours += $h;
									}
								}

								if($totalCHours == 0 && $totalAHours == 0 && $totalSHours == 0) {
									$text = 'Creativity: '.$creativity.', Action, '.$action.' , Service: '.$service;
								} else {
									$text = 'Creativity: '.$totalCHours.'/'.$creativity.', Action: '.$totalAHours.'/'.$action.', Service: '.$totalSHours.'/'.$service.'.';
								}

								if(($totalCHours >= $creativity) && ($totalAHours >= $action) &&  ($totalSHours >= $service)) {
									$imageLink = 'http://localhost/cas/proj-images/stick.png';
								}
							}

							

							if($counter%2 == 0) {
								$color = 'white';
							} else {
								$color = '#cccccc';
							}

							// a single deadline
							echo	'<tr style = "background-color: '.$color.';">
										<td>
											<p>'.$counter.'</p>
										</td>
										<td style = "white-space: nowrap;">
											<p>'.$date.'</p>
										</td>
										<td>
											<p>'.$comments.'</p>
										</td>
										<td>';
											if($priv != 1) {
							echo				'<img src = "'.$imageLink.'" style = "height: 25px">';
											} else {
							echo				'<button value = "'.$deadlineId.'" class = "edit" id = "trig-btn" onclick = "showDiv()">Edit</button>
												<button class = "delete" onclick = "deleteDeadline(\''.$date.'\')"">Delete</button>';
											}
							echo 		'</td>
										<td style = "white-space: nowrap;">
											'.$text.'
										</td>
									</tr>';
								
							// a single deadline

							$counter++;
						}

						if($priv == 1) {
							echo	'<tr style = "background-color: rgba(0, 179, 146, 0.2);">
										<td>
											<p>New</p>
										</td>
										<form name  = "newDeadline" action = "/cas/newdead.php" onsubmit = "return formValidationNewDeadline()">
											<td style = "white-space: nowrap;">
												<select name = "date" id = "date">

												</select>
												<select name = "month" id = "month">

												</select>
												<select name = "year" id = "year">

												</select>
											</td>
											<td>
												<input type = "text" name = "comments">
											</td>
											<td>
												<button type = "submit">Submit</button>
											</td>
											<td>
											</td>
										</form>
									</tr>';
						}

						echo	'</table>
							</div>
						</div>
					</section>';

			if($priv == 1) {
				echo	'<div id = "popup">
							<div id = "popup_background" onclick = "hideDiv(popup, popup_inside)">
								
							</div>
							<div id = "popup_inside">
								<form action = "editDeadline.php" method = "GET">
									<table id = "form">
										<tr>
											<td>
												Change date:
											</td>
											<td>
												Creativity:
											</td>
											<td>
												<input name = "creativity" type = "text" size = "18"></input>
											</td>
										</tr>
										<tr>
											<td>
												<input name = "date" type = "text" size = "18"></input>
											</td>
											<td>
												Action:
											</td>
											<td>
												<input name = "action" type = "text" size = "18"></input>
											</td>
										</tr>
										<tr>
											<td>
												Comments:
											</td>
											<td>
												Service:
											</td>
											<td>
												<input name = "service" type = "text" size = "18"></input>
											</td>
										</tr>
										<tr>
											<td colspan = "3">
												<textarea name = "comments" style = "margin: 0px; height: 49px; width: 311px; border: none; resize: none;"></textarea>
											</td>
										</tr>
										<tr>
											<td style = "text-align: center;" colspan = "2">
												<button type = "submit">Submit</button>
											</td>
											<td style = "text-align: left;">
												<button type = "reset">Cancel</button>
											</td>
										</tr>
									</table>
								</form>
							</div>
						</div>';
			}
		?>
	</body>
</html>