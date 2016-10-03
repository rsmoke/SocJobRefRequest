<?php
require_once($_SERVER["DOCUMENT_ROOT"] . '/../Support/configSocRefLetV2.php');

	$fullName = ldapGleaner($login_name);
// prepare and bind
$stmt = $db->prepare('INSERT IGNORE INTO SRL_tbl_student (student_uniqname, student_Fname, student_Lname) VALUES( ?,?,?)');
$stmt->bind_param('sss', $login_name, $fullName[0], $fullName[1]);

// set parameters and execute
if (!$stmt->execute())
		  {
        die('Error:  ' . mysqli_error($db));
		  }

// prepare and bind
$sql = $db->prepare('INSERT INTO SRL_tbl_refLetter (refLetter_FKstudent_uniqname, refLetter_requestDate, refLetter_dueDate, refLetter_positionTitle,
									refLetter_type,refLetter_title,refLetter_Fname,refLetter_Mname,refLetter_Lname,refLetter_suffix,
									refLetter_Email,refLetter_URL,refLetter_institute_name,refLetter_institute_dept,refLetter_institute_room,refLetter_institute_street,
									refLetter_institute_city,refLetter_institute_state,refLetter_institute_country,refLetter_institute_zipcode,refLetter_institute_phone,
									refLetter_specialInstx,refLetter_FKwriterID,refLetter_FKwriterID2,refLetter_FKwriterID3,refLetter_FKwriterID4,refLetter_FKwriterID5)
VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)'
);
$sql->bind_param('sssssssssssssssssssssssssss', $_POST['rqstrUniq'], $_POST['rqstrRqstDate'], $_POST['dueDate'], $_POST['posTitle'], $_POST['letterType'], $_POST['recipTitle'], $_POST['recipFname'], $_POST['recipMname'], $_POST['recipLname'],
  $_POST['recipSuffix'], $_POST['recipEmail'], $_POST['recipURL'], $_POST['recipInst'], $_POST['recipDept'], $_POST['recipRoom'], $_POST['recipStreet'], $_POST['recipCity'],
  $_POST['recipState'], $_POST['recipCountry'], $_POST['recipZip'], $_POST['recipPhone'], $_POST['recipSpInstx'], $_POST['writerID'], $_POST['writerID2'], $_POST['writerID3'],
  $_POST['writerID4'], $_POST['writerID5']);

// set parameters and execute
if (!$sql->execute())
  {
    die('Error:  ' . mysqli_error($db));
  }
  ?>

<html>
<body>
<div style="width:320px;margin:50px;padding:10px;border-style:ridge;border-width:5px">
		You have submitted your request successfully <br />
  <a style="color:sienna;margin-left:60px" href="../index.php">Return to main page</a>
</div><!-- infoBanner -->
</body>
</html>
