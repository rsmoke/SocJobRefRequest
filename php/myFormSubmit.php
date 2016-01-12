<?php
require_once("../../../Support/configSocRefLetV2.php");

$writer = $_POST['name'];

	if (mysqli_query($db, "INSERT INTO SRL_tbl_StudentToWriter (FK_student_uniqname, FK_writer_uniqname) VALUES('$login_name','$writer')")) {
		echo "Successfully Inserted   <b>" .  $writer . "</b>";
	}
	else {
		echo "Insertion Failed";
	}
		
