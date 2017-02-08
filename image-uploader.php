<?php

		//foreach($_FILES['file']['name'] as $name) {
			$name = $_FILES['file']['name'];
			$name = str_replace(' ', '', $_FILES['file']['name']);
			$_FILES['file']['name'] = $name;

			$location = 'uploads/';
			//if(!is_null($name))
			//	echo $name;
			//else
			//	echo 'No file';
			//$size = $_FILES['file']['size'];
			//$type = $_FILES['file']['type'];

			$tmp_name = $_FILES['file']['tmp_name'];
			move_uploaded_file($tmp_name, $location.$name);







			//$error = $_FILES['file']['error'];

			/*if(isset($name)) {
				if(!empty($name)) {


					if(move_uploaded_file($tmp_name, $location.$name)) {
						echo 'Uploaded<br>';
						echo '<img src = "'.$location.$name.'" height="100"/>';
					}
				} else {
					echo 'Please choose a file.';
				}
			}*/
		//}
?>