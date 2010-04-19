<?php
require_once 'global.inc.php';

$db = new DB();
if(isset($_POST['queryString'])){
    $queryString = $_POST['queryString'];
    if(strlen($queryString)>0){
        $query = "SELECT id,firstName,LastName FROM members WHERE  FirstName LIKE '$queryString%' OR LastName LIKE '$queryString%' LIMIT 10";

        $goQry = mysql_query($query) or die(mysql_error());
        if($goQry){
            while($result=mysql_fetch_object($goQry)){
                echo '<a href="profile.php?id='.$result->id.'"><li onClick="fill(\''.$result->firstName.'\');">'.$result->firstName.'</li> </a>';
            }
        }else{
            echo 'problem with Query '.$query;
        }
    }

}else{}