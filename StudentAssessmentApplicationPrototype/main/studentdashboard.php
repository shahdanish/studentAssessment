<?php
	session_start();
	include '../classes/databaseclass.php';
	include '../classes/studentclass.php';
	$studentobj = new student();
	
	if(isset($_POST['student_name'])&&isset($_POST['student_pass'])){
		$sname = $_POST['student_name'];
		$spass = $_POST['student_pass'];
		$studentobj->checkToStartSession($sname,$spass); 
	 }
	if(!isset($_SESSION['username'])){
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
	<div class="teacher_panel">
		<div id="container_demo">
			<div id="wrapper">
				<form method="post" action="#" > 
					<h1> Add classes to student sign up </h1> 
					<p class="signin button"> 
						<input type="submit" value="logout" name="logout" id="logout" /> 
					</p>
				</form>
			</div>
		</div>
	</div>
	</body>
 </html>