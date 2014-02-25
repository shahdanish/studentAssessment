<?php
	session_start();
	//echo "thsii is session".$_SESSION['username'];
	include '../classes/databaseclass.php';
	include '../classes/teacherclass.php';
	$teacherobj = new teacher();
	if(!isset($_SESSION['username'])){
		header("Location:teacherlogin.php");
	}
	
	if(isset($_POST['addsubject'])){
		$teacherobj->TeacherAddSubject($_POST);
	}
	
	if(isset($_POST['delsubject'])){
		$teacherobj->TeacherDelSubject($_POST);
	}
	
	if(isset($_POST['logout'])){
		$teacherobj->teacherSessionDestroy();
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
	function selectSubject(){
		var a=$( "#delclassselected" ).val();
		$("#delsubjectselect").load("../includes/showsubject.php",{clas:a});
	}
	</script>
 <body>
	<div class="teacher_panel">
	
		<?php include 'includes/teacher_options.php'; ?>
	
		<div id="container_demo">
			<div id="wrapper">
				<form method="post" action="#" > 
					<h1> Add Subject </h1> 
					<p> 
						<label for="class" class="class"> Select class to add subject</label>
					<p> 
						<div class="styled-select">
							<select name="addclassselected" id="addclassselected">
								<?php echo($showclasssvalue); ?>
							</select>
						</div>
                    </p>
					<p> 
						<label for="subject" class="subject"> add subject</label>
						<input id="subject" name="subject" required="required" type="text" placeholder="add subject " />
					</p>
					<p class="signin button"> 
						<input type="submit" value="Add Subject" id="addsubject" name="addsubject"/> 
					</p>
				</form>
				
				<form method="post" action="#" > 
					<h1> DElete Subject </h1> 
					<p> 
						<label for="class" class="class"> Select class to del subject</label>
					<p> 
					<div class="styled-select">
						<select name="delclassselected" id="delclassselected" onMouseDown="selectSubject()" >
							<?php echo($showclasssvalue); ?>
						</select>
					</div>
                    </p>
					<p> 
						<div class="styled-select">
							<select name="delsubjectselect" id="delsubjectselect">
								
							</select>
						</div>
                    </p>
					
					<p class="signin button"> 
						<input type="submit" value="Del Subject" id="delsubject" name="delsubject"/> 
					</p>
				</form>
			</div>
		</div>
	</div>
	</body>
 </html>