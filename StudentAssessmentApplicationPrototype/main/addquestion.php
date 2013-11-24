<?php
	session_start();
	include '../classes/databaseclass.php';
	include '../classes/teacherclass.php';
	$teacherobj = new teacher();
	$teacherobj->checkToStartSession($_POST);
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
	$dbobj= new database();
	$sql = "SELECT * FROM questcat";
	$result = $dbobj->query($sql);
	$table = "";
	while($row=$dbobj->fetch($result)) {   
	$tablerow = "<option>" . $row['category'] . "</option>";
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
	<script>
			setTimeout("if($('#myMsg').length>0){$('#myMsg').css('display','none');}",4000);
	</script>
 <body>
	<div class="teacher_panel">
		<div class="teacher_options">
			<h1 class="teacher_heading">Teacher Options</h1>
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
								<?php echo($table); ?>
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