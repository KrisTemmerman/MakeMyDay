<?php
require_once 'User.class.php';
require_once 'DB.class.php';

class UserTools{
	public function login($email,$password){
		$hashPw = md5($password);
		//$result = $db->select('members','email ="'.$email.'" AND password = "'.$hashPw.'"');
		$qry = 'SELECT * FROM members WHERE email = "'.$email.'" AND password = "'.$hashPw.'"';
		$result = mysql_query($qry) or die(mysql_error());
		
		if (mysql_num_rows($result)==1){
			$_SESSION['user'] = serialize(new User(mysql_fetch_assoc($result)));
			$_SESSION["login_time"] = time();
			$_SESSION["logged_in"] = 1;
			$qry = 'SELECT loginTimes FROM members where email ="'.$email.'"';
			$result = mysql_query($qry) or die(mysql_error());
			$row = mysql_fetch_assoc($result);
			$loginTimes = $row['loginTimes'];
			$loginTimes++;
			$qry = 'UPDATE members SET loginTimes = "'.$loginTimes.'" WHERE email = "'.$email.'"';
			mysql_query($qry) or die(mysql_error());
			$_SESSION['loginTimes'] = $loginTimes;
			return true;
		}else{
			return false;
		}
	}
	public function logout(){
		unset($_SESSION['user']);  
		unset($_SESSION["login_time"]);
        unset($_SESSION['logged_in']);
		session_destroy();
		
	}
	public function checkEmailExist($email){
		$db = new DB();
		$result = $db->select('members','email="'.$email.'"');
		if(sizeof($result)>0){
			return true;
		}else{
			return false;
		}
	}
	public function getUserId($id){
		$db = new DB();
		$result= $db->select('members',"id=$id");
		return new User($result);	
	}
}