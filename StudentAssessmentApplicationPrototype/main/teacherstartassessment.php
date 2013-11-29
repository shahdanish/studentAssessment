<?php
	session_start();
	//echo "thsii is session".$_SESSION['username'];
	include '../classes/databaseclass.php';
	include '../classes/teacherclass.php';
	$teacherobj = new teacher();
	if(isset($_POST['teacher_name'])&&isset($_POST['teacher_pass'])){
		$tname = $_POST['teacher_name'];
		$tpass = $_POST['teacher_pass'];
		$teacherobj->checkToStartSession($tname,$tpass); 
	}
	if(!isset($_SESSION['username'])){
		header("Location:teacherlogin.php");
	}
	if(isset($_POST['logout'])){
		$teacherobj->teacherSessionDestroy();
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
	<script>
			
	</script>
 <body>
	<div class="teacher_panel">
		<div class="teacher_options">
			<h1 class="teacher_heading">Teacher Options</h1>
				<div id="my_menu">
				<ul>
					<li><a href="teacherdashboard.php"> Add / Delete Class </a></li>
					<li><a href="teacheraddquestion.php"> Add Question category </a></li>
					<li><a href="teacherstartassessment.php"> Start Assesment </a></li>
				</ul>
			</div>
				<form method="post" class="signin button" >
					<p class="signin button"> 
						<input type="submit" value="logout" name="logout" id="logout" /> 
						
					</p>
				</form>
				
		</div>
		<div id="container_demo">
			<div id="wrapper">
				<form method="post" action="#" > 
					<h1> Start Assessment </h1> 
					<p> 
						<div class="styled-select">
							<select name="selectClass" id="selectClass">
							</select>
							<select name="selectQuestion" id="selectQuestion">
							</select>
						</div>
                                </p>
					<p class="signin button"> 
						<input type="submit" value="Start Test" id="startTest" name="startTest"/> 
					</p>
				</form>
			</div>
		</div>
	</div>
	</body>
 </html>