<?php 
require_once($_SERVER["DOCUMENT_ROOT"] . '/../Support/configSocRefLetV2.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
<head>
    <title><?php echo "$deptShtName";?> Ref Letter Request - UM Department of <?php echo "$deptLngName";?></title> 
    
	<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />   

	<link rel="stylesheet" href="css/bootstrap.min.css" />	
    <link rel="stylesheet" href="css/jquery-ui-1.11.1.min.css" type="text/css" />
    <link rel="stylesheet" href="css/jquery-ui-1.11.1.structure.min.css" type="text/css" />
    <link rel="stylesheet" href="css/jquery-ui-1.11.1.theme.min.css" type="text/css" />

	<script src="js/jquery-1.10.1.min.js"></script>
	<script src="js/jquery-ui-1.11.1.min.js"></script>

	<link rel="stylesheet" href="css/default.css" type="text/css" />
    <link rel="stylesheet" href="css/jobRef.css" type="text/css" />		
</head>
<body>
<?php echo $login_name ?>

<div id="Container">

	<div id="MainContent">
		<div id="Banner"><a href="http://www.lsa.umich.edu/<?php echo strtolower("$deptShtName");?>"><img src="images/banner<?php echo "$deptShtName";?>.png" alt="<?php echo "$deptLngName";?> Home page" /></a></div><!-- #Banner -->	
		<div id="leftCol" class="column">
			<div id="instructions">
				<h1><?php echo "$deptLngName";?> Reference Letter Requests</h1>
				<p>The Department of <?php echo "$deptLngName";?> provides the service of sending Student Reference Letters for job applicants. If you would like the Graduate office
				 to send a letter for you, please use the button below to request this service. You will want to be sure that the faculty writers of your 
				 letters are registered by looking at the listing in the beige box.
				 You are able to view past submitted requests by clicking the ID number next to the letter description in the table.
				</p> 
			</div><!-- #instructions -->
			<div id="loginHeader">
				You are logged in as: <span class="loginUser"><?php echo($login_name) ?></span>  <br />(if you are not <?php echo($login_name) ?> please <a href="https://weblogin.umich.edu/cgi-bin/logout">log out</a> and log in again)
			</div> <!-- loginHeader -->				
			<div>
				<div id="writerBox">
					<h5>These are your letter writers.</h5>
					<div id="writers"></div>
					<br />				
				</div><!-- #writerBox -->	
				<form id="myForm">
					If you would like to register another letter writer please enter their <b>uniqname</b> here
					<input type="text" name="name" />
					<button id="newWriter" type="button" class="btn btn-info btn-xs">Add</button><br /><i>--look up uniqnames using the <a href="https://mcommunity.umich.edu/" target="_blank">Mcommunity directory</a>.</i>	   	
				</form><!-- myForm -->
			</div><!-- form section-->
			<hr />
			<div>
				<p>These are your submitted requests.</p>
				<button id="reqSub" type="button" class="btn btn-info btn-xs">Add a New Request</button>&nbsp;&nbsp;<button id="indDwnld" class="btn btn-default btn-xs" type="button">Download Archive</button><br />
				<div id="reqSubmitted">	
					<?php include("php/userSubmitted.php"); ?>
				</div> <!-- #reqSubmitted -->		
			</div><!-- submitted requests section -->			
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
    
	<p id="UMlogos"><a href="http://www.umich.edu"><img src="images/michigan.png" alt="University of Michigan" /></a></p> 
	
	<p id="logos"><a href="http://www.lsa.umich.edu"><img src="images/lsa.png" alt= "LSA" /></a></p> 
</div> <!-- #footer -->
	
</div> <!-- #Container -->

	<script src="js/my_script.js" type="text/javascript"></script>
</body> 
</html>

<?php
//mysqli_free_result($resultSelect);
//mysqli_close($db);
