<?php
require_once '/DB.class.php';
class User{
	public $id;
	public $fName;
	public $lName;
	public $street;
	public $number;
	public $zip;
	public $gender;
	public $city;
	public $country;
	public $email;
	public $birthday;
	public $hashPw;
	public $photo;
	public $joinDate;
	public $loginTimes;
	
	
	function __construct($data){
		$this->id = (isset($data['id'])) ? $data['id'] : "";
		$this->hashPw = (isset($data['password'])) ? $data['password'] : "";
		$this->email = (isset($data['email'])) ? $data['email'] : "";
		$this->gender = (isset($data['gender'])) ? $data['gender'] : "";
		$this->fName = (isset($data['firstName'])) ? $data['firstName'] : "";
		$this->lName = (isset($data['lastName'])) ? $data['lastName'] : "";
		$this->street = (isset($data['street'])) ? $data['street'] : "";
		$this->number = (isset($data['number'])) ? $data['number'] : "";
		$this->zip = (isset($data['zip'])) ? $data['zip'] : "";
		$this->city = (isset($data['city'])) ? $data['city'] : "";
		$this->country = (isset($data['country'])) ? $data['country'] : "";
		$this->birthday = (isset($data['birthday'])) ? $data['birthday'] : "";
		$this->photo = (isset($data['photo'])) ? $data['photo'] : "";
		$this->loginTimes = (isset($data['loginTimes'])) ? $data['loginTimes'] : "";
		$this->joinDate = (isset($data['join_date'])) ? $data['join_date'] : "";
	}
	
	public function save($isNewUser = false){
		$db = new DB();
		// OMG YOU ARE REGISTERED ! COOL!!!
		if(!$isNewUser){
			$data = array( 
				"firstName" => "'$this->fName'",
				"lastName" => "'$this->lName'",
				"gender" =>"'$this->gender'",
				"street" => "'$this->street'",
				"number" => "'$this->number'",
				"zip" => "'$this->zip'",
				"city" => "'$this->city'",
				"country" => "'$this->country'",
				"email" => "'$this->email'",
				"dateOfBirth "=>"'$this->birthday'",
				"password" => "'$this->hashPw'",
				"joinDate" => "'".date("Y-m-d h:i:s",time())."'",
				"photo" => "'$this->photo'");
			$db->update($data,'members',' id = '.$this->id);
			
		}else{
		
			$data = array( 
				"firstName" => "'$this->fName'",
				"lastName" => "'$this->lName'",
				"gender" =>"'$this->gender'",
				"street" => "'$this->street'",
				"number" => "'$this->number'",
				"zip" => "'$this->zip'",
				"city" => "'$this->city'",
				"country" => "'$this->country'",
				"email" => "'$this->email'",
				"dateOfBirth"=>"'$this->birthday'",
				"password" => "'$this->hashPw'",
				"joinDate" => "'".date("Y-m-d h:i:s",time())."'",
				"photo" => "'$this->photo'"
			);
			$this->id = $db->insert($data,'members');
			$this->joinDate = time();
		}
		return true;	
	}
	
}