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
}
?>
