<?php
session_start();
require_once 'inc/global.inc.php';

$UserTools = new UserTools();
$UserTools -> logout();
header('location:index.php');