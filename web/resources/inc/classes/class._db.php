<?php 

Class db{

	static function Connect(){
		$connection = mysql_connect(DBHOST, DBUSER, DBPASS) or die('Could not connect: ' . mysql_error());
		mysql_select_db(DBNAME);
	}

	static function getRows($query = ""){
		$results = mysql_query($query);
		$index = 0;
		$arrResults = array();
		while($row = mysql_fetch_assoc($results)){
			$arrResults[$index] = $row;
			$index++;
		}

		return $arrResults;
	}


	static function setTable($arrParams){

		if(isset($arrParams['table'])){

			$arrOperators = array('table','function','id');

			$table = $arrParams['table'];
			$arrKeys = array();
			$arrValues = array();

			$arrAttrResults = array();

			foreach($arrParams as $k => $v){
				if(!in_array($k, $arrOperators)){
					$arrKeys[] = $k;
					$arrValues[] = "'".$v."'";
				}
			}

			$Sql = "INSERT INTO $table (". implode(",", $arrKeys) .") VALUES(". implode(",", $arrValues) .");";
			if(mysql_query($Sql) === false){
				$arrAttrResults['success'] = 0;
				$arrAttrResults['message'] = "Something went wrong. Please try again.";
				//$arrAttrResults['message'] = $Sql;

			}else{
				$arrAttrResults['success'] = 1;
				$arrAttrResults['message'] = "Operation Successful.";

				$Sql = "SELECT * FROM $table ORDER BY id DESC LIMIT 1";
				$latest = db::getRows($Sql);
				$arrAttrResults['id'] = $latest[0]['id'];
			}

			return $arrAttrResults;

		}

	}

}

?>