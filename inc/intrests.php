<?php
	session_start();
	if(!isset($_SESSION['logged_in'])) { 
	   header("Location: index.php"); 
	}
	require('global.inc.php');
	$id = $user->id;
	$intrestInit = new Intrests();
	$allIntrestNames = $intrestInit->getAllIntrestNames();
	$intrests = $intrestInit->selectMemberIntrest($id);
	$allIntrestId = $intrestInit->getAllIntrestId();
?>

<div class="intrests">
	<p>Welcome, please tell us what you are interested in, so we can make a match between <br/>
	<?php echo $_SESSION['loginTimes'];?>
		Your intrests and our activities.</p>
	<form name="intrests">
		<?php if ($_SESSION['loginTimes'] > 1){
				for($i=0;$i<count($allIntrestNames);$i++){	
			?>		
					<label>
					<input type="checkbox" name="<?php echo $allIntrestId[$i];?>" />
						<?php 
							 echo $allIntrestNames[$i];
                            echo 'hihi'
						?></label>
	 	<?php } } ?>
		<input class="green" type="submit" name="intrestSubmit" value="Add intrest" />
	</form>
	<script type="text/javascript" src="scripts/jQuery/addIntrest.js"></script>
</div>