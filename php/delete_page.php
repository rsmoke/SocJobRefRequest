<?php
require_once("../../../Support/configSocRefLetV2.php");

$id = intval(trim($_GET["delid"]));

$queryDel = "DELETE FROM SRL_tbl_refLetter where refLetter_id = $id AND refLetter_FKstudent_uniqname = '$login_name'";

if (!mysqli_query($db,$queryDel))
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