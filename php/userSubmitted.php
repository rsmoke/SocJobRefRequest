<?php
		$query = "SELECT *
				  FROM SRL_tbl_refLetter AS Letter
				  WHERE Letter.refLetter_FKstudent_uniqname = '$login_name'";

		$return = array();

if (!$ret = $db->query($query)) {
  db_fatal_error("data select issue", $db->error, $query);
  exit($user_err_message);
}

echo "<table id='userSub'>";

echo '<tr><th>ID</th><th>Institution</th><th>Requested</th><th>Title</th><th align="center">Delete</th></tr>';
		while($letters= mysqli_fetch_assoc($ret)){

      echo '<tr><td><a href= "php/SRL_View.php?id=', $letters["refLetter_id"], '"target="_blank">', $letters["refLetter_id"] ,'</a></td><td>', $letters["refLetter_institute_name"],'</td><td>',
						$letters["refLetter_requestDate"],'</td><td>',
						 $letters["refLetter_positionTitle"],'</td><td align="center"><a href= "php/delete_page.php?delid=', $letters["refLetter_id"], '"><span style="color:red;font-weight:bold">X</span></a></td></tr>';
		};
echo '</table>';

$db->close();
