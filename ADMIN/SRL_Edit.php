<?php 
require_once($_SERVER["DOCUMENT_ROOT"] . '/../Support/configSocRefLetV2.php');

$passedID =  $_GET['id'];
/* $passedID =  clean($_GET['id']); */ 

$sql = "SELECT * FROM SRL_tbl_Admin WHERE AdminUniqname = '$login_name'";
$check = mysqli_query($db,$sql);
if (mysqli_num_rows($check) > 0 ){
	
$queryRecord = "SELECT *
				FROM `SRL_tbl_refLetter` AS Letter
				JOIN SRL_tbl_student ON Letter.refLetter_FKstudent_uniqname = SRL_tbl_student.student_uniqname 
				WHERE Letter.`refLetter_ID` =  '$passedID' ";
				
$resultRecord = mysqli_query($db,$queryRecord);
if (!$resultRecord) die ("Database access failed please contact the website administrator and give them this error: " . mysqli_connect__error());


$row=mysqli_fetch_array($resultRecord);

	switch ($row[refLetter_flag]) {

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
    };


?>
<!doctype html>
<html>
<head>
    <title><?php echo"$deptShtName";?> Ref Letter Request - UM Department of <?php echo"$deptLngName";?></title>
    <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon" />

    <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css" />
	<link rel="stylesheet" href="../css/jquery-ui-1.11.1.min.css" type="text/css" />

	<script type="text/javascript" src="../js/jquery-1.10.1.min.js"></script>
	<script type="text/javascript" src="../js/jquery-ui-1.11.1.min.js"></script>

		
	<link rel="stylesheet" href="../css/default.css" type="text/css"></link>	
    <link rel="stylesheet" href="../css/jobRef.css" type="text/css"></link>

</head>

<body >

<div id="Container">
<div id="MainContent">
	<div id="Banner"><a href="http://www.lsa.umich.edu/<?php echo strtolower("$deptShtName");?>"><img src="../images/banner<?php echo "$deptShtName";?>.png" alt="<?php echo"$deptLngName";?> Home page" /></a></div>


<div id="leftCol" class="column">
<div id="instructions">

<h4>Reference Letter Request for <?php echo $row[student_Fname], " ", $row[student_Lname] ?> for the position of:&nbsp;<br />
 <?php echo $row[refLetter_positionTitle]?> at <?php echo $row[refLetter_institute_name]?></h4>
<p>Edit the selected record and when you are finished click the submit button at the bottom of the page.</p> 
</div><!-- #instructions -->

<div id="form">		
			<form action="editedVars.php" target="_self" method="post">
				<fieldset>
			    	<legend>Personal Info</legend>
					<div style="background-color:<?php echo $color?>">
			        	Record ID: <?php echo($row[refLetter_id])?>
			        	<input type="hidden" name="recordID" id="recordID" value= "<?php echo($row[refLetter_id])?>"/>

			        	<label for="rqstrFname">First name:</label>
			            <?php echo($row[student_Fname])?>
			       
			        	<label for="rqstrLname">Last Name:</label>
			            <?php echo($row[student_Lname])?>

						<label for="rqstrUniq">Uniqname:</label>
			            <?php echo($row[refLetter_FKstudent_uniqname])?>		        
			            </div>
			    </fieldset>
			    <fieldset>
			    	<legend>Reference Letter Details</legend>
			    	
			        	<label for="posTitle">Job Title:</label>
			            <input type="text" name="posTitle" id="posTitle" size="30" maxlength="128" value= "<?php echo($row[refLetter_positionTitle])?>"/>

			            <label for="dueDate">Date Due:</label>
			            <?php echo($row[refLetter_dueDate])?>
			        

			    	 <label for="rqstType">Request Type</label>
			            <?php echo($row[refLetter_type])?>

			        	<table>
			        	<tr><th>Letter Writers</th><th>Date Sent</th></tr>
			        	<?php 
			        		foreach($row as $key => $value){
			        			if ($key === "refLetter_FKwriterID"){ 
			        				if ($value !== "NotSelected"){
				        				$fullName = ldapGleaner($value);
				        				echo "<tr><td>" . $value . " -- " . $fullName[0] . " " . $fullName[1] . "</td><td><input type='text' name='sentDate1' class='dp' value=" . $row[refLetter_sentDate1] . "></td></tr>";
			        				} else{
			        					echo "<input type='hidden' name='sentDate1' value= 0000-00-00 >";
			        				}
			        			} elseif ($key === "refLetter_FKwriterID2"){ 
			        				if ($value !== "NotSelected"){
				        				$fullName = ldapGleaner($value);
				        				echo "<tr><td>" . $value . " -- " . $fullName[0] . " " . $fullName[1] . "</td><td><input type='text' name='sentDate2' class='dp' value=" . $row[refLetter_sentDate2] . "></td></tr>";
			        				} else{
			        					echo "<input type='hidden' name='sentDate2' value= 0000-00-00 >";
			        				}
			        			} elseif ($key === "refLetter_FKwriterID3"){ 
			        				if ($value !== "NotSelected"){
				        				$fullName = ldapGleaner($value);
				        				echo "<tr><td>" . $value . " -- " . $fullName[0] . " " . $fullName[1] . "</td><td><input type='text' name='sentDate3' class='dp' value=" . $row[refLetter_sentDate3] . "></td></tr>";
			        				} else{
			        					echo "<input type='hidden' name='sentDate3' value= 0000-00-00 >";
			        				}
			        			} elseif ($key === "refLetter_FKwriterID4"){ 
			        				if ($value !== "NotSelected"){
				        				$fullName = ldapGleaner($value);
				        				echo "<tr><td>" . $value . " -- " . $fullName[0] . " " . $fullName[1] . "</td><td><input type='text' name='sentDate4' class='dp' value=" . $row[refLetter_sentDate4] . "></td></tr>";
			        				} else{
			        					echo "<input type='hidden' name='sentDate4' value= 0000-00-00 >";
			        				}
			        			} elseif ($key === "refLetter_FKwriterID5"){ 
			        				if ($value !== "NotSelected"){
				        				$fullName = ldapGleaner($value);
				        				echo "<tr><td>" . $value . " -- " . $fullName[0] . " " . $fullName[1] . "</td><td><input type='text' name='sentDate5' class='dp' value=" . $row[refLetter_sentDate5] . "></td></tr>";
			        				} else{
			        					echo "<input type='hidden' name='sentDate5' value= 0000-00-00 >";
			        				}
			        			}
			        		}				        		
			        	 ?>
			        	</table>

			    </fieldset>
			    <fieldset>
			
			    	<legend>Recipient Details</legend>  
			        
			        	<!-- <label for="recipTitle">Title:</label> -->
			            <?php if ($row[refLetter_title] !== "other"){ echo($row[refLetter_title] );}; ?>
			        			        
			        	<!-- <label for="recipFname">First name:</label> -->
			            <?php echo($row[refLetter_Fname])?>
			        
			        	<!-- <label for="recipLname">Last Name:</label> -->
			            <?php echo($row[refLetter_Lname])?>
			        
			        	<!-- <label for="recipSuffix">Suffix:</label> -->
			            <?php echo($row[refLetter_suffix])?>
			        
			        
					<br />
			        
			        	<!-- <label for="recipInst">Institution:</label> -->
			            <?php echo($row[refLetter_institute_name])?>
			        
			        
			        	<!-- <label for="recipDept">Department:</label> -->
			            <?php echo($row[refLetter_institute_dept])?>

			        <br />
			        
			        	<!-- <label for="recipRoom">Room or Suite:</label> -->
			            <?php 
			            	if (strlen($row[refLetter_institute_room]) > 0){
			            		echo('Room/Suite: ' . $row[refLetter_institute_room] . '<br />');
			            	};
			            ?>   
			        
			        	<!-- <label for="recipStreet">Street:</label> -->
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
			          ?>  
			        <br />

			        	<label for="recipSpInstx">Special Instructions:</label>
			            <?php echo($row[refLetter_specialInstx])?>
			        
			    </fieldset>
			    			    
			    <fieldset>
			    	<legend>Comments</legend>
			

			        	<label for="comments">Message:</label>
			            <textarea name="comments" id="comments" rows="5" cols="50" ><?php echo($row[refLetter_message])?></textarea>
			            <br /><br />
			            <label for="flag">Flag:</label>
			            <span style="background-color: <?php echo($color) ?>;">&nbsp;&nbsp;&nbsp;</span>

			            <select name="flag" id="flag">
			            	  <option selected="selected" value="<?php echo($row[refLetter_flag])?>">Change Color</option>
							  <option value="1">Green</option>
							  <option value="2">Red</option>
							  <option value="3">Yellow</option>
							  <option value="0">Clear Color</option>
							</select>
			    </fieldset>
			    
			    <fieldset class="action subChng">
			    	<input type="submit" name="submit" id="submit" value="Submit Changes" />
			    </fieldset>
			</form>
	</div><!--form-->
</div><!-- #leftCol -->
	<div id="rightCol">
		<h1 class="rtCol">QUICK LINKS</h1>
		<ul>
		<li><a href="../index.php">Requester Interface</a></li>
		<li><a href="../ADMIN/adminMngmt.php">Manage Application Access</a></li>
		<li><a href="http://www.lsa.umich.edu/<?php echo strtolower("$deptShtName");?>"><?php echo"$deptLngName";?> Department</a></li>
		</ul>
	</div> <!-- #rightCol -->

</div> <!-- #MainContent -->
	<div id="footer"> 
		<p>   
		    <?php echo"$deptLngName";?>      
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
			e:<a href="mailto:<?php echo strtolower("$deptLngName");?>.department@umich.edu"><?php echo strtolower("$deptLngName");?>.department@umich.edu</a> 
		
		    <a href="http://www.facebook.com/universityofmichigan.<?php echo strtolower("$deptLngName");?>">Find us on Facebook!</a> 
			&nbsp;|&nbsp;<a href="http://www.lsa.umich.edu/<?php echo strtolower("$deptShtName");?>/sitemap">Sitemap</a> 
		    </p> 
	    
		<p id="UMlogos"><a href="http://www.umich.edu"><img src="../images/michigan.png" alt="University of Michigan" /></a></p> 
		
		<p id="logos"><a href="http://www.lsa.umich.edu"><img src="../images/lsa.png" alt= "LSA" /></a></p> 
	</div> <!-- #footer -->
</div> <!-- #Container -->

<script src="../ADMIN/js/my_adminScript.js"></script>
</body> 
</html>
<?php
} else { 
	
?>

<!doctype html>
<html>
<head>
    <title>DEV YOU ARE NOT AUTHORIZED - UM Department of <?php echo"$deptLngName";?></title> 
	<link rel="stylesheet" href="../css/default.css" type="text/css"></link>
	<link rel="stylesheet" href="../css/jobRef.css" type="text/css"></link>
</head>
<body>
<div id="Container">

<div id="MainContent">
<div id="Banner"><a href="http://www.lsa.umich.edu/<?php echo strtolower("$deptShtName");?>"><img src="../images/banner.png" alt="<?php echo"$deptLngName";?> Home page" /></a></div>

<div id="leftCol">
<div id="instructions" style="color:sienna;">
<h1>You are not authorized to this space!!!</h1>
<h2>University of Michigan - LSA Computer System Usage Policy</h2>
<p>This is the University of Michigan information technology environment. You 
MUST be authorized to use these resources. As an authorized user, by your use 
of these resources, you have implicitly agreed to abide by the highest 
standards of responsibility to your colleagues, -- the students, faculty, 
staff, and external users who share this environment. You are required to 
comply with ALL University policies, state, and federal laws concerning 
appropriate use of information technology. Non-compliance is considered a 
serious breach of community standards and may result in disciplinary and/or 
legal action.</p>
</div><!-- #instructions -->
</div><!-- #leftCol -->

<div id="rightCol">
	<h1 class="rtCol">QUICK LINKS</h1>
	<ul>
	<li><a href="http://www.lsa.umich.edu/<?php echo strtolower("$deptShtName");?>"><?php echo"$deptLngName";?> Department</a>
	<li><a href="http://www,lsa.umich.edu">College of LSA</a>
	</ul>
</div> <!-- #rightCol -->

</div> <!-- #MainContent -->

<div id="footer"> 
	<p>   
	    <?php echo"$deptLngName";?>      
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
		e:<a href="mailto:<?php echo strtolower("$deptLngName");?>.department@umich.edu"><?php echo strtolower("$deptLngName");?>.department@umich.edu</a> 
	
	    <a href="http://www.facebook.com/universityofmichigan.<?php echo strtolower("$deptLngName");?>">Find us on Facebook!</a> 
		&nbsp;|&nbsp;<a href="http://www.lsa.umich.edu/<?php echo strtolower("$deptShtName");?>/sitemap">Sitemap</a> 
	    </p> 
    
	<p id="UMlogos"><a href="http://www.umich.edu"><img src="../images/michigan.png" alt="University of Michigan" /></a></p> 
	
	<p id="logos"><a href="http://www.lsa.umich.edu"><img src="../images/lsa.png" alt= "LSA" /></a></p> 
</div> <!-- #footer -->
</div> <!-- #Container -->
</body> 
</html>	
<?php
}
mysqli_free_result($resultRecord);
mysqli_free_result($check);

