<?php

$db = mysql_connect('localhost','root','root') or die(mysql_error());
mysql_select_db("mmyday");
$passwoord = $_POST['pw'];
echo $passwoord;
$encryptpw = md5($passwoord);
echo('<br/>');
echo $encryptpw;
$qry=
    "UPDATE  members
     SET  password = '$encryptpw'
     WHERE  firstName = 'Kris'";


    mysql_db_query("mmday", $qry)  or die(mysql_error());

?>

<form  name="postPW" method="post" action="<?php echo $PHP_SELF;?>" >

    <input type="text" name="pw" value="pw"/>
    <input type="submit" name="Submit" value="go!" />
</form>