<html>
	<head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" type="text/css" href="../css/studentform.css" />
        <link rel="stylesheet" type="text/css" href="../css/style.css" />
		<link rel="stylesheet" type="text/css" href="../css/animate-custom.css" />
	
    </head>
 <body>
	<?php
	include '../class/studentclass.php';
	$db = new database('localhost', 'studentassessment', 'root', '');
	if(isset($_POST['teacher_name'])||isset($_POST['teacher_pass'])){
	$tname = $_POST['teacher_name'];
	$tpass = $_POST['teacher_pass'];
	$sql = "SELECT * FROM teacherinfo WHERE teacher_name = '$tname' AND teacher_pass = '$tpass' ";
	$result = $db->query($sql);
	$row = $db->fetch();
    $tid = $row['tid'];
	$db->sessionStart($tid,$tname);	
		session_destroy();
		if(!isset($_SESSION['id'])){
			header("Location:../teacherlogin.php");
		}
	}
	?>
	<div class="teacher_panel">
		<div class="teacher_options">
			<h1 class="teacher_heading">Teacher Options</h1>
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