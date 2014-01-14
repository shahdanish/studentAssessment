<?php
	session_start();
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
	if(isset($_POST['addcategory'])){
		$teacherobj->TeacherAddCategory($_POST);
		$catagoryadded = "category is added";
	}
	if(isset($_POST['addquestion'])){
		$teacherobj->TeacherAddQuest($_POST);
		$show = "question is added";
	}
	
	/*for showing categories*/
	
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
			setTimeout("if($('#myMsg').length>0){$('#myMsg').css('display','none');}",4000);
	</script>
 <body>
	<div class="teacher_panel">
		<div class="teacher_options">
			<h1 class="teacher_heading"> Teacher Options </h1>
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
					<h1> Add Category </h1> 
					<p> 
						<label for="category" class="cat"> add category</label>
						<input id="questioncat" name="questioncat" required="required" type="text" placeholder="add Category " />
					</p>
					<p class="signin button"> 
						<?php if(isset($catagoryadded)){ echo "<span class='msg' id='myMsg'>category is added</span>"; }?>
						<input type="submit" value="addcategory" id="addcategory" name="addcategory"/> 
					</p>
			</form>
			
				<form method="post" action="#" > 
					<h1> Add Question </h1> 
					<p> 
						<label for="question" class="quest"> add question</label>
						<input id="question" name="question" required="required" type="text" placeholder="add question " />
					</p>
					<p> 
						<div class="styled-select">
						   <select name="questcatselected" id="questcatselected">
								<?php echo($showcategoryvalue); ?>
						   </select>
						</div>
					</p>
					<p class="signin button"> 
						<?php if(isset($show)){ echo "<span class='msg' id='myMsg'>question is added</span>"; }?>
						<input type="submit" value="addquestion" id="addquestion" name="addquestion"/> 
					</p>
				</form>
			</div>
		</div>
	</div>
	</body>
 </html>