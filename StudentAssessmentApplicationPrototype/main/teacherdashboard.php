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
	if(isset($_POST['addclass'])){
		$teacherobj->TeacherAddClass($_POST);
		$result = "class is added";
	}
	if(isset($_POST['delclass'])){
		$teacherobj->TeacherDelClass($_POST);
		$deletedresult = "class is deleted";
	}
	$showclasssvalue=$teacherobj->showClasses();
	
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
			setTimeout("if($('#myMsg1').length>0){$('#myMsg1').css('display','none');}",4000);
			setTimeout("if($('#myMsg2').length>0){$('#myMsg2').css('display','none');}",4000);
	</script>
 <body>
	<div class="teacher_panel">
	
		<?php include 'includes/teacher_options.php'; ?>
	
		<div id="container_demo">
			<div id="wrapper">
				<form method="post" action="#" > 
					<h1> Add class </h1> 
					<p> 
						<label for="usernamesignup" class="uname"> add classes</label>
						<input id="classtoadd" name="classtoadd" required="required" type="text" placeholder="add in BS-Se-1st format" />
					</p>
					<p class="signin button"> 
						<?php if(isset($result)){ echo "<span class='msg1' id='myMsg1'>class is added</span>"; }?>
						<input type="submit" value="add" id="addclass" name="addclass"/> 
					</p>
				</form>
				<form method="post" action="#" > 
					<h1> Delete class </h1> 
					<p> 
						<div class="styled-select">
							<select name="classselected" id="classselected">
								<?php echo($showclasssvalue); ?>
							</select>
						</div>
                                </p>
					<p class="signin button"> 
					<?php if(isset($deletedresult)){ echo "<span class='msg2' id='myMsg2'>Class deleted</span>"; }?>
						<input type="submit" value="delete" id="delclass" name="delclass"/> 
					</p>
				</form>
			</div>
		</div>
	</div>
	</body>
 </html>