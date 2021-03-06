<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6 lt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7 lt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8 lt8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
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
        $( '#rollnumber' ).on( 'keyup', function( event ) {     	
        this.value=this.value.replace(/[^0-9\.]/g, '');
	});
});
</script>
		<div class="container">
			<section>
				<div id="container_demo" >
					<div id="wrapper">
						<div id="login" class="animate form">
							<form  action="teacherdashboard.php" autocomplete="on" method="post"> 
								<h1>Teacher Log in</h1> 
								<p> 
									<label for="teacher_name" class="teacher_name" data-icon="u" > Your email or username </label>
									<input id="teacher_name" name="teacher_name" required="required" type="text" placeholder="myusername or mymail@mail.com"/>
								</p>
								<p> 
									<label for="password" class="youpasswd" data-icon="p"> Your password </label>
									<input id="teacher_pass" name="teacher_pass" required="required" type="password" placeholder="eg. X8df!90EO" /> 
								</p>
								<p class="login button"> 
									<input type="submit" value="Login" /> 
								</p>
							</form>
						</div>
					</div>
				</div>  
			</section>
		</div>
    </body>
</html>