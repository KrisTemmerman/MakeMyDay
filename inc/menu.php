<?php session_start();

?>
  <div class="headerMenu">
			              <ul>
			                    <li> <a href="profile.php?id=<?php echo $_SESSION['userId'];?>"><?php echo $fullName;?></a></li>
			                    <li> <a href="settings.php">Settings</a></li>
			                    <li> Friends </li>
			                    <li> <a href="logout.php">Logout</a></li>
			                    
			                </ul>
			             <?php include 'search.php'; ?>       
	            	</div> 