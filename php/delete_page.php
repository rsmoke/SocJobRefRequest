<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/../Support/configSocRefLetV2.php';

if (isset($_GET['delid'])) {
		try {
		// prepare and bind
			$sql = 'DELETE FROM SRL_tbl_refLetter 
							WHERE refLetter_id = ? AND refLetter_FKstudent_uniqname = ?';
			$stmt = $db->stmt_init();
			if (!$stmt->prepare($sql)) {
				$error = $stmt->error;
			} else {
				$stmt->bind_param('is', $id, $login_name);
		// set parameters and execute
				$id = (int)trim($_GET['delid']);
				$stmt->execute();
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
			}
		} catch (Exception $e) {
			$error = $e->getMessage();
			db_fatal_error('admin delete issue', $error, $sql);
			exit($user_err_message);
		}
}

if (isset($db)) {
  $db->close();
}