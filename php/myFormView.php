<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/../Support/configSocRefLetV2.php';

// prepare and bind
$query = $db->prepare('SELECT FK_writer_uniqname FROM SRL_tbl_StudentToWriter WHERE FK_student_uniqname = ? ');
$query->bind_param('s', $login_name);

// set parameters and execute
$query->execute();
		$result = array();

$query->bind_result($name);
while ($query->fetch()) {
  $writerName = ldapGleaner($name);
  array_push($result, array('writer' => $name, 'fName' => $writerName[0], 'lName' => $writerName[1]));
}
		echo (json_encode(array('result' => $result)));


