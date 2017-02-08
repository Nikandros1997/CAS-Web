<?php
	if($priv == 1) {
		$identity = 'Advisor';
	} else {
		$identity = 'Student';
	}
	echo '<div id = "solution-wrapper">
			<div class="card-container">
			  <div class="card">
			    <div class="side"><h1 id = "identity">'.$identity.'</h1></div>
			    <div class="side back"><h1><a style = "color: black;" href = "/cas/logout.php">Log Out</a></h1></div>
			  </div>
			</div>
		</div>';
?>