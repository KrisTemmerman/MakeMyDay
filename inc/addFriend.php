<?php
/**
 * Created by IntelliJ IDEA.
 * User: KrisTemmerman
 * Date: 19-apr-2010
 * Time: 21:05:31
 * To change this template use File | Settings | File Templates.
 */
require_once('global.inc.php');
$user = unserialize($_SESSION['user']);

$req = $_POST['request'];
$friendId = $_POST['friendId'];
if(isset($_POST['request'])){
$qry = 'INSERT INTO friends (id,memberId,friendId,confirmed) VALUES(null,'.$user->id.','.$friendId.','.$req.')';
$result = mysql_query($qry) or die(mysql_error());
$qry = 'INSERT INTO friends (id,memberId,friendId,confirmed) VALUES(null,'.$friendId.','.$user->id.','.$req.')';
$result = mysql_query($qry) or die(mysql_error());
    
}
?>