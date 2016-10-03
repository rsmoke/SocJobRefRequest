<?php 
require_once($_SERVER["DOCUMENT_ROOT"] . '/../Support/configSocRefLetV2.php');

$sql = "SELECT * FROM SRL_tbl_Admin WHERE AdminUniqname = '$login_name'";
$check = mysqli_query($db,$sql);
if (mysqli_num_rows($check) > 0 ){
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
<head>
	<title><?php echo "$deptShtName";?> Ref Letter ADMIN</title>
	<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon" />

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
	<div id="leftCol">
		<div id="instructions">
			<h1><?php echo "$deptShtName";?> Reference Letter Request ADMINISTRATIVE interface</h1>
			<p>This page displays the results of the <?php echo "$deptLngName";?> Reference Letter Requests Application</p> 
		</div><!-- #instructions -->
		<div> 
			<div id="downloadFiles">
			To download the listing of requests, select one of the items below (in CSV format)
			<ul>
				<li><b><a href="SRL_UnsentOutput.php" download>UN-SENT REQUESTS LIST</a></b></li>
				<li><b><a href="SRL_CompleteOutput.php" download>COMPLETE LISTING</a></b></li>
        <li><b><a href="SRL_CompleteOutputLastYear.php" download>ITEMS SUBMITTED SINCE <span
                style="background-color: #dedede; border: solid 1px black; border-radius: 2px;">&nbsp;<?php echo date("j M Y", strtotime("-1 years")); ?>
                &nbsp;</span></a></b></li>
			</ul>
			 <i>Your file will download immediately</i>
			 </div><!-- downloadFiles -->
			<h4>These are the requests that have <u>not</u> been sent yet.</h4>
			<div id="dataArea">
				<?php include("SRL_Unsubmitted.php");?>	
			</div><!-- dataArea -->	
		</div><!-- Downloadables -->
	</div><!-- #leftCol -->
	<div id="rightCol">
		<h1 class="rtCol">QUICK LINKS</h1>
		<ul>
		<li><a href="../index.php">Requester Interface</a></li>
		<li><a href="adminMngmt.php">Manage Application Access</a></li>
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
			e:<a href="mailto:<?php echo strtolower("$deptLngName");?>.department@umich.edu"><?php echo strtolower("$deptLngName");?>.department@umich.edu</a> 
		
		    <a href="http://www.facebook.com/universityofmichigan.<?php echo strtolower("$deptLngName");?>">Find us on Facebook!</a> 
			&nbsp;|&nbsp;<a href="http://www.lsa.umich.edu/<?php echo strtolower("$deptShtName");?>/sitemap">Sitemap</a> 
		    </p> 
	    
		<p id="UMlogos"><a href="http://www.umich.edu"><img src="../images/michigan.png" alt="University of Michigan" /></a></p> 
		
		<p id="logos"><a href="http://www.lsa.umich.edu"><img src="../images/lsa.png" alt= "LSA" /></a></p> 
	</div> <!-- #footer -->
</div> <!-- #Container -->
<script src="js/my_adminScript.js"></script>
</body> 
</html>
<?php

} else { 
	
?>
<!doctype html>
<html>
<head>
    <title>YOU ARE NOT AUTHORIZED - UM Department of <?php echo "$deptLngName";?></title>
  <link rel="stylesheet" href="../css/default.css" type="text/css"/>
  <link rel="stylesheet" href="../css/jobRef.css" type="text/css"/>
</head>
<body>
<div id="Container">
	<div id="MainContent">
		<div id="Banner"><a href="http://www.lsa.umich.edu/<?php echo strtolower("$deptShtName");?>"><img src="../images/banner.png" alt="<?php echo "$deptLngName";?> Home page" /></a></div>
		<div id="leftCol">
			<div id="instructions" style="color:sienna;">
				<h1>You are not authorized to this space!!!</h1>
				<h3>University of Michigan - LSA Computer System Usage Policy</h3>
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
				<li><a href="http://www.lsa.umich.edu/<?php echo strtolower("$deptShtName");?>"><?php echo "$deptLngName";?> Department</a></li>
			</ul>
		</div> <!-- #rightCol -->
	</div> <!-- #MainContent -->
	<div id="footer"> 
		<p>   
		    S<?php echo "$deptLngName";?>     
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

//mysqli_close($db);
