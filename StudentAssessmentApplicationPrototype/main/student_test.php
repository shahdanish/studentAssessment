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
	
	if(!isset($_SESSION['username'])) {
		header("Location:studentsignup.php");
	}
	$testquestdata=$studentobj->showquestion();
	
	
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
	<div class="teacher_panel" style="width=100%;">
		<div id="container_demo">
			<div id="wrapper">
				<?php
				if (isset($_GET['student'])){
				echo "<span>Assessment of ".$_GET['student']." by ".$_SESSION['username'] ."</span>";
				}
				echo "<br><span>For the class : <b> ". $_SESSION['starttestclass']."</b> <br> For subject of <b>" .$_SESSION['starttestsub']."</b><br>For category of <b>" .$_SESSION['starttestcat']."</b></span>";
				?>
			
			
			<form name="testdata" id="testdata" method="POST">
				<?php
					echo $testquestdata;
				?>	
				<input type="submit" id="submittestdata" name="submittestdata" value="submit test data">
			</form>
			
			</div>
		</div>
	</div>
</body>
 </html>