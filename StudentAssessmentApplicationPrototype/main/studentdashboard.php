<?php
	session_start();
	include '../classes/databaseclass.php';
	include '../classes/studentclass.php';
	$studentobj = new student();
	$studentobj->checkToStartSession($_POST);
	if( !isset($_SESSION['username']) AND !isset($_SESSION['id'])){
		header("Location:studentsignup.php");
	}
	if(isset($_POST['logout'])){
		$studentobj->studentSessionDestroy();
	}
?>
<html>
	<head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" type="text/css" href="../css/studentform.css" />
        <link rel="stylesheet" type="text/css" href="../css/style.css" />
		<link rel="stylesheet" type="text/css" href="../css/animate-custom.css" />
		<script src="../jquery/jquery-1.10.2.js" ></script>
    </head>
 <body>
		<div id="container_demo">
			<div id="wrapper">
				<form method="post" action="#" > 
					<h1> Student Assessment Profile </h1> 
					<?php
					echo $_POST['student_name'];
					echo  "this is session id".$_SESSION['id'];
					echo "this ia a session ".$_SESSION['username'];
					?>
					
					<p class="signin button"> 
						<input type="submit" value="logout" name="logout" id="logout" /> 
						
					</p>
				</form>
			</div>
		</div>
	</div>
	</body>
 </html>