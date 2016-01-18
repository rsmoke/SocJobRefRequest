<?php
require_once($_SERVER["DOCUMENT_ROOT"] . '/../Support/configSocRefLetV2.php');

		$queryAdmin = "SELECT * FROM SRL_tbl_Admin ORDER BY AdminUniqname ASC";
		
		$resAdmin = mysqli_query($db,$queryAdmin);
		$resultAdmin = array();
		
		if (!$resAdmin){
			die("Database query failed.");
			}
		while($admins = mysqli_fetch_assoc($resAdmin)){
			$fullName = ldapGleaner($admins["AdminUniqname"]);

			array_push($resultAdmin, array('admin' =>$admins["AdminUniqname"],'adminID' =>$admins["id"], 'adminFname'=>$fullName[0], 'adminLname'=>$fullName[1]));
		}
		echo (json_encode(array("result" => $resultAdmin)));

		mysqli_free_result($resAdmin);
		mysqli_close($db);
