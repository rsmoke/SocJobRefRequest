<?php
require_once($_SERVER["DOCUMENT_ROOT"] . '/../Support/configSocRefLetV2.php');


// output headers so that the file is downloaded rather than displayed
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename="RefLetterFor-' . $login_name . '.csv"');
header("Pragma: no-cache");
header("Expires: 0");

// create a file pointer connected to the output stream
$output = fopen('php://output', 'w');

// output the column headings
fputcsv($output, array('Due Date',
					   'Letter Type', 'Special Instx', 
					   'Submitted Date', 'Position Title', 
					   'Recipient Title', 'Recipient FirstName', 'Recipient MiddleName', 'Recipient LastName', 'Recipient Suffix',
					   'Recipient Email', 'Recipient URL', 'Institution Name', 'Institution Dept', 'Institution Room', 'Institution Street',
					   'Institution City', 'Institution State', 'Institution ZipCode', 'Institution Country', 'Institution Phone',
					   'First Writer', 'Second Writer', 'Third Writer', 'Fourth Writer', 'Fifth Writer'
					   ));

// fetch the data
$sql = "SELECT Letter.refLetter_dueDate,
				Letter.refLetter_type, Letter.refLetter_specialInstx,
				Letter.refLetter_requestDate, Letter.refLetter_positionTitle, 
				Letter.refLetter_title, Letter.refLetter_Fname, Letter.refLetter_Mname, Letter.refLetter_Lname, Letter.refLetter_suffix,
				Letter.refLetter_Email, Letter.refLetter_URL, Letter.refLetter_institute_name, Letter.refLetter_institute_dept, Letter.refLetter_institute_room, Letter.refLetter_institute_street,
				Letter.refLetter_institute_city, Letter.refLetter_institute_state, Letter.refLetter_institute_zipcode, Letter.refLetter_institute_country, Letter.refLetter_institute_phone,
				refLetter_FKwriterID, refLetter_FKwriterID2, refLetter_FKwriterID3, refLetter_FKwriterID4, refLetter_FKwriterID5 
			FROM SRL_tbl_refLetter AS Letter
			WHERE Letter.refLetter_FKstudent_uniqname = '$login_name'
			ORDER BY Letter.refLetter_requestDate ASC";
			
$rowsIndOutFile = mysqli_query($db,$sql);

// loop over the rows, outputting them
while ($row = mysqli_fetch_assoc($rowsIndOutFile)) fputcsv($output, $row);

// Free result set
mysqli_free_result($rowsIndOutFile);

mysqli_close($db);
