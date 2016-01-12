<?php
require_once("../../../Support/configSocRefLetV2.php");

// output headers so that the file is downloaded rather than displayed
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename="' . $deptLngName . 'RefLetterCOMPLETE.csv"');
header("Pragma: no-cache");
header("Expires: 0");

// create a file pointer connected to the output stream
$output = fopen('php://output', 'w');

// output the column headings
fputcsv($output, array('LetterID','Due Date','Requested_By',
					   'Letter Type', 'Special Instx', 
					   'Submitted Date', 'Position Title', 
					   'Recipient Title', 'Recipient FirstName', 'Recipient MiddleName', 'Recipient LastName', 'Recipient Suffix',
					   'Recipient Email', 'Recipient URL', 'Institution Name', 'Institution Dept', 'Institution Room', 'Institution Street',
					   'Institution City', 'Institution State', 'Institution ZipCode', 'Institution Country', 'Institution Phone',
					   'First Writer', 'First Writer - SentOn', 'Second Writer', 'Second Writer - SentOn', 'Third Writer', 'Third Writer - SentOn', 'Fourth Writer', 'Fourth Writer - SentOn', 'Fifth Writer', 'Fifth Writer - SentOn'
					   ));
//fetch the data
$sql = "SELECT Letter.refLetter_id,Letter.refLetter_dueDate,Letter.refLetter_FKstudent_uniqname,
	Letter.refLetter_type, Letter.refLetter_specialInstx,
	Letter.refLetter_requestDate, Letter.refLetter_positionTitle, 
	Letter.refLetter_title, Letter.refLetter_Fname, Letter.refLetter_Mname, Letter.refLetter_Lname, Letter.refLetter_suffix,
	Letter.refLetter_Email, Letter.refLetter_URL, Letter.refLetter_institute_name, Letter.refLetter_institute_dept, Letter.refLetter_institute_room, Letter.refLetter_institute_street,
	Letter.refLetter_institute_city, Letter.refLetter_institute_state, Letter.refLetter_institute_zipcode, Letter.refLetter_institute_country, Letter.refLetter_institute_phone,
	Letter.refLetter_FKwriterID, Letter.refLetter_sentDate1,  Letter.refLetter_FKwriterID2, Letter.refLetter_sentDate2, Letter.refLetter_FKwriterID3, Letter.refLetter_sentDate3, Letter.refLetter_FKwriterID4, Letter.refLetter_sentDate4, Letter.refLetter_FKwriterID5, Letter.refLetter_sentDate5
	FROM SRL_tbl_refLetter AS Letter
	ORDER BY Letter.refLetter_FKstudent_uniqname ASC,  Letter.refLetter_institute_name ASC";					   
// fetch the data
$rowsSRLoutputFile = mysqli_query($db,$sql);

// loop over the rows, outputting them
while ($row = mysqli_fetch_assoc($rowsSRLoutputFile)) fputcsv($output, $row);

mysqli_free_result($rowsSRLoutputFile);
mysqli_close($db);
