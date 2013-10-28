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
	if(isset($_POST['teacher_name'])||isset($_POST['teacher_name'])){
	$tname = $_POST['teacher_name'];
	$tpass = $_POST['teacher_pass'];
	$sql = "SELECT * FROM teacherinfo WHERE teacher_name = '$tname' AND teacher_pass = '$tpass' ";
	$result = $db->query($sql);
	$row = $db->fetch();
    $tid = $row['tid'];
	$db->sessionStart($tname,$tid);	
	}
	?>
		
	<div id="wrapper">
				<p class="login button" id="logoutbutt"> 
               		<input type="button" value="Logout" id="logout" > 
				</p>
	</div>
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
 
	</body>
 </html>