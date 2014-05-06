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
	
	if(isset($_POST['checkTest'])||isset($_GET['hide'])) {
		$teststatus= $studentobj->checkteststatus();
		if($teststatus=="start"){
			$studentdata=$studentobj->showstudent($_SESSION['username']);
		}
	}
	
	if(isset($_POST['logout'])) {
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
		<script src="../jquery/studentDashboard.js" ></script>
    </head>
 <body>
	<div class="student_panel">
		<div id="container_demo">
			<div id="wrapper" width=>
				<form method="post" action="#" > 
					<h1>  student Profile </h1> 
					<div class="studentProfile">
						<p style="text-align:center">Student info  </p>
						<p style="text-align:center">Student name : <?php  if(isset($_SESSION['username'])) { echo $_SESSION['username']; } ?> </p>
						<p style="text-align:center">Class:  <?php if(isset($_SESSION['class'])) echo $_SESSION['class'];  ?>    </p>
						
					</div>
					<p class="signin button"> 
						<input type="submit" value="logout" name="logout" id="logout" /> 
					</p>
					<p class="signin button"> 
						<input type="hidden" name="studentclass" id="studentclass" value="$_SESSION[class]">
						<input type="submit" value="check test status" name="checkTest" id="checkTest" /> 
					</p>
				</form>
			</div>
		</div>
		
		<div id="container_demo">
			<div id="wrapper" width=>
					<div class="teacher_panel">
						<?php
			if(isset($teststatus))
			{
				if($teststatus=="start"){
				?>
				<div class="studentshow">
					<h1>Class Fellows</h2>
					<?php echo $studentdata; ?>
				</div>
				<?php
				} else {
				?>
				<div> test stoped </div>
				<?php
				
				}
			}
		?>
						
					</div>
			</div>
		</div>
	</div>
</body>
 </html>