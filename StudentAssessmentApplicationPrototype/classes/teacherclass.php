<?php
class teacher{
	var $dbobj;
	function teacher(){
		$this->dbobj=new database();
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
	
}
?>