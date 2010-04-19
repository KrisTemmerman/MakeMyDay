<?php
session_start();
?>
<div id="errorbar">
	<div id="error">
		<p>
			<?php 
				if ($_SESSION['error'] ==1){
					echo 'Email address allready in use';
				}
				if($_SESSION['error'] == 2){
					echo 'The Passwords did not match';
				}
				if($_SESSION['error'] == 3){
					echo 'Please set a profile picture!';
				}
				if($_SESSION['loginTimes'] == 1){
					echo "This is the first time you login, you have to specify  <a href=\"intrests.php\">intrests</a>";
				}
			?>
		</p>
	</div>
</div>