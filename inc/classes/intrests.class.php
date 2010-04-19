<?php
require_once 'DB.class.php';
require_once 'User.class.php';

class Intrests{
	
	function addIntrest($intrest){
		$db = new DB();
		$qry = 'INSERT INTO intrests (id,intrestName) VALUES (null,"'.$intrest.'")';
		mysql_query($qry) or die(mysql_error());
	}
	
	function editIntrest($intrest,$newIntrest){
		$db = new DB();
		$qry = 'UPDATE intrests SET intrestName = "'.$newIntrest.'" WHERE intrestName = "'.$intrest.'"';
		mysql_query($qry) or die(mysql_error());
	}
	
	function selectMemberIntrest($userId){
		$db = new DB();
		$qry = 'SELECT intrestName FROM intrests,memberintrests WHERE  intrests.Id = memberintrests.intrestId AND memberintrests.memberId = '.$userId;
		$result = mysql_query($qry) or die(mysql_error());
		while ($row = mysql_fetch_assoc($result)){	
			$intrests[] = $row['intrestName'];
			$j++;
		}
		return($intrests);
	}
	
	function selectMemberIntrestId($userId){
		$db = new DB();
		$qry = 'SELECT intrestName FROM intrests,memberintrests WHERE  intrests.Id = memberintrests.intrestId AND memberintrests.memberId = '.$userId;
		$result = mysql_query($qry) or die(mysql_error());
		while ($row = mysql_fetch_assoc($result)){	
			$intrests[] = $row['id'];
			$j++;
		}
		return($intrests);
	}
	
	
	
	function addMemberIntrest($memberId,$intrestId){
		$qry = 'INSERT INTO memberIntrests (id,memberId,intrestId) VALUES(null,'.$memberId.','.$intrestId.')' ;
		mysql_query($qry) or die(mysql_error());
	}
	
	function getIntrestId($intrestName){
		$qry = 'SELECT id FROM intrests WHERE intrestName = "'.$intrestName.'"';
		mysql_query($qry) or die(mysql_error());
	}
	
	function getAllIntrestNames(){
		$j=0;
		$db = new DB();
		$qry = 'SELECT * FROM intrests';
		$result = mysql_query($qry) or die(mysql_error());
		while ($row = mysql_fetch_assoc($result)){	
			$intrests[] = $row['intrestName'];
			$j++;
		}
		return $intrests;		
	}
		function getAllIntrestId(){
				$j=0;
				$db = new DB();
				$qry = 'SELECT * FROM intrests';
				$result = mysql_query($qry) or die(mysql_error());
				while ($row = mysql_fetch_assoc($result)){	
					$intrests[] = $row['id'];
					$j++;
				}
				return $intrests;		
			}
}