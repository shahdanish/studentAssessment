<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <link rel="stylesheet" type="text/css" href="../css/studentform.css" />
        <link rel="stylesheet" type="text/css" href="../css/style.css" />
		<link rel="stylesheet" type="text/css" href="../css/animate-custom.css" />
		<script src="../jquery/jquery-1.10.2.js" ></script>
    </head>
    <body>
   <script type="text/javascript">
 $( document ).ready(function() {
        $('#rollnumber' ).on( 'keyup', function( event ) {    	
        this.value=this.value.replace(/[^0-9\.]/g, '');
	 	var val = $("#rollnumber").val();
	});
	$("#submit_student").click(function(){
		var val1 = $("#usernamesignup").val();
		var val2 = $("#classselected").val();
		var val3 = $("#rollnumber").val();
		var val4 = $("#password_signup").val();
		if(val1==""||val2==""||val3==""||val4==""){
			$(".error").show();
		} else {
			$(".error").hide();
			$(".show_msg").load("../includes/studentsignup.php",{var1:val1,var2:val2,var3:val3,var4:val4});
		}
	});
});
</script>
<?php 

	include '../classes/databaseclass.php';
	$dbobj= new database();
	$sql = "SELECT * FROM class";
	$result = $dbobj->query($sql);
	$table = "";
	while($row=$dbobj->fetch($result)) {   
	$tablerow = "<option>" . $row['class_data'] . "</option>";
	$table .= $tablerow;
} 
	//while($row){
	 //echo $row['class_data'];
	 //}
?>
        <div class="container">
            <section>			
            	
                <div id="container_demo" >
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <form  action="" autocomplete="on"> 
                                <h1>Stundent Log In</h1> 
                                <p> 
                                    <label for="username" class="uname" data-icon="u" > Your email or username </label>
                                    <input id="username" name="username" required="required" type="text" placeholder="myusername or mymail@mail.com"/>
                                </p>
                                <p> 
                                    <label for="password" class="youpasswd" data-icon="p"> Your password </label>
                                    <input id="password_login" name="password" required="required" type="password" placeholder="eg. X8df!90EO" /> 
                                </p>
                                <p class="keeplogin"> 
									<!--input type="checkbox" name="loginkeeping" id="loginkeeping" value="loginkeeping" /> 
									<label for="loginkeeping">Keep me logged in</label-->
								</p>
                                <p class="login button"> 
                                    <input type="submit" value="Login" /> 
								</p>
                                <p class="change_link">
									Not a member yet ?
									<a href="#toregister" class="to_register">Join us</a>
								</p>
                            </form>
                        </div>

                        <div id="register" class="animate form">
                            <form> 
                                <h1> Student Sign Up </h1> 
                                <p> 
                                    <label for="usernamesignup" class="uname">Your name</label>
                                    <input id="usernamesignup" name="usernamesignup" required="required" type="text" placeholder="mysuperusername690" />
                                </p>
                                <p> 
                                    <div class="styled-select">
										   <select name="classselected" id="classselected">
										  <?php echo($table); ?>
										   </select>
									</div>
                                </p>
                                  <p> 
                                    <label for="rollnumber" class="rollnumber" > Roll number </label>
                                    <input id="rollnumber" name="rollnumber" required="required" type="text" placeholder="rollnumber"/> 
                                  </p>
                                <p> 
                                    <label for="password" class="youpasswd"> Your password </label>
                                    <input id="password_signup" name="password_signup" required="required" type="password" placeholder="eg. X8df!90EO" /> 
                                </p>
                                <p class="signin button"> 
									<span class="show_msg"></span>
									<span class="error">you must provide all values</span>
									<input type="button" value="Sign up" id="submit_student"/>
								</p>
                                <p class="change_link">  
									Already a member ?
									<a href="#tologin" class="to_register"> Go and log in </a>
								</p>
                            </form>
                        </div>
						
                    </div>
                </div>  
            </section>
        </div>
    </body>
</html>
