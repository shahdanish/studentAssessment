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
<<<<<<< HEAD
	if(isset($_POST['teacher_name'])&&isset($_POST['teacher_pass'])){
=======
	if(isset($_POST['classtoadd']))
		{
			$sql="INSERT INTO class (class_data) 
			VALUES ('$_POST[classtoadd]')";
			$db->query($sql);
		}	
	if(isset($_POST['teacher_name'])||isset($_POST['teacher_name'])){
>>>>>>> d86e649028986b51c042f0d354045d59f2fad914
	$tname = $_POST['teacher_name'];
	$tpass = $_POST['teacher_pass'];
	echo $tname;
	$sql = "SELECT * FROM teacherinfo WHERE teacher_name = '$tname' AND teacher_pass = '$tpass' ";
	$result = $db->query($sql);
	$row = $db->fetch();
    $tid = $row['tid'];
	$db->sessionStart($tid,$tname);	
		echo $_SESSION['id'];
		session_destroy();
		if(!isset($_SESSION['id'])){
			header("Location:../teacherlogin.php");
		}
	}
	?>
<<<<<<< HEAD
	<div class="teacher_panel">
		<div class="teacher_options">
			<h1 class="teacher_heading">Teacher Options</h1>
			<form action="../class/logout.php" method="POST">
=======
<<<<<<< HEAD
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
                                <p class="login button" id="logoutbutt"> 
	               					<input type="button" value="Logout" id="logout" > 
								</p>
					        </form>
			    </div>	
			    <div id="show_data">
			    	
			    </div>
		
=======
		
	<div id="wrapper">
>>>>>>> d86e649028986b51c042f0d354045d59f2fad914
				<p class="login button" id="logoutbutt"> 
					<input type="submit" value="Logout" id="logout" name="logout" >
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
<<<<<<< HEAD
=======
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
	
	<a href ="../backend/addclasses.php">go to add some classes</a>
 
>>>>>>> 24ad64a1aec4db88a11aacb72e18cff8b24fe544
>>>>>>> d86e649028986b51c042f0d354045d59f2fad914
	</body>
 </html>