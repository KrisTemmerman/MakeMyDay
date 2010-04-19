<?php
session_start();
unset($_SESSION['error']);
require_once 'global.inc.php';
if(isset($_POST['fName'])){
	$fName = mysql_real_escape_string($_POST['fName']);
	$lName = mysql_real_escape_string($_POST['lName']);
	$gender = mysql_real_escape_string($_POST['mGender']);
	$email = mysql_real_escape_string($_POST['email']);
	$street = mysql_real_escape_string($_POST['address']);
	$number = mysql_real_escape_string($_POST['number']);
	$zip = mysql_real_escape_string($_POST['zip']);
	$city = mysql_real_escape_string($_POST['city']);
	$country = mysql_real_escape_string($_POST['country']);
	$password = md5(mysql_real_escape_string($_POST['password']));
	$birthday = $_POST['day'].'/'.$_POST['month'].'/'.$_POST['year'];
	
	$succes = true;
	$userTools = new UserTools();
	if($userTools->checkEmailExist($email)){
		$succes = false;
		$_SESSION['error'] = 1;
		header("location:../index.php");
	}
	
	if($succes){
		$data['firstName'] = $fName;
		$data['lastName'] = $lName;
		$data['gender'] = $gender;
		$data['email'] = $email;
		$data['street'] = $street;
		$data['number'] = $number;
		$data['zip'] = $zip;
		$data['city'] = $city;
		$data['country'] = $country;
		$data['password'] = $password;
		$data['birthday'] = $birthday;
		$newUser = new User($data);
		$newUser->save(true);
		$userTools->login($email,$password);
		header("location:../index.php");
	}
}
?>

