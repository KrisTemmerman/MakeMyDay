<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>MakeMyDay - login</title>
        <link href="../styles/stylesheet.css" rel="stylesheet" type="text/css"/>
        <link href="../styles/forms.css" rel="stylesheet" type="text/css"/>
    </head>
<body>
    <div id="header">
        <div class="headerWrap">
            <div class="logo"><img src="../images/logo.png" width="307" height="39"/> </div>
        </div>
        
</div>
    <div id="bar2">
    	<div id="bar2wrapper">
            <div id="registerbutton">
                <a href="../index.php" ><img src="../images/buttonRed.jpg" width="95" height="27" alt="Register" /></a>
                </div>
             <div id="bar2text">
             <p>Please register to find out what's the best activity for today !</p>
             </div>
    	</div>
        
    </div>
    <div id="container">
    <div id="loginBox">
    <h2> Make My Day Login </h2>
    <hr class="hrtitle" /><br />
    <form name="login" id="login" action="../login.php" method="post">
    	<label id="mail" for="loginEmail"> Email: </label> 
    	<input type="text" name="loginEmail"/><br /> <br/>
        <label id="mail" for="loginPassword"> Password:  </label> 
       	<input type="password" name="loginPassword" /><br />
        <input type="submit" value="login" /> <a href="register.php"> or register</a>
     </form>
     <a href="inc/forgotpw.php"> Forgot password?</a>
     </div>
    </div>
</body>
</html>
