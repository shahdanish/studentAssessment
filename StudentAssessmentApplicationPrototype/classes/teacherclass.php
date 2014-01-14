<?php
class teacher{
	var $dbobj;
	function teacher(){
		$this->dbobj=new database();
		$this->dbobj2=new database();
	}
	function checkToStartSession($tn,$tp){
		$sql = "SELECT * FROM teacherinfo";
		$result = $this->dbobj->query($sql);
		$row = mysql_fetch_assoc($result);
		if($row['teacher_name']==$tn&&$row['teacher_pass']==$tp){
			$tid = $row['tid'];
			$this->sessionStart($tid,$tn);
		}
	}
	function TeacherAddClass($post){
		@extract($post);
		if(isset($_POST['classtoadd'])){
				$classname = $_POST['classtoadd'];
				$sql = "INSERT INTO class (class_data)
				VALUES ('$classname')";
				$this->dbobj->query($sql);
			}
	}
	function TeacherDelClass($post){
		@extract($post);
		if(isset($_POST['classselected'])){
				$deleteclassname = $_POST['classselected'];
				$sql = "DELETE FROM class WHERE class_data='$deleteclassname'";
				$this->dbobj->query($sql);
				$sql = "DELETE FROM studentdata WHERE std_class='$deleteclassname'";
				$this->dbobj->query($sql);
			}
	}
	function TeacherAddQuest($post){
		@extract($post);
		if(isset($_POST['addquestion'])){
				$question = $_POST['question'];
				$questcat = $_POST['questcatselected'];
				$sql = "INSERT INTO question (quest,quest_cat)
				VALUES ('$question','$questcat')";
				$this->dbobj->query($sql);
			}
	}
	function TeacherAddCategory($post){
		@extract($post);
		if(isset($_POST['addcategory'])){
				$cat = $_POST['questioncat'];
				$sql = "INSERT INTO questcat (category)
				VALUES ('$cat')";
				$this->dbobj->query($sql);
			}
	}
	
	function sessionStart($id,$username){
		//session_start();
		$_SESSION['id']=$id;
		$_SESSION['username']=$username;
	}
	
	function teacherSessionDestroy(){
		session_start();
		session_destroy();
		header("location:../main/teacherlogin.php");
	}
	
	function showClasses(){
	
		$sql = "SELECT * FROM class";
		$showresult=$this->dbobj->query($sql);
		$classresult = "";
		while($row=$this->dbobj->fetch($showresult)){
			$tablerow = "<option>" . $row['class_data'] . "</option>";
			$classresult .= $tablerow;
		}
		return $classresult;
	}
	
	function showCategory(){
	
		$sql = "SELECT * FROM questcat";
		$showresult=$this->dbobj->query($sql);
		$classresult = "";
		while($row=$this->dbobj->fetch($showresult)){
			$tablerow = "<option>" . $row['category'] . "</option>";
			$classresult .= $tablerow;
		}
		return $classresult;
	}

	function TeacherAddSubject($post){
		@extract($post);
			$adtoclass=$_POST['addclassselected'];
			$sub=$_POST['subject'];
			$sql = "INSERT INTO subject (subject_name,subject_class)
			VALUES ('$sub','$adtoclass')";
			$this->dbobj->query($sql);	
	
	}
	function teacherstartTest($post){
		@extract ($post);
		if(isset($_POST['selectClass']) && isset($_POST['selectedSubject']) && isset($_POST['selectCat'])){
		$sclas=$_POST['selectClass'];
		$ssub=$_POST['selectedSubject'];
		$scat=$_POST['selectCat'];
		$_SESSION['starttestclass']="$sclas";
		$_SESSION['starttestsub']="$ssub";
		$_SESSION['starttestcat']="$scat";
		$_SESSION['teststatus']="1";
		$sql = "INSERT INTO testinfo (test_class,test_subject,test_category)
				VALUES ('$sclas','$ssub','$scat')";
				$result=$this->dbobj->query($sql);
			if($result){
				$sql1 = "SELECT max(test_id) AS max FROM testinfo";
				$result1=$this->dbobj->query($sql1);
				$row= $this->dbobj->fetch($result1);
				$_SESSION['test_id']=$row['max'];
			}
		}	
	}
	function teacherstopTest(){
	unset($_SESSION['starttestclass']);
	unset($_SESSION['starttestsub']);
	unset($_SESSION['starttestcat']);
	$_SESSION['teststatus']="0";
		}
		
	function TeacherDelSubject($post){
		@extract($post);
			$delclass=$_POST['delclassselected'];
			$delsub=$_POST['delsubjectselect'];
			$sql = "DELETE FROM subject WHERE subject_name = '$delsub' && subject_class='$delclass'";
			$this->dbobj->query($sql);	
	}
	
	function showTest(){
	
		$sql = "SELECT * FROM testinfo";
		$showresult=$this->dbobj->query($sql);
		$testresult = "";
		while($row=$this->dbobj->fetch($showresult)){
			$tablerow = "<option value=".$row['test_id']."> test no : " . $row['test_id'] . "</option>";
			$testresult .= $tablerow;
		}
		return $testresult;
	}
	
