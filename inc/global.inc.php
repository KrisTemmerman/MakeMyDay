<?php
require_once 'classes/User.class.php';
require_once 'classes/DB.class.php';
require_once 'classes/UserTools.class.php';
require_once 'classes/intrests.class.php';
require_once 'classes/friends.class.php';

$db = new DB();
$userTools = new UserTools();
session_start();
if (isset($_SESSION['logged_in'])){
	$user = unserialize($_SESSION['user']);
	$_SESSION['user'] = serialize($userTools->getUserId($user->id));
	$_SESSION['userId'] = $user->id;
}
