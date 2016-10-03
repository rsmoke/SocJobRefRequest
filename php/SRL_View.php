<?php 
require_once($_SERVER["DOCUMENT_ROOT"] . '/../Support/configSocRefLetV2.php');

$passedID = $_GET['id']; 

$queryRecord = "SELECT *
FROM SRL_tbl_refLetter AS Letter
WHERE Letter.refLetter_id =  $passedID AND Letter.refLetter_FKstudent_uniqname = '$login_name'";

?>
<!doctype html>
<html>
<head>
    <title><?php echo "$deptShtName";?> Ref Letter Request - UM Department of <?php echo "$deptLngName";?></title>
	<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon"/>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>

	<link rel="stylesheet" href="../css/default.css" type="text/css"/>
	<link rel="stylesheet" href="../css/jobRef.css" type="text/css"/>

</head>
<body>
<div id="Container">
	<div id="MainContent">
	<div id="Banner"><a href="http://www.lsa.umich.edu/<?php echo strtolower("$deptShtName");?>"><img src="../images/banner<?php echo "$deptShtName";?>.png" alt="<?php echo "$deptLngName";?> Home page" /></a></div>


<div id="leftCol" class="column">

<?php 

$resultRecord=mysqli_query($db,$queryRecord);
if (!$resultRecord) die ("Database access failed please contact site administrator and give them this error: " . mysqli_connect__error());
  
  // Fetch one and one row
$row=mysqli_fetch_array($resultRecord);
$fullName = ldapGleaner($row['refLetter_FKstudent_uniqname']);

 ?>
<div id="instructions">
<h4>Your Reference Letter Request for the position of: <br />
	<?php echo $row['refLetter_positionTitle'] ?> at <?php echo $row['refLetter_institute_name'] ?></h4>
</div><!-- #instructions -->

<div>		
				<fieldset>
			    	<legend>Personal Info</legend>

					<label for="recordID">Record ID:&nbsp;</label><?php echo($row['refLetter_id']) ?>
	<br />
			        	<label for="rqstrFname">First name:</label>
			            <?php echo($fullName[0])?>
			        
			        
			        	<label for="rqstrLname">Last Name:</label>
			            <?php echo($fullName[1])?>
			        
			            <label for="rqstrUniq">Uniqname:</label>
					<?php echo($row['refLetter_FKstudent_uniqname']) ?>

			    </fieldset>
			    <fieldset>
			    	<legend>Reference Letter Details</legend>
			    	
			        	<label for="posTitle">Job Title:</label>
						<?php echo($row['refLetter_positionTitle']) ?>
			        
			    	 
			        	<label for="dueDate">Date Due:</label>
						<?php echo($row['refLetter_dueDate']) ?>
			        
			        	<label for="rqstType">Request Type:</label>
						<?php echo($row['refLetter_type']) ?>
						
						<br />

			        	<table>
			        	<tr><th>Letter Writers</th><th>Date Sent</th></tr>
			        	<?php 
			        		// for ( $i = 2; $i<=6; $i++ ) {
			        		// 	if ( $row[$i] !== "NotSelected" ) {
			        		// 		$writerName = ldapGleaner($row[$i]);
			        		// 		echo "<tr><td>" . $row[$i] . " -- " . $writerName[0] . " " . $writerName[1] . "</td><td>" . ($row[$i+28] != 0000-00-00 ? 'Letter Sent: ' . $row[$i+28] : '--') . "</td></tr>";
			        		// 	}
			        		// }

			        		foreach($row as $key => $value){
										if ($key === 'refLetter_FKwriterID' && $value !== 'NotSelected') {
				        				$fullName = ldapGleaner($value);
				        				echo "<tr><td>" . $value . " -- " . $fullName[0] . " " . $fullName[1] . "</td><td>" . $row[refLetter_sentDate1] . "</td></tr>"; 
			        			} elseif ($key === "refLetter_FKwriterID2" && $value !== "NotSelected"){
				        				$fullName = ldapGleaner($value);
				        				echo "<tr><td>" . $value . " -- " . $fullName[0] . " " . $fullName[1] . "</td><td>" . $row[refLetter_sentDate2] . "</td></tr>";
			        			} elseif ($key === "refLetter_FKwriterID3" && $value !== "NotSelected"){
				        				$fullName = ldapGleaner($value);
				        				echo "<tr><td>" . $value . " -- " . $fullName[0] . " " . $fullName[1] . "</td><td>" . $row[refLetter_sentDate3] . "</td></tr>";
			        			} elseif ($key === "refLetter_FKwriterID4" && $value !== "NotSelected"){
				        				$fullName = ldapGleaner($value);
				        				echo "<tr><td>" . $value . " -- " . $fullName[0] . " " . $fullName[1] . "</td><td>" . $row[refLetter_sentDate4] . "</td></tr>";
			        			} elseif ($key === "refLetter_FKwriterID5" && $value !== "NotSelected"){
				        				$fullName = ldapGleaner($value);
				        				echo "<tr><td>" . $value . " -- " . $fullName[0] . " " . $fullName[1] . "</td><td>" . $row[refLetter_sentDate5] . "</td></tr>";
			        			}
			        		}				        		
			        	 ?>

			        	</table>
			        
			
			    </fieldset>
			
			    <fieldset>
			    	<legend>Recipient Details</legend>  
			        
			        	
			            <?php if ($row[refLetter_title] !== "other"){ echo($row[refLetter_title] );}; ?> <?php echo($row[refLetter_Fname])?> <?php echo($row[refLetter_Lname])?> <?php echo($row[refLetter_suffix])?>
			        
			        <br />
			
			        	<?php echo($row[refLetter_institute_name])?>
			        <br />
				       	<?php echo($row[refLetter_institute_dept])?>
			        
			        <br />
			         <?php 
		            	if (strlen($row[refLetter_institute_room]) > 0){
		            		echo('Room/Suite: ' . $row[refLetter_institute_room] . '<br />');
		            	};
			          ?>  
			        
			        	<?php echo($row[refLetter_institute_street])?>
			        
			        <br />
			        
			        	<?php echo($row[refLetter_institute_city] . ", " . $row[refLetter_institute_state] . " " . $row[refLetter_institute_zipcode])?>			        
			        
			        <br />
			        <?php
			        	if (strlen($row[refLetter_institute_country]) > 0){
		            		echo($row[refLetter_institute_country] . '<br />');
		            	};
	            		?>

		            <br />
		            <?php
		            	if (strlen($row[refLetter_Email]) > 0){
		            		echo('eMail: ' . $row[refLetter_Email] . '<br />');
		            	};

		            	if (strlen($row[refLetter_URL]) > 0){
		            		echo('URL: ' . $row[refLetter_URL] . '<br />');
		            	};

		            	if (strlen($row[refLetter_institute_phone]) > 0){
		            		echo('Phone: ' . $row[refLetter_institute_phone] . '<br />');
		            	};
			          ?>  
			        <br />
			        	<label for="recipSpInstx">Special Instructions:</label>
			            <?php echo($row[refLetter_specialInstx])?>
			        
			    </fieldset>
			    
			    
			    <fieldset>
			    	<legend>Comments</legend>
			
			        
			        	<label for="comments">Notes from the Grad Office:</label>
			            <?php echo($row[refLetter_message])?>
			        

			    </fieldset>

	</div><!--form-->

	<a class="btn btn-warning btn-xs" href='#' onClick='window.close();'>Close Window</a>
