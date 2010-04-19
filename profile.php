<?php

session_start();
if(!isset($_SESSION['logged_in'])) { 
    header("Location: index.php"); 
}
require_once('/inc/_header.php');
//get the user object from the session 
$user = unserialize($_SESSION['user']);
if(isset($_GET['id'])){
$id = $_GET['id'];	
$userId = $user->id;
$qry = 'SELECT * FROM members WHERE id = '. $id;
$result = mysql_query($qry) or die(mysql_error());
$row = mysql_fetch_assoc($result); 

	?>
	<div id="container">
		<div id="contentPages">
            <div class="ProfilePic">
                <img  alt="profile Picture" src="<?php echo $row['photo'];?>" width="151" />
            </div>
            <input class="friendId" type="hidden" value="<?php echo $id ?>" />
            <?php
            echo '<p> Name : '.$row['firstName']. ' ' .$row['lastName'].'

                    <br \> Birthday : '.$row['dateOfBirth']. '<br \>
                    Address : '.$row['street']. ' ' .$row['number']. '<br \>'.$row['zip']. ' ' .$row['city']. '</p>';
            ?>
            <div class="checkFriends">
                <?php
                    $qry = 'SELECT confirmed from friends WHERE '.$_SESSION['userId'].'='.$id;
                    $result = mysql_query($qry) or die(mysql_error());
                    $conf = mysql_fetch_assoc($result);
                    
                    if($conf['confirmed'] = 0){
                        echo '<a class="friendRequest"href="#"><p>  become a friend of '.$row['firstName']. ' ' .$row['lastName'].'</p></a>';
                    }else if($conf['confirmed'] = 1){
                        echo '<div id="waitingforconfirm"> request pending </div>';
                    
                    }else if($conf['confirmed'] = 2){
                        echo '<p>you are friends with '.$row['firstName']. ' ' .$row['lastName']. '</p>';
                    }
                ?>


            </div>
		</div>

</div>
<?php } ?>	


