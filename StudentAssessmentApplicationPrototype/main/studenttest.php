<?php
	session_start();
	include '../classes/databaseclass.php';
	include '../classes/studentclass.php';
	$studentobj = new student();
	
	if(isset($_POST['submittestdata'])){
		if (isset($_GET['student'])) {
			$student = $_GET['student'];
		} else {
			$student = '';
		}
		$studentobj->testdatatodatabase($_POST);
		header("Location:studentdashboard.php?hide=$student");
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
		<script src="../jquery/studentDashboard.js" ></script>
    </head>
 <body>
	<div class="question_panel">
		<div id="container_demo">
			<div id="wrapper">
				<a href="studentdashboard.php" style="float:right">Go back to your profile</a>
					<?php
					$studentid = $_GET['student'];
					echo $studentid;
					if (isset($_GET['student_name'])){
						$studentasseed = $_GET['student_name'];
						$sql = "SELECT std_name FROM studentdata WHERE std_id = '$studentasseed'";
						$exec = mysql_query($sql);
						$studentBeingAssessed = mysql_fetch_assoc($exec);
						echo "<span>Assessment of ".$studentasseed." by ".$_SESSION['username'] ."</span>";
					}
					echo "<br><span>For the class : <b> ". $_SESSION['starttestclass']."</b> <br> For subject of <b>" .$_SESSION['starttestsub']."</b><br>For category of <b>" .$_SESSION['starttestcat']."</b></span>";
					?>
				
				<div class="testForm">
					<form name="testdata" id="testdata" method="POST">
						<?php
							echo $testquestdata;
						?>
						<input type ="hidden" name="studenttobeasssed" id="studenttobeasssed" value="<?php echo $studentasseed;?>" >
						<input type="submit" id="submittestdata" name="submittestdata" value="submit test data">
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
 </html>