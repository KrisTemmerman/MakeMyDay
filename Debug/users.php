<?php
require_once('../inc/global.inc.php');
$qry = 'SELECT * from members';
$result = mysql_query($qry) or die(mysql_error());
while($row = mysql_fetch_assoc($result)){	
	echo '<a href="../profile.php?id='.$row['id'].'>'.$row['firstName'].'</a>';
	echo '<br/>';
}
