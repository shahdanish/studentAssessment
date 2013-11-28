<?php
	session_start();
	include '../classes/databaseclass.php';
	include '../classes/studentclass.php';
	$studentobj = new student();
<<<<<<< HEAD
	if(!isset($_SESSION['username'])){
		header("Location:studentsignup.php");
	}
=======
>>>>>>> a587b88e05095ca860eff7ecf16ec706bdd4c380
	if(isset($_POST['student_name'])&&isset($_POST['student_pass'])){
		$sname = $_POST['student_name'];
		$spass = $_POST['student_pass'];
		$studentobj->checkToStartSession($sname,$spass); 
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
					<h1>  student Assessment Page </h1> 
					<div class="teacher_panel">
						<p style="text-align:center">Student info  </p>
						<p style="text-align:center">Student name : <?php  echo $_SESSION['username']; ?> </p>
						<p style="text-align:center">Class:  <?php echo $_SESSION['clas'];  ?>    </p>
					</div>
					<p class="signin button"> 
						<input type="submit" value="logout" name="logout" id="logout" /> 
					</p>
				</form>
			</div>
		</div>
	</div>
	</body>
 </html>