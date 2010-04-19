<?php
session_start();
require_once 'inc/global.inc.php';
$error = '';
$email= '';
$password = '';

if(isset($_POST['submit-login'])){
	$email = $_POST['email'];
	$password = $_POST['password'];
	$userTools = new UserTools();
	if($userTools->login($email,$password)){
		header("location:index.php");
	}else{
		echo 'You naughty Boy Wrong login!';
	}
}