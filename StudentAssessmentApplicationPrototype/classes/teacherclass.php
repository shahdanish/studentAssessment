<?php
class teacher{
	var $dbobj;
	function teacher(){
		$this->dbobj=new database();
	}
	function checkToStartSession($post){
		@extract($post);
		if(isset($_POST['teacher_name'])&&isset($_POST['teacher_pass'])){
			$tname = $_POST['teacher_name'];
			$tpass = $_POST['teacher_pass'];
			$sql = "SELECT * FROM teacherinfo WHERE teacher_name = '$tname' AND teacher_pass = '$tpass'";
			$result = $this->dbobj->query($sql);
			$row = $this->dbobj->fetch();
			$tid = $row['tid'];
			$this->sessionStart($tid,$tname);
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