<?php
   
  // Free result set
	mysqli_free_result($resultRecord);

	mysqli_close($db);
?>
	
</div><!-- #leftCol -->
	<div id="rightColUser">
		<h1 class="rtCol">QUICK LINKS</h1>
		<ul>
	<li><a href="http://www.lsa.umich.edu/<?php echo strtolower("$deptShtName");?>"><?php echo "$deptLngName";?> Department</a></li>
	<li><a href="http://www.umich.edu">UoM Portal</a></li>
		</ul>
	</div> <!-- #rightCol -->

</div> <!-- #MainContent -->


	<div id="footer"> 
		<p>   
		    <?php echo "$deptLngName";?>      
			<br />LSA Building
		    <br />Room 3001
		    <br />500 S. State Street
			<br />Ann Arbor, MI &nbsp;48109-1382
	  	</p> 
	  	
		<p>
			ph: 734-764-6324
			<br /> 
	 	   fx: 734-763-6887
	 	</p> 
	
		<p id="ftr-contact">
			e:<a href="mailto:<?php echo strtolower("$deptLngName");?> .department@umich.edu"><?php echo strtolower("$deptLngName");?> .department@umich.edu</a> 
		
		    <a href="http://www.facebook.com/universityofmichigan.<?php echo strtolower("$deptLngName");?> ">Find us on Facebook!</a> 
			&nbsp;|&nbsp;<a href="http://www.lsa.umich.edu/<?php echo strtolower("$deptShtName");?>/sitemap">Sitemap</a> 
		    </p> 
	    
		<p id="UMlogos"><a href="http://www.umich.edu"><img src="../images/michigan.png" alt="University of Michigan" /></a></p> 
		
		<p id="logos"><a href="http://www.lsa.umich.edu"><img src="../images/lsa.png" alt= "LSA" /></a></p> 
	</div> <!-- #footer -->
</div> <!-- #Container -->

</body> 
</html>
