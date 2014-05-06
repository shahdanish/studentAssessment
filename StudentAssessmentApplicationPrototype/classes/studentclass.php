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
		unset($_SESSION['username']);
		//session_destroy();
		header("location:../main/studentsignup.php");
	}
	
	function showstudent($loggedInUser){
		if($_SESSION['class']==$_SESSION['starttestclass']) {
			$clas = $_SESSION['starttestclass'];
			$sql = "SELECT * FROM studentdata WHERE std_class = '$clas'";
			$showresult=$this->dbobj->query($sql);
			$classresult = "";
			while($row=$this->dbobj->fetch($showresult)){
				if($row['std_name']==$loggedInUser) {
					$student_name = "";
				} else {
					$student_name = $row['std_name'];
					$student_id = $row['std_id'];
				}
				if ($student_name!="") {
					$tablerow = "<div class='studentListing'><a href=studenttest.php?student=$student_id&&student_name=$student_name>$student_name</a></div>";
					$classresult .= $tablerow;
				}
			}
		} else {
			$classresult = "Your Test is Not Statrted Yet"; 
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
		$i=1;
		while($row=$this->dbobj->fetch($showresult)){
			$testquest= $row['quest'];
			$qid= $row['quest_id'];
			$tablerow = "<div class='question_style'>".$testquest."<span id=testradio><input type='radio' id='$qid' name='$i' class='ans' value='1'>1
																	<input type='radio' id='$qid' name='$i' value='2' class='ans'>2
																	<input type='radio' id='$qid' name='$i' value='3' class='ans' >3
																	<input type='radio' id='$qid' name='$i' value='4' class='ans'>4</span></div>";
			$classresult .= $tablerow;
			$i++;
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

	function checkteststatusagain(){
	if (isset($_SESSION['starttestclass']) && isset($_SESSION['starttestsub'])&& isset($_SESSION['starttestcat'])&& isset($_SESSION['teststatus'])) {
			$starttest="start";
		}
		else {
			$starttest="stop";
		}
		return $starttest;
	}

	function testdatatodatabase($post){
		@extract($post);
		$username= $_SESSION['username'];
		$testclas=$_SESSION['starttestclass'];
		$testsub=$_SESSION['starttestsub'];
		$testcat=$_SESSION['starttestcat'];
		$studtobeassesd= $_POST['studenttobeasssed'];
		$test_id=$_SESSION['test_id'];
		$sql = "SELECT * FROM question WHERE quest_cat = '$testcat'";
		$resultcat=$this->dbobj->query($sql);
		$num_rows = mysql_num_rows($resultcat);
		$err=0;
		for ($j=1; $j<=$num_rows; $j++){
			if(!isset($_POST[$j])){
			$err++;		
			}	
		}
		
		if($err>0){
			echo "plz fill the  <h6>".$err ." </h6>  radio buttons to submit again";
		} else {
			$i=1;
			$avg_ans = 0;
			while($row=$this->dbobj->fetch($resultcat)){
				$testquestion=$row['quest'];
				$answers = $_POST[$i];
				$avg_ans += $_POST[$i];
				 $sql1= "INSERT INTO testdata (studentassessor, studentassessd, subject , class , category , question , answer , testid) 
										VALUES ('$username', '$studtobeassesd','$testsub','$testclas','$testcat' ,'$testquestion','$answers' ,'$test_id')";
				$this->dbobj->queryy($sql1);
				$i++;
			 }
			 $i=$i-1;
			 $avg_ans = $avg_ans/$i;
			$query_avg_answers = "INSERT INTO testaverragereports (assessor, assessed, averrageAnswer , testId) 
										VALUES ('$username', '$studtobeassesd', '$avg_ans' ,'$test_id')";
			$this->dbobj->query($query_avg_answers);
		 }
	}
}
?>
