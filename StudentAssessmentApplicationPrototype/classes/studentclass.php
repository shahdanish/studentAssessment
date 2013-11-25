<?php
class student{
	var $dbobj;
	function student(){
		$this->dbobj=new database();
	}
	function insertStudent($post){
		@extract($post);
		$pass_encrypt=md5($_POST['var4']);
		$sql="INSERT INTO studentdata (std_name, std_class, std_rollnumber,std_password) 
		VALUES ('$_POST[var1]', '$_POST[var2]','$_POST[var3]','$pass_encrypt')";
		$result=$this->dbobj->query($sql);
		if($result)
		{
			echo"your record has bee updated";
		} else {
			echo "problem occur values not inserted";
		}
	}
	function checkToStartSession($post){
		@extract($post);
		if(isset($_POST['student_name'])&&isset($_POST['student_pass'])){
			$sname = $_POST['student_name'];
			$spass = $_POST['student_pass'];
			$sql = "SELECT * FROM studentdata WHERE std_name = '$sname' AND std_password = '$spass'";
			$result = $this->dbobj->query($sql);
			$row = $this->dbobj->fetch($result);
			echo "this is username".$row['std_name'];
			$sid = $row['std_id'];
			echo $sid;
			$this->sessionStart($sid,$sname);
			}
		}
	function sessionStart($id,$username){
		//session_start();
		$_SESSION['id']=$id;
		$_SESSION['username']=$username;
	}
	
	function studentSessionDestroy(){
		session_start();
		session_destroy();
		header("location:../main/studentsignup.php");
	}
}
?>
