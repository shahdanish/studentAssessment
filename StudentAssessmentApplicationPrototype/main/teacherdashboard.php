<html>
	<head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <link rel="stylesheet" type="text/css" href="../css/studentform.css" />
        <link rel="stylesheet" type="text/css" href="../css/style.css" />
		<link rel="stylesheet" type="text/css" href="../css/animate-custom.css" />
		<script src="../jquery/jquery-1.10.2.js" ></script>
    </head>
 <body>
 	
<?php
	

	include '../class/studentclass.php';
	$db = new database('localhost', 'studentassessment', 'root', '');
	$tname=$_POST['teacher_name'];
	$tpass=$_POST['teacher_pass'];
	$sql = "SELECT * FROM teacherinfo WHERE teacher_name = '$tname' AND teacher_pass = '$tpass' ";
	$result=$db->query($sql);
	$row = $db->fetch();
    $tid = $row['tid'];
	
	$db->sessionStart($tname,$tid);
	if (!(isset($_SESSION['username']) && $_SESSION['username'] != '')) {
	header ("Location: ../teacherlogin.php");
	}
	else{
		echo "session is active";
	}?>
	<div id="wrapper">
				<p class="login button" id="logoutbutton"> 
               		<input type="button" value="Logout" id="logout" /> 
				</p>
	</div>
	
	
 </body>
 </html>