	function testClass($testId) {
		$sql = "SELECT class FROM testdata WHERE testid = '$testId'";
		$showresult = $this->dbobj->query($sql);
		while($row=$this->dbobj->fetch($showresult)){
			$class = $row['class'];
		}
		$queryy = "SELECT * FROM studentdata WHERE std_class = '$class'";
		$showresult2 = $this->dbobj2->query($queryy);
		$classStudent = "";
		while($row2=mysql_fetch_assoc($showresult2)){
			$tablerow2 = "<option value=".$row2['std_name']."> " . $row2['std_name'] . "</option>";
			$classStudent .= $tablerow2;
		}
			// echo "<input type='text' name='test_id' value=".$testId." />";
		return $classStudent.="<input type='hidden' name='test_id' value=".$testId." />";
	}
	
	/*one to one report*/
	function showAssessmentRecord($assessor,$assessed,$test_id) {
		$assessQuery = "SELECT * FROM testdata WHERE studentassessor = '$assessor' AND studentassessd ='$assessed' AND testid='$test_id'";
		$reportdata = $this->dbobj->query($assessQuery);
		$reportdata2 = $this->dbobj2->query($assessQuery);
		$row2=$this->dbobj2->fetch($reportdata2);
		$html_result = "<strong>".$row2['studentassessor']."</strong> assessed <strong>".$row2['studentassessd']."</strong> in subject <strong>".$row2['subject']."</strong> category <strong>".
			$row2['category']."</strong> and class <strong>".$row2['class']. "</strong>";
		$html_result = $html_result."<table><th> Question </th><th> answer </th>";
		while($row=$this->dbobj->fetch($reportdata)){
			$html_result = $html_result.
				"<tr>
					</td><td>".$row['question']."</td><td>".$row['answer']."</td>
				</tr>";
		}
		$html_result = $html_result."</table>";
		return $html_result;
	}
	
	/*one to many reports*/
	function showAssessmentOnetoMany($assessor,$test_id) {
		$assessQuery = "SELECT * FROM testdata WHERE studentassessor = '$assessor' AND testid='$test_id'";
		$reportdata = $this->dbobj->query($assessQuery);
		$reportdata2 = $this->dbobj2->query($assessQuery);
		$row2=$this->dbobj2->fetch($reportdata2);
		$html_result = "<strong>".$row2['studentassessor']."</strong> assessed <strong>".$row2['studentassessd']."</strong> in subject <strong>".$row2['subject']."</strong> category <strong>".
			$row2['category']."</strong> and class <strong>".$row2['class']. "</strong>";
		$html_result = $html_result."<table><th> Question </th><th> answer </th>";
		while($row=$this->dbobj->fetch($reportdata)){
			$html_result = $html_result.
				"<tr>
					<td>".$row['question']."</td><td>".$row['answer']."</td>
				</tr>";
		}
		$html_result = $html_result."</table>";
		return $html_result;
	}
	/*for class report*/
	
	function Classalltest($selectedClass) {
		$sql = "SELECT * FROM testinfo WHERE test_class = '$selectedClass'";
		$showresult = $this->dbobj->query($sql);
		
		$classStudent = "";
		while($row=$this->dbobj->fetch($showresult)){
			$tablerow = "<option value=".$row['test_id']."> " . $row['test_subject']."<strong> and </strong>".$row['test_category']  . "</option>";
			$classStudent .= $tablerow;
		}
		return $classStudent;
	}
	function showSingleTestReport($test_id) {
		$assessQuery = "SELECT * FROM testdata WHERE testid = '$test_id'";
		$reportdata = $this->dbobj->query($assessQuery);
		$reportdata2 = $this->dbobj2->query($assessQuery);
		$row2=$this->dbobj2->fetch($reportdata2);
		$html_result = "<strong> Test For </strong>".$row2['subject']."<strong> In category </strong>".
			$row2['category']."<strong> And For class </strong>".$row2['class'];
		$html_result = $html_result."<table><th> Assesor </th><th> Assesed </th><th> Question </th><th> answer </th>";
		while($row=$this->dbobj->fetch($reportdata)){
			$html_result = $html_result.
				"<tr>
					<td>".$row['studentassessor']."</td><td>".$row['studentassessd']."</td><td>".$row['question']."</td><td>".$row['answer']."</td>
				</tr>";
		}
		$html_result = $html_result."</table>";
		return $html_result;
	}
	function showTestClasses(){
	
		$sql = "SELECT DISTINCT(test_class) FROM testinfo ORDER BY 'test_class'";
		$showresult=$this->dbobj->query($sql);
		$classresult = "";
		while($row=$this->dbobj->fetch($showresult)){
			$tablerow = "<option>" . $row['test_class'] . "</option>";
			$classresult .= $tablerow;
		}
		return $classresult;
	}
}
?>