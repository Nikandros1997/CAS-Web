<?php

	//sends to the previous page
	function goback()
	{
	    header("Location: {$_SERVER['HTTP_REFERER']}");
	    exit;
	}
	
	goback();

?>