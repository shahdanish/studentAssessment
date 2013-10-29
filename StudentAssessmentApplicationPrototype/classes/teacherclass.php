<?php
class teacher{
	
	function sessionStart($id,$username){
		session_start();
		$_SESSION['id']=$id;
		$_SESSION['username']=$username;
		//header("location:../signupform.php");
	}
	
	function teacherSessionDestroy(){
		session_start();
		session_destroy();
		header("location:../main/teacherlogin.php");
	}
}
?>