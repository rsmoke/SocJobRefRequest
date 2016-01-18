<?php
require_once($_SERVER["DOCUMENT_ROOT"] . '/../Support/configSocRefLetV2.php');

$recordNum = intval(trim($_POST['recordID']));
$sentON1 = mysqli_real_escape_string($db, trim($_POST['sentDate1']));
$sentON2 = mysqli_real_escape_string($db, trim($_POST['sentDate2']));
$sentON3 = mysqli_real_escape_string($db, trim($_POST['sentDate3']));
$sentON4 = mysqli_real_escape_string($db, trim($_POST['sentDate4']));
$sentON5 = mysqli_real_escape_string($db, trim($_POST['sentDate5']));
$memos = mysqli_real_escape_string($db, trim($_POST['comments']));
$title = mysqli_real_escape_string($db, trim($_POST['posTitle']));
$flag = mysqli_real_escape_string($db, trim($_POST['flag']));

$sql="UPDATE SRL_tbl_refLetter
		SET refLetter_sentDate1 = '$sentON1',refLetter_sentDate2 = '$sentON2',refLetter_sentDate3 = '$sentON3',refLetter_sentDate4 = '$sentON4',refLetter_sentDate5 = '$sentON5', refLetter_message = '$memos', refLetter_positionTitle = '$title', refLetter_flag = '$flag'
		WHERE refLetter_id = '$recordNum'";
	
$resSQL = mysqli_query($db,$sql);	
	if (!$resSQL)
	  {
	  	printf("Errormessage: %s\n", mysqli_error($db));
	  	die ("<html><head><link rel='stylesheet' href='../css/jobRef.css' type='text/css'></link></head><body>
		<div id='infoBanner'> 
		The changes failed to be submitted<br />
		<span id='infoBannerBtn'><a href='../ADMIN/index.php'>Return to main page</a></span>
		</div><!-- infoBanner -->
		</body></html>");
	  } 
	  header("Location: ../ADMIN/index.php",TRUE,301);
	  exit;

mysqli_close($db);


