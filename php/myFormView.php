<?php
require_once($_SERVER["DOCUMENT_ROOT"] . '/../Support/configSocRefLetV2.php');

		$query = "SELECT * FROM SRL_tbl_StudentToWriter WHERE FK_student_uniqname = '$login_name' ";
		
		$res = mysqli_query($db,$query);
		$result = array();
		
		if (!$res){
			die("Database query failed.");
			}
		while($writers = mysqli_fetch_assoc($res)){
			$writerName = ldapGleaner($writers["FK_writer_uniqname"]);
			array_push($result, array('writer' =>$writers["FK_writer_uniqname"], 'fName' => $writerName[0], 'lName' => $writerName[1]));
		}
		echo (json_encode(array("result" => $result)));

		mysqli_free_result($res);
		mysqli_close($db);

