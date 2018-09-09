<?php 
	//SAVEME PHP Version 1.0
	// this is the main file for managing the frequency
	require 'config.php';
	require 'classSAVEME.php';

	if(isset($_REQUEST['now'])){ // this is for an instant backup
		include('ToFile.php');
	}else{

		// $time_between_backups
		$myFile = "date_NEVER_DELETE_THIS_FILE.txt";
		$myFileLink = fopen($myFile, 'r');
		$myFileContents = fread($myFileLink, filesize($myFile));
		fclose($myFileLink);
		$d1 = explode(' ', $myFileContents)[0];
		$d2 = date('Y-m-d');

		$date1 = date_create($d1);
		$date2 = date_create($d2);

		//difference between two dates
		$diff = date_diff($date1,$date2);

		if ($diff->format("%a") >= $time_between_backups){
			include('ToFile.php');
		}
	}

?>