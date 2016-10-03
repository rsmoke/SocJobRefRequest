<?php
require_once($_SERVER["DOCUMENT_ROOT"] . '/../Support/configSocRefLetV2.php');

$id = (int)trim($_GET["delid"]);

// prepare and bind
$stmt = $db->prepare("DELETE FROM SRL_tbl_refLetter WHERE refLetter_id = ? AND refLetter_FKstudent_uniqname = ?");
$stmt->bind_param("is", $id, $login_name);
// set parameters and execute
$id = (int)trim($_GET["delid"]);

if (!$stmt->execute())
  {
  die('Error: ' . mysqli_error($db));
  }

?>

<html>
<body>
	<div style="width:280px;margin:50px;padding:10px;border-style:ridge;border-width:5px">  
		You have deleted your request successfully <br />
		<a style="color:sienna;margin-left:60px" href='../index.php'>Return to main page</a>
	</div><!-- infoBanner -->	
</body>
</html>

<?php
mysqli_close($db);
?>