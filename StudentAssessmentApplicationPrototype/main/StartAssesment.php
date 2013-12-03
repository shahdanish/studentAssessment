<?php
	session_start();
	include '../classes/databaseclass.php';
	include '../classes/teacherclass.php';
	$teacherobj = new teacher();
	if(!isset($_SESSION['username'])){
		header("Location:teacherlogin.php");
	}
	if(isset($_POST['logout'])){
		$teacherobj->teacherSessionDestroy();
	}
	if(isset($_POST['starttest'])){
		$teacherobj->TeacherStartTest($_POST);
	}
	if(isset($_POST['stoptest'])){
		$teacherobj->TeacherStopTest($_POST);
	}
	/*for showing categories*/
	$dbobj= new database();
	$sql = "SELECT * FROM class";
	$result = $dbobj->query($sql);
	$table = "";
	while($row=$dbobj->fetch($result)) {   
	$tablerow = "<option>" . $row['class_data'] . "</option>";
	$table .= $tablerow;
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
		<div class="teacher_options">
			<h1 class="teacher_heading">Teacher Options</h1>
				<div id="my_menu">
					<ul>
						<li><a href="teacherdashboard.php"> Add / Delete Class </a></li>
					<li><a href="teacheraddquestion.php"> Add Question category </a></li>
					<li><a href="teacherstartassessment.php"> Start Assesment </a></li>
					<li><a href="teacheraddsubject.php"> Add / Remove Subject </a></li>
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
					<h1> Start Assesment For Teacher  </h1> 
					<p class="signin button"> 
					 <p> 
                        <div class="styled-select">
							<select name="classselected" id="classselected">
							<?php echo($table); ?>
							</select>
						</div>
                    </p>
					<p class="signin button">
						<input type="submit" value="start test" id="starttest" name="starttest"/>
						<input type="submit" value="Stop test" id="stoptest" name="stoptest"/>						
					</p>
				</form>
			</div>
		</div>
	</div>
	</body>
 </html>