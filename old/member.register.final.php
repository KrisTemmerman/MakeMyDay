<?php
session_start();
require_once 'global.inc.php';
if(isset($_POST['submit-form'])){
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
	$succes = true;
	$userTools = new UserTools();
	if($userTools->checkEmailExist($email)){
		$succes = false;
		$_SESSION['error'] = 1;
		header("location:../index.php");
	}
	if($password != $password_confirm){
		$_SESSION['error'] = 2;
		header("location:../index.php");
		$succes = false;
		
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

