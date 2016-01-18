<?php
require_once($_SERVER["DOCUMENT_ROOT"] . '/../Support/configSocRefLetV2.php');

// prepare and bind
    $stmt = $db->prepare("INSERT INTO SRL_tbl_StudentToWriter (FK_student_uniqname, FK_writer_uniqname) VALUES(?,?)");
    $stmt->bind_param("ss",$login_name, $writer);

// set parameters and execute
    $writer = $_POST['name'];
    if($stmt->execute()){
		echo "Successfully Inserted   <b>" .  $writer . "</b>";
	}
	else {
		echo "Insertion Failed";
	}

