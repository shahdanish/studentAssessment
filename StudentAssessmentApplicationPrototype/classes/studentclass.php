<?php
class student{
	var $dbobj;
	function student(){
		$this->dbobj=new database();
	}
	function insertStudent($post){
		@extract($post);
		$pass_encrypt=$_POST['var4'];
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
		while($row = mysql_fetch_assoc($result)){
			  if($row['std_name']==$tn&&$row['std_password']==$tp){
				$cls = $row['std_class'];
				$id = $row['std_id'];
				$this->sessionStart($id,$tn,$cls);
			  }
		 }
	}
	function sessionStart($id,$username,$clas){
		//session_start();
		$_SESSION['id']=$id;
		$_SESSION['username']=$username;
		$_SESSION['class']=$clas;
	}
	
	function studentSessionDestroy(){
		session_start();
		session_destroy();
		header("location:../main/studentsignup.php");
	}
	function checkteststatus($post){
		@extract($post);
		//not working yet
		if (isset($_POST['studentclass'])){
			$testclass=$_POST['studentclass'];
			echo"$testclass";
			}
		}
}
?>
