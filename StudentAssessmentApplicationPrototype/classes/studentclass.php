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
	function checkToStartSession($tn,$tp){
		$sql = "SELECT * FROM studentdata";
		$result = $this->dbobj->query($sql);
		$row = mysql_fetch_assoc($result);
		if($row['std_name']==$tn&&$row['std_password']==$tp){
		echo $row['std_id'];
			$tid = $row['std_id'];
			$this->sessionStart($tid,$tn);
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
