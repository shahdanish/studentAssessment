<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <link rel="stylesheet" type="text/css" href="css/studentform.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
		<link rel="stylesheet" type="text/css" href="css/animate-custom.css" />
		<script src="jquery/jquery-1.10.2.js" ></script>
    </head>
    <body>
   <script type="text/javascript">
 $( document ).ready(function() {
        $('#rollnumber' ).on( 'keyup', function( event ) {     	
        this.value=this.value.replace(/[^0-9\.]/g, '');
        $('#submit').on('click',function(event){
        	$('#show_status').load("../main/studentsignup.php",{val: value});
        });
    });
</script>
        <div class="container">
            <section>			
            	
                <div id="container_demo" >
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <form  action="teacherdashboard.php" autocomplete="on"> 
                                <h1>Stundent Log In</h1> 
                                <p> 
                                    <label for="username" class="uname" data-icon="u" > Your email or username </label>
                                    <input id="username" name="username" required="required" type="text" placeholder="myusername or mymail@mail.com"/>
                                </p>
                                <p> 
                                    <label for="password" class="youpasswd" data-icon="p"> Your password </label>
                                    <input id="password" name="password" required="required" type="password" placeholder="eg. X8df!90EO" /> 
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
                            <form > 
                                <h1> Student Sign Up </h1> 
                                <p> 
                                    <label for="usernamesignup" class="uname">Your name</label>
                                    <input id="usernamesignup" name="usernamesignup" required="required" type="text" placeholder="mysuperusername690" />
                                </p>
                                <p> 
                                    <div class="styled-select">
										   <select name="classselected" id="classselected">
										      <option>Bsse1st</option>
										      <option>bsse2nd</option>
										      <option>Bsse3rd</option>
										      <option>bsse4th</option>
										      <option>Bsse5th</option>
										      <option>bsse6th</option>
										      <option>Bsse7th</option>
										      <option>bsse8th</option>
										   </select>
										</div>
                                </p>
                                  <p> 
                                    <label for="rollnumber" class="rollnumber" > Roll number </label>
                                    <input id="rollnumber" name="rollnumber" required="required" type="text" placeholder="rollnumber"/> 
                                  </p>
                                <p> 
                                    <label for="password" class="youpasswd"> Your password </label>
                                    <input id="password" name="password" required="required" type="password" placeholder="eg. X8df!90EO" /> 
                                </p>
 
                                <p class="signin button"> 
									<input type="button" value="Sign up" id="submit"/>
								</p>
								<span id="show_status" style=""></span>
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