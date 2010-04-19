<?php

session_start();
if(!isset($_SESSION['logged_in'])) { 
    header("Location: index.php"); 
}
require_once('/inc/_header.php'); 
//get the user object from the session 
$user = unserialize($_SESSION['user']);
$email = $user->email;
$message ="";

if (isset($_POST['submit_settings'])){
	$fName = mysql_real_escape_string($_POST['fName']);
	$lName = mysql_real_escape_string($_POST['lName']);
	$gender =mysql_real_escape_string($_POST['mGender']);
	$email = mysql_real_escape_string($_POST['email']);
	$street = mysql_real_escape_string($_POST['address']);
	$number = mysql_real_escape_string($_POST['number']);
	$zip = mysql_real_escape_string($_POST['zip']);
	$city = mysql_real_escape_string($_POST['city']);
	$country = mysql_real_escape_string($_POST['country']);
	$password = md5(mysql_real_escape_string($_POST['password']));
	$password_confirm = md5(mysql_real_escape_string($_POST['confirmedPw']));
	//$birthday = mysql_real_escape_string($_POST['day'])."/".mysql_real_escape_string($_POST['month'])."/". mysql_real_escape_string($_POST['year']);
	$birthday = mysql_real_escape_string($_POST['year'])."-".mysql_real_escape_string($_POST['month'])."-".mysql_real_escape_string($_POST['day']);

	
	$user->email = $email;
	$user->fName = $fName;
	$user->lName = $lName;
	$user->street = $street;
	$user->gender = $gender;
	$user->number = $number;
	$user->birthday = $birthday;
	$user->zip = $zip;
	$user->city = $city;
	$user->country = $country;
	$user->hashPw = $password;
	
	
	$user->save();
	$message = "U are updated";
}


?>

<div id="container">
	<div id="profile">
		<div class="profilePic">
			<img src="<?php echo $user -> photo ?>" width="302" />
			<?php include 'inc/form.profilepic.php';?>
		</div>
		<div class="profileInfo">
				<?php include 'inc/form.userInfo.php';?>
				<?php echo $message;?>
		</div>
	</div>
</div>

<?php require_once('/inc/_footer.php'); ?>