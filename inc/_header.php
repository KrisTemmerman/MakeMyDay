<?php
    session_start();
    require_once 'inc/global.inc.php';
    
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>MakeMyDay - Welcome , Please Login or Register</title>
        <link href="styles/stylesheet.css" rel="stylesheet" type="text/css"/>
        <link href="styles/forms.css" rel="stylesheet" type="text/css"/>
		<script type="text/javascript" src="scripts/JQuery/jquery-1.4.1.min.js"></script>
		<script type="text/javascript" src="scripts/JQuery/functions.js"></script>
    </head>
    <body>
        <div id="welcomePage_header">
            <div class="welcomePage_headerWrap">
                <div class="welcomePage_logo"><a href="index.php"><img src="images/logoBig.png" alt="logo" width="242" height="32"/></a> </div>	
            	<?php if($_SESSION['logged_in'] == 1){
            		$fullName = $user->fName." ".$user->lName;
            		include 'inc/menu.php';
            	}else{
            		include 'inc/form.login.horizontal.php';
            	}?>
            </div>
        </div>
        <div id="container">
        
        
        
        </div>
        <?php
	        if (isset($_SESSION['error']) or $_SESSION['loginTimes'] == 1){
	      	  include 'inc/errorbar.php';
	        }
        ?>