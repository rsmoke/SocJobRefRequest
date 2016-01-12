<?php
require_once("../../../Support/configSocRefLetV2.php");

$admin = mysqli_real_escape_string($db, $_POST['name']);

	if (mysqli_query($db, "INSERT INTO SRL_tbl_Admin (addedBy, AdminUniqname) VALUES('$login_name','$admin')"))
		echo "Successfully Inserted   <b>" .  $admin . "</b>";
	else
		echo "Insertion Failed";
		
		

