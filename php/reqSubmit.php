<?php
require_once($_SERVER["DOCUMENT_ROOT"] . '/../Support/configSocRefLetV2.php');

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
<head>
    <title><?php echo "$deptShtName";?> Ref Letter Request - UM Department of <?php echo "$deptLngName";?></title>

	<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon" />

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>

	<script type="text/javascript" src="../js/formValidator.js"></script>

	<link rel="stylesheet" href="../css/default.css" type="text/css" />
    <link rel="stylesheet" href="../css/jobRef.css" type="text/css" />

</head>
<body>

<div id="Container">

	<div id="MainContent">

		<div id="Banner"><a href="http://www.lsa.umich.edu/<?php echo strtolower("$deptShtName");?>"><img src="../images/banner<?php echo "$deptShtName";?>.png" alt="<?php echo "$deptLngName";?> Home page" /></a></div>

		<div id="leftCol" class="column">
			<div id="instructions">
				<h1><?php echo "$deptLngName";?> Reference Letter Requests Submittal</h1>
				<p>Please fill in the form below with the information required to send your letter. If you have instructions
				for the Graduate office please enter these in the "Special Instructions" area at the bottom of the form</p>
			</div><!-- #instructions -->

			<div id="loginHeader">
				<p>You are logged in as: <span class="loginUser"><?php echo($login_name) ?></span>  (if you are not <?php echo($login_name) ?> please <a href="https://weblogin.umich.edu/cgi-bin/logout">log out</a> and log in again)</p>
			</div> <!-- loginHeader -->
			<div><p>&nbsp;</p></div>
			<div>
			<form id="myNewRecordForm" action="insertVars.php" onsubmit="return validateForm()" method="post">
				<input type="hidden" name="rqstrUniq" id="rqstUniq" value= "<?php echo($login_name) ?>">
				<input type="hidden" name="rqstrRqstDate" id="rqstrRqstDate" value= "<?php echo(date("Y-m-d")) ?>">

			    <fieldset>
			    	<legend>Reference Letter Details</legend>
			    	<label class="label" for="posTitle">Job Title:</label>
			            <input type="text" name="posTitle" id="posTitle" >

					<label class="label" for="dueDate">Date Due:</label>
			        	<input type="text" name="dueDate" id="datepicker" >

			        	<table>
									<tr>
										<td width="50%" style="padding-left:5px;">
		            	<label for="letterType" class="control-label input-group">Request Type</label>
											<div class="radio">
												<label><input type="radio" name="letterType" id="email" value="eMail">eMail</label>&nbsp;<input
													type="text" name="recipEmail" id="recipEmail" placeholder="eMail of recipient">
											</div>
											<div class="radio">
												<label><input type="radio" name="letterType" id="electUpld" value="eUpload">Upload</label>&nbsp;<input
													type="text" name="recipURL" id="recipURL" placeholder="webLink for Upload">
											</div>
											<div class="radio">
												<label><input type="radio" name="letterType" id="hdCpy" value="HardCopy">Hardcopy</label>
											</div>

			        	</td><td>
			<?php
			$sqlSelect = "SELECT * FROM SRL_tbl_StudentToWriter WHERE FK_student_uniqname = '$login_name'";
			//Query the database for results we want
			$resultSelect = mysqli_query($db, $sqlSelect);
			//Test if there was a query result
			if (!$resultSelect){
				die("Database query failed.");
			}
			//Create an array of objects for for each returned row
			while ($array[] = mysqli_fetch_object($resultSelect));
			//Remove the blank entry at the end of the array
			array_pop($array);
			?>
					<label class = "label" for="writerID">1st Writer:</label>
					<select name="writerID">
						<option value="NotSelected"> -- </option>
						<?php foreach ( $array as $option ) : ?>
						<option value="<?php echo $option->FK_writer_uniqname; ?>"><?php echo $option->FK_writer_uniqname; ?></option>
						<?php endforeach; ?>
					</select>
					<br />

					<label class = "label" for="writerID2">2nd Writer:</label>
					<select name="writerID2">
						<option value="NotSelected"> -- </option>
						<?php foreach ( $array as $option ) : ?>
						<option value="<?php echo $option->FK_writer_uniqname; ?>"><?php echo $option->FK_writer_uniqname; ?></option>
						<?php endforeach; ?>
					</select>
					<br />

					<label class = "label" for="writerID3">3rd Writer:</label>
					<select name="writerID3">
						<option value="NotSelected"> -- </option>
						<?php foreach ( $array as $option ) : ?>
						<option value="<?php echo $option->FK_writer_uniqname; ?>"><?php echo $option->FK_writer_uniqname; ?></option>
						<?php endforeach; ?>
					</select>
					<br />

					<label class = "label" for="writerID4">4th Writer:</label>
					<select name="writerID4">
						<option value="NotSelected"> -- </option>
						<?php foreach ( $array as $option ) : ?>
						<option value="<?php echo $option->FK_writer_uniqname; ?>"><?php echo $option->FK_writer_uniqname; ?></option>
						<?php endforeach; ?>
					</select>
					<br />

					<label class = "label" for="writerID5">5th Writer:</label>
					<select name="writerID5">
						<option value="NotSelected"> -- </option>
						<?php foreach ( $array as $option ) : ?>
						<option value="<?php echo $option->FK_writer_uniqname; ?>"><?php echo $option->FK_writer_uniqname; ?></option>
						<?php endforeach; ?>
					</select>
			           </td></tr></table>
			    </fieldset>

			    <fieldset>
			    	<legend>Send Letter to:</legend>
					<label class="label" for="recipTitle">Title:</label>
			            	<select size="1" name="recipTitle" id="recipTitle">
			                    <option value="Professor">Professor</option>
			                    <option value="AssocProf">Associate Professor</option>
			                    <option value="Chair">Chair</option>
			                    <option value="Dr">Dr</option>
			                    <option value="Mr">Mr</option>
			                    <option value="Ms">Ms</option>
			                    <option value="other">Other</option>
			            	</select>

			        	<br />

			        <label class = "label" for="recipFname">First name:</label>
			            <input type="text" name="recipFname" id="recipFname" >

			        <label class="label" for="recipMname">MI:</label>
			            <input type="text" name="recipMname" id="recipMname" >

  			        	<br />

			        <label class = "label" for="recipLname">Last Name:</label>
			            <input type="text" name="recipLname" id="recipLname" >

			        <label  class="label" for="recipSuffix">Suffix:</label>
			            <input type="text" name="recipSuffix" id="recipSuffix" >

    			        	<br />

			        <label class = "label" for="recipInst">Institution:</label>
			            <input type="text" name="recipInst" id="recipInst" >

    			        	<br />

			        <label class = "label" for="recipDept">Department:</label>
			            <input type="text" name="recipDept" id="recipDept" >

    			        	<br />

			        <label class = "label" for="recipStreet">Street:</label>
			            <input type="text" name="recipStreet" id="recipStreet" >

			        <label class="label" for="recipRoom">Room/Suite:</label>
			            <input type="text" name="recipRoom" id="recipRoom" >

			        <br />

			        <label class = "label" for="recipCity">City:</label>
			            <input type="text" name="recipCity" id="recipCity" >

			   <br />

			        <label class = "label" for="recipState">State:</label>
			            <input type="text" name="recipState" id="recipState" >

			        <label class="label" for="recipZip">Zipcode:</label>
			            <input type="text" name="recipZip" id="recipZip" >

			            <br />

			        <label class = "label" for="recipCountry">Country:</label>
			            <input type="text" name="recipCountry" id="recipCountry" >

						<br />

			        <label class = "label" for="recipPhone">Phone:</label>
			            <input type="text" name="recipPhone" id="recipPhone" >

			            	<br />

			        <label class="label" for="recipSpInstx">Special Instructions:</label><br />
			            <textarea cols ="65" name="recipSpInstx" id="recipSpInstx" rows="5" placeholder="Enter any other information that should be considered when processing this request"></textarea>
			            <br />
			    	<button id="newRecordSub" type="submit" class="btn btn-primary">Submit</button>
			    </fieldset>
			</form>
			</div><!-- form -->

		</div><!-- #leftCol -->

		<div id="rightColUser">
			<h1 class="rtCol">QUICK LINKS</h1>
			<ul>
			<li><a href="../index.php">Your Letter Requests</a></li>
			<li><a href="http://www.lsa.umich.edu/<?php echo strtolower("$deptShtName");?>"><?php echo "$deptLngName";?> Department</a></li>
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
			&nbsp;|&nbsp;<a href="http://www.lsa.umich.edu/<?php echo strtolower("$deptShtName");?>/aboutus/sitemap">Sitemap</a>
		    </p>

		<p id="UMlogos"><a href="http://www.umich.edu"><img src="../images/michigan.png" alt="University of Michigan" /></a></p>

		<p id="logos"><a href="http://www.lsa.umich.edu"><img src="../images/lsa.png" alt= "LSA" /></a></p>
	</div> <!-- #footer -->
</div> <!-- #Container -->
    <script type="text/javascript">
    $( "#datepicker" ).datepicker({
	  numberOfMonths: 2,
	  showButtonPanel: true,
	  dateFormat: "yy-mm-dd"
	});
	</script>
<!-- <script src="../js/my_script.js"></script> -->
</body>
</html>

<?php
mysqli_free_result($resultSelect);
mysqli_close($db);
