<?php
	
	function delete($deadlineForDeletion, $idForDeletion) {

		echo $query = 'DELETE FROM deadlines WHERE deadline = \''.$deadlineForDeletion.'\' AND id='.$idForDeletion;

		$result = mysql_query($query);

		mysql_close();

		include 'oneBack.php';
	}
	

	function migrate($idForDeletion, $targetId, $deadlineForDeletion) {

		$query = 'UPDATE records SET deadline_id=\''.$targetId.'\' WHERE deadline_id=\''.$idForDeletion.'\'';

		$result = mysql_query($query);
		delete($deadlineForDeletion, $idForDeletion);
	}

	function getDeadlineId() {
		$deadlineForDeletion = $_GET['date'];
		$targetDeadline = $_GET['migration'];

		$query = 'SELECT id FROM deadlines WHERE deadline=\''.$deadlineForDeletion.'\'';
		include('connectdb.php');
		$result = mysql_query($query);
		$row = mysql_fetch_assoc($result);
		$idForDeletion = $row['id'];

		$query = 'SELECT id FROM deadlines WHERE deadline=\''.$targetDeadline.'\'';
		$result = mysql_query($query);
		$row = mysql_fetch_assoc($result);
		$targetId = $row['id'];

		migrate($idForDeletion, $targetId, $deadlineForDeletion);
	}

	getDeadlineId();


	
	
?>