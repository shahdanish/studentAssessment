<html>
	<head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" type="text/css" href="../css/studentform.css" />
        <link rel="stylesheet" type="text/css" href="../css/style.css" />
		<link rel="stylesheet" type="text/css" href="../css/animate-custom.css" />
	
    </head>
 <body>
	<?php
	include '../classes/databaseclass.php';
	include '../classes/teacherclass.php';
	$teacherobj = new teacher();
	$teacherobj->checkToStartSession($_POST);
	if(!isset($_SESSION['id'])){
		header("Location:teacherlogin.php");
	}
	if(isset($_POST['logout'])){
		$teacherobj->teacherSessionDestroy();
	}
	?>
	<div class="teacher_panel">
		<div class="teacher_options">
			<h1 class="teacher_heading">Teacher Options</h1>
				<form method="post" class="signin button">
					<p class="signin button"> 
						<input type="submit" value="logout" name="logout" id="logout" /> 
					</p>
				</form>
		</div>
		<div id="container_demo">
			<div id="wrapper">
				<form action="#" method="post"> 
					<h1> Add classes to student sign up </h1> 
					<p> 
						<label for="usernamesignup" class="uname"> add classes</label>
						<input id="classtoadd" name="classtoadd" required="required" type="text" placeholder="add in BS-Se-1st format" />
					</p>
					<p class="signin button"> 
						<input type="submit" value="addclass" id="submitted"/> 
					</p>
				</form>
			</div>
		</div>
	</div>
	</body>
 </html>