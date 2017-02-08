<?php
	include('checkLogin.php');
?>

<!DOCTYPE html>
<html>
	<head>
		<title>HOME - WELCOME</title>
		<script src = "scripts.js"></script>
		<link rel="stylesheet" type="text/css" href="styles\submission-form.css">
		<link rel="stylesheet" type="text/css" href="styles\headerIn.css">
		<style type="text/css">
			
		</style>
	</head>
	<body onresize = "setIdentityPosition()" onload = "setIdentityPosition()">
		<div id = "logout"></div>
		
		
		<?php
			include('identity.php');
			include('headerIn.php');
		?>
			<section id = "form-section">
				<form id = "form" class = "entry" name = "entry" action = "submitEntry.php" method = "POST">
					<div id = "left">

						<div id = "left-top">

							<div id = "lt-left">
								<div class = "fields">
									<div class = "inside-field">
										<input class = "txt-fields" type = "text" name = "date" size = "20" onkeydown="pinText(this)"/>
										<label class = "onField">Date of Activity</label>
									</div>
								</div>
								<div class = "fields">
									<div class = "inside-field">
										<div style = "height: 100%; background-color: #fff3e5; padding-top: 3px; border-radius: 20px; border-bottom: solid 2px #ff8900;">
											<label id = "type">Type of Activity:</label> 
											<select name = "type" id = "type2" onchange = "hidePin()">
												<option value = "Creativity">Creativity</option>
												<option value = "Action">Action</option>
												<option value = "Service">Service</option>
											</select>
										</div>
									</div>
								</div>
								<div class = "fields">
									<div class = "inside-field">
										<input class = "txt-fields" type = "text" name = "name" size = "20" onkeydown="pinText(this)"/>
										<label class = "onField">Name of Activity</label>
									</div> 
								</div>
								<div class = "fields">
									<div class = "inside-field">
										<input class = "txt-fields" type = "text" name = "hours" size = "20" onkeydown="pinText(this)"/>
										<label class = "onField">Hours spent</label> 
									</div>
								</div>
							</div>
							<div id = "lt-right">
								<div id = "image-uploader">
									<input accept="image/*" id = "uploader" multiple type = "file" name = "file" onchange = "changePhotoState()"/>
									<div id = "image-inspector">
										
									</div>
								</div>
							</div>
						</div>

						<div id = "left-bottom">

							<div id = "lb-1">
								<label>Task Undertaken:</label> <br />
								<textarea name = "task" class = "txt-sub-form"></textarea>
							</div>
							<div id = "lb-2">
								<label>Reflection:</label>  <br />
								<textarea name = "reflection" class = "txt-sub-form"></textarea>
							</div>
							<div id = "lb-3">
								<label>Learning Outcomes:</label>
								<input class = "check" type = "checkbox" name = "outcomes[]" value = "A">A
								<input class = "check" type = "checkbox" name = "outcomes[]" value = "B">B
								<input class = "check" type = "checkbox" name = "outcomes[]" value = "C">C
								<input class = "check" type = "checkbox" name = "outcomes[]" value = "D">D
								<input class = "check" type = "checkbox" name = "outcomes[]" value = "E">E
								<input class = "check" type = "checkbox" name = "outcomes[]" value = "F">F
								<input class = "check" type = "checkbox" name = "outcomes[]" value = "G">G
								<input class = "check" type = "checkbox" name = "outcomes[]" value = "H">H
							</div>
							<div id = "lb-4">
								<input type = "button" value = "Save"/>
								<input id = "submit2" type = "button" value = "Submit" onclick = "showDiv()"/>
								<input type = "reset" value = "Clear"/>
							</div>
						</div>
					</div>

					<div id = "right">
						<div id = "map-container"></div>
						<script src = "https://maps.googleapis.com/maps/api/js"></script>
						<script src = "map.js"></script>
					</div>
					<div id = "popup">
						<div id = "popup_background" onclick = "hideDiv(popup, popup_inside2)">
							
						</div>
						<div id = "popup_inside2">
							<div id = "select">
								<div style = "height: 20%; margin: 35% 0px;">
									<select name="deadline_id" style = "width: 90%; margin: auto 10px; outline: none;">
										<?php
											$advisor = $_SESSION['advisorname'];

											$counter = 1;
											include('connectdb.php');
											$query = 'SELECT id FROM deadlines WHERE responsibleadvisor=\''.$advisor.'\'';
											$result = mysql_query($query);


											while($row = mysql_fetch_assoc($result)) {
												echo '<option value="'.$row['id'].'">Deadline '.$counter.'</option>';

												$counter++;
											}

											mysql_close();
										?>
									</select>
								</div>
							</div>
							<input id = "submit" type = "submit" value = "Submit">

						</div>
					</div>
				</form>
			</section>
	</body>
</html>






