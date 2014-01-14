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
	if(isset($_POST['startTest'])){
		$teacherobj->teacherstartTest($_POST);
	}
	if(isset($_POST['stopTest'])){
		$teacherobj->teacherstopTest();
	}
	
	if(isset($_POST['logout'])){
		$teacherobj->teacherSessionDestroy();
	}
	
	$showclasssvalue=$teacherobj->showClasses();
	$showcategoryvalue=$teacherobj->showCategory();
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
		function selectSubject(){
		var a=$( "#selectClass" ).val();
		$("#selectedSubject").load("../includes/showsubject.php",{clas:a});
	}	
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
					<li><a href="teacheraddsubject.php"> Add / Remove Subject </a></li>
					<li><a href="teacherreport.php"> Student One to One Reports </a></li>
					<li><a href="teacheronetomanyreport.php"> Student One to many Reports </a></li>
					<li><a href="teacherclassreport.php"> Student Class Report </a></li>
					<li><a href="teacherallclassreport.php"> Student All Test </a></li>
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
							<select name="selectClass" id="selectClass" onMouseDown="selectSubject()">
							<?php echo($showclasssvalue); ?>
							</select>		
						</div>
                    </p>
					<p> 
						<div class="styled-select">
							<select name="selectedSubject" id="selectedSubject" >
							</select>		
						</div>
                    </p>
					<p> 
						<div class="styled-select">
							<select name="selectCat" id="selectCat">
							<?php echo($showcategoryvalue); ?>
							</select>		
						</div>
                    </p>
					
					<p class="signin button"> 
						<input type="submit" value="Start Test" id="startTest" name="startTest"/> 
						<input type="submit" value="Stop Test" id="stopTest" name="stopTest"/> 
					</p>
				</form>
			</div>
		</div>
	</div>
	</body>
 </html>