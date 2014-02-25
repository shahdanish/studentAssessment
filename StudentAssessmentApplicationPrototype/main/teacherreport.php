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
	
	if(isset($_POST['showrepo'])) {
		$testId = $_POST['selectClass'];
		$showClass = $teacherobj->testClass($testId); 
	}
	
	if(isset($_POST['showAssessment'])) {
		$assessor = $_POST['assessor'];
		$assessed = $_POST['assessedBy'];
		$test_id = $_POST['test_id'];
		$showAssessment = $teacherobj->showAssessmentRecord($assessor,$assessed,$test_id);
	}
	
	$showtestvalue=$teacherobj->showTest();
	
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
					<div class="styled-select" >
						<label class="uname"> Select Test </label>
						<select name="selectClass" id="selectClass">
							<?php echo($showtestvalue); ?>
						</select>
					</div>
					<p class="signin button"> 
						<input type="submit" value="Show Report" id="showrepo" name="showrepo"/>
					</p>
				</form>
				<div class="genericreport">
					<form method="post" action="#" > 
						<?php 
							if(isset($_POST['showrepo'])) {
								?>
								<div class="styled-select" >
									<label class="uname"> Assessor </label>
									<select name="assessor" id="selectClass">
										<?php echo $showClass; ?>
									</select>
								</div>
								
								<div class="styled-select" >
									<label class="uname"> Assessed By </label>
									<select name="assessedBy" id="selectClass">
										<?php echo $showClass; ?>
									</select>
								</div>
								<p class="signin button"> 
									<input type="submit" value="Show Assessment" id="showAssessment" name="showAssessment"/>
								</p>
							<?php
							}
						?>
					</form>
					<div class="showGenericReport">
						<?php
							if(isset($_POST['showAssessment'])) {
								echo $showAssessment;
							}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
	</body>
 </html>