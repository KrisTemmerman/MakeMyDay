<?php

error_reporting(E_ALL);
require_once('classes/upload.class.php');
require_once('global.inc.php');

$user = unserialize($_SESSION['user']);

if ($_SESSION['logged_in'] == 1){
	
	$handle = new Upload($_FILES['image_field']);
	
	if($handle->uploaded){
		$handle->process('../images/profilePics/'.$user->id);
		
		if($handle->processed){
			$fileName= 'images/profilePics/'.$user->id. '/'.$handle->file_src_name;
			$handle->clean();
			$sql = 'UPDATE members SET photo= "'.$fileName.'" WHERE id= "'.$user->id.'"';
			mysql_query($sql) or die(mysql_error());
			header('location:../settings.php');
		}else{
			echo 'It failed';
	}
}
	
}
