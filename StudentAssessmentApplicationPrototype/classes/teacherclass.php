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
}
?>