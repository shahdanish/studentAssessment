<script src="../jquery/studentDashboard.js" ></script>
<?php
	$directoryURI = $_SERVER['REQUEST_URI'];
	$path = parse_url($directoryURI, PHP_URL_PATH);
	$components = explode('/', $path);
	$first_part = $components[5];
?>
<div class="teacher_options">
	<h1 class="teacher_heading"> Teacher Panel </h1>
	<div id="my_menu">
		<ul>
			<li class="<?php if ($first_part=='teacherdashboard.php') {echo 'active'; } else  {echo 'noactive';}?>" ><a href="teacherdashboard.php" > Add / Delete Class </a></li>
			<li class="<?php if ($first_part=='teacheraddquestion.php') {echo 'active'; } else  {echo 'noactive';}?>" ><a href="teacheraddquestion.php" > Add Question category </a></li>
			<li class="<?php if ($first_part=='teacheraddsubject.php') {echo 'active'; } else  {echo 'noactive';}?>"><a href="teacheraddsubject.php" > Add / Remove Subject </a></li>
			<li class="<?php if ($first_part=='teacherstartassessment.php') {echo 'active'; } else  {echo 'noactive';}?>" ><a href="teacherstartassessment.php" > Start Assesment </a></li>
			<li class="<?php if ($first_part=='teacherreport.php') {echo 'active'; } else  {echo 'noactive';}?>"><a href="teacherreport.php" > Student One to One Reports </a></li>
			<li class="<?php if ($first_part=='teacheronetomanyreport.php') {echo 'active'; } else  {echo 'noactive';}?>"><a href="teacheronetomanyreport.php" > Student One to many Reports </a></li>
			<li class="<?php if ($first_part=='teacheraveragereport.php') {echo 'active'; } else  {echo 'noactive';}?>" ><a href="teacheraveragereport.php" > Student Average Reports </a></li>
		</ul>
	</div>
	<form method="post" class="signin button" >
		<p class="signin button"> 
			<input type="submit" value="logout" name="logout" id="logout" /> 
		</p>
	</form>
</div>