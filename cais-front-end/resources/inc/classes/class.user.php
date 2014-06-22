<?php 

Class user Extends db{

	var $arrUser;

   	var $id;
  	var $name;
   	var $email;
	var $password;
	var $phone;


	function __construct($id = null) {

		if($id != null && $id != 0){
			$this->id = $id;

			$Sql = "SELECT * FROM user WHERE id = '$id';"; 

			$arrUser = $this->GetRows($Sql);

			$this->name = $arrUser[0]['username'];
			$this->email = $arrUser[0]['email'];
			$this->password = $arrUser[0]['password'];
			$this->phone = $arrUser[0]['phone'];

		}

	}

	function getIDs(){

		$Sql = "SELECT id FROM user";
		$arrUsers = $this->GetRows($Sql);
		return $arrUsers;
	}


	function login($arrParams){

		if(isset($arrParams['username']) && isset($arrParams['password'])){
			
			$username = strtolower($arrParams['username']);
			$password = md5($arrParams['password']);

			$Sql = "SELECT * FROM user;";
			$arrResults = db::getRows($Sql);
			$userID = null;

			foreach($arrResults as $k => $v){

				$un_tocheck = strtolower($v['username']);
				$pw_tocheck = $v['password'];

				if($un_tocheck == $username && $pw_tocheck == md5($password)){
					$userID = $v['id'];
				}

			}


			if(strlen($userID) > 0){


				$objUser = new User($userID);
				setcookie("user", $userID, time()+(60*60*24*30), "/");
				
				$arrLogin['success'] = 1;
				$arrLogin['message'] = "Welcome ". $objUser->name . ". You have successfully been logged in. Reditecting you in just a couple of seconds.";

					
			}else{

				$arrLogin['success'] = 0;
				$arrLogin['message'] = "Incorrect username and password. Please try again. ";

			}
		}else{

			$arrLogin['success'] = 0;
			$arrLogin['message'] = "An error occured. Please contact Sidd so he can perform Sepukku.";
		}

		return $arrLogin;
	}

}

?>