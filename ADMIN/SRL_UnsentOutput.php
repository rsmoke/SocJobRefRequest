<?php
require_once("../../../Support/configSocRefLetV2.php");

// output headers so that the file is downloaded rather than displayed
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename="' . $deptLngName . 'RefLetterUNSENT.csv"');
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
					   
// fetch the data
$sql = "SELECT refLetter_id,refLetter_dueDate,refLetter_FKstudent_uniqname,
		refLetter_type, refLetter_specialInstx,
		refLetter_requestDate, refLetter_positionTitle, 
		refLetter_title, refLetter_Fname, refLetter_Mname, refLetter_Lname, refLetter_suffix,
		refLetter_Email, refLetter_URL, refLetter_institute_name, refLetter_institute_dept, refLetter_institute_room, refLetter_institute_street,
		refLetter_institute_city, refLetter_institute_state, refLetter_institute_zipcode, refLetter_institute_country, refLetter_institute_phone,
		refLetter_FKwriterID, refLetter_sentDate1,  refLetter_FKwriterID2, refLetter_sentDate2, refLetter_FKwriterID3, refLetter_sentDate3, refLetter_FKwriterID4, refLetter_sentDate4, refLetter_FKwriterID5, refLetter_sentDate5
FROM SRL_tbl_refLetter
WHERE coalesce(refLetter_sentDate1, refLetter_sentDate2 , refLetter_sentDate3, refLetter_sentDate4, refLetter_sentDate5) IS NULL

UNION

SELECT refLetter_id,refLetter_dueDate,refLetter_FKstudent_uniqname,
		refLetter_type, refLetter_specialInstx,
		refLetter_requestDate, refLetter_positionTitle, 
		refLetter_title, refLetter_Fname, refLetter_Mname, refLetter_Lname, refLetter_suffix,
		refLetter_Email, refLetter_URL, refLetter_institute_name, refLetter_institute_dept, refLetter_institute_room, refLetter_institute_street,
		refLetter_institute_city, refLetter_institute_state, refLetter_institute_zipcode, refLetter_institute_country, refLetter_institute_phone,
		refLetter_FKwriterID, refLetter_sentDate1,  refLetter_FKwriterID2, refLetter_sentDate2, refLetter_FKwriterID3, refLetter_sentDate3, refLetter_FKwriterID4, refLetter_sentDate4, refLetter_FKwriterID5, refLetter_sentDate5
FROM SRL_tbl_refLetter 
WHERE (refLetter_FKwriterID != 'NotSelected' AND refLetter_sentDate1 = 0000-00-00) OR (refLetter_FKwriterID2 != 'NotSelected' AND refLetter_sentDate2 = 0000-00-00) OR (refLetter_FKwriterID3 != 'NotSelected' AND refLetter_sentDate3 = 0000-00-00) OR (refLetter_FKwriterID4 != 'NotSelected' AND refLetter_sentDate4 = 0000-00-00) OR (refLetter_FKwriterID5 != 'NotSelected' AND refLetter_sentDate5 = 0000-00-00)

ORDER BY refLetter_dueDate ASC";
			
$rowsSRLoutputFile = mysqli_query($db,$sql);

// loop over the rows, outputting them
while ($row = mysqli_fetch_assoc($rowsSRLoutputFile)) fputcsv($output, $row);

mysqli_free_result($rowsSRLoutputFile);
mysqli_close($db);
