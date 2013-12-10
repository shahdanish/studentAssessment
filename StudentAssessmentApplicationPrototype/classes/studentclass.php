<?php
class student {

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
	
	function checkToStartSession($tn,$tp) {
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
		$_SESSION['id']=$id;
		$_SESSION['username']=$username;
		$_SESSION['class']=$clas;
	}
	
	function studentSessionDestroy(){
		session_start();
		session_destroy();
		header("location:../main/studentsignup.php");
	}
	
	function showstudent(){
		$clas=$_SESSION['starttestclass'];
		$sql = "SELECT * FROM studentdata WHERE std_class='$clas'";
		$showresult=$this->dbobj->query($sql);
		$classresult = "";
		while($row=$this->dbobj->fetch($showresult)){
			$student_name= $row['std_name'];
			$tablerow = "<div><a href=student_test.php?student=$student_name>$student_name</a></div>";
			$classresult .= $tablerow;
		}
		return $classresult;
	}
	
	function showquestion(){
		$testclas=$_SESSION['starttestclass'];
		$testsub=$_SESSION['starttestsub'];
		$testcat=$_SESSION['starttestcat'];
		$sql = "SELECT * FROM question WHERE quest_cat='$testcat'";
		$showresult=$this->dbobj->query($sql);
		$classresult = "";
		while($row=$this->dbobj->fetch($showresult)){
			$testquest= $row['quest'];
			$qid= $row['quest_id'];
			
			$tablerow = "<div >".$testquest."<span id=testradio><input type='radio' id='$qid' name='$qid' value='1'>1<input type='radio' id='$qid' name='$qid' value='2'>2<input type='radio' id='$qid' name='$qid' value='3'>3<input type='radio' id='$qid' name='$qid' value='4'>4</span></div>";
			$classresult .= $tablerow;
		}
		return $classresult;
	}
	
	function checkteststatus(){
	if (isset($_SESSION['starttestclass']) && isset($_SESSION['starttestsub'])&& isset($_SESSION['starttestcat'])&& isset($_SESSION['teststatus'])) {
			$starttest="start";
		}
		else {
			$starttest="stop";
		}
		
		return $starttest;
	}
}
?>
