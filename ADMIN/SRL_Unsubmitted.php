<?php
	$queryUnsent = "SELECT *
					FROM (
					SELECT refLetter_id, refLetter_FKstudent_uniqname, refLetter_institute_name, refLetter_dueDate, refLetter_positionTitle, refLetter_flag
					FROM SRL_tbl_refLetter
					WHERE coalesce(refLetter_sentDate1, refLetter_sentDate2 , refLetter_sentDate3, refLetter_sentDate4, refLetter_sentDate5) IS NULL
										
					UNION
										
					SELECT refLetter_id, refLetter_FKstudent_uniqname, refLetter_institute_name, refLetter_dueDate, refLetter_positionTitle, refLetter_flag
					FROM SRL_tbl_refLetter
					WHERE (refLetter_FKwriterID != 'NotSelected' AND refLetter_sentDate1 = 0000-00-00) OR (refLetter_FKwriterID2 != 'NotSelected' AND refLetter_sentDate2 = 0000-00-00) OR (refLetter_FKwriterID3 != 'NotSelected' AND refLetter_sentDate3 = 0000-00-00) OR (refLetter_FKwriterID4 != 'NotSelected' AND refLetter_sentDate4 = 0000-00-00) OR (refLetter_FKwriterID5 != 'NotSelected' AND refLetter_sentDate5 = 0000-00-00)
					) AS t1
					
					JOIN SRL_tbl_student ON student_uniqname = refLetter_FKstudent_uniqname
										
					ORDER BY refLetter_dueDate ASC";

	$resultUnsent = mysqli_query($db,$queryUnsent);
	
	if (!$resultUnsent) die ("Database access failed please contact site administrator and give them this error: " . mysqli_error());
			
		echo "<table><tr><th>ID</th><th>NAME</th><th>UNIQNAME</th><th>Institution</th><th>Title</th><th>Due on</th></tr>";			

			while($letters= mysqli_fetch_assoc($resultUnsent)){
			
				switch ($letters["refLetter_flag"]) {

				    case 1:
				    	//green
				        $color = '#CCFF99';
				        break;
				    case 2:
				    //red
				        $color = '#FF9999';
				        break;
				    case 3:
				    //yellow
				        $color = '#FFFFCC';
				        break;
				    
				    default:
				        $color = '#FFFFFF';
		     
				}
			
			echo '<tr style="background-color:',$color,'"><td class="jID">', '<a href= "SRL_Edit.php?id=', $letters["refLetter_id"], '">', $letters["refLetter_id"] ,'</a></td><td class="jName">', $letters["student_Fname"], " ", $letters["student_Mname"], " ", $letters["student_Lname"],'</td><td class="jUniqName">', $letters["refLetter_FKstudent_uniqname"],'</td><td class="jInst">', $letters["refLetter_institute_name"],'</td><td class="jTitle">',
						$letters["refLetter_positionTitle"],'</td><td class="jDate" width=70px>',$letters["refLetter_dueDate"],'</td></tr>';
		};
		echo "</table>";

	
mysqli_free_result($resultUnsent);
mysqli_close($db);
