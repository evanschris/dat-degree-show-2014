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


	static function setTable($arrParams, $files = null){

		if(isset($arrParams['table'])){

			$arrOperators = array('table','function','id');

			$table = $arrParams['table'];
			$arrKeys = array();
			$arrValues = array();

			$arrAttrResults = array();

			$title = $arrParams['title'];
			$author = $arrParams['author'];




			foreach($arrParams as $k => $v){
				if(!in_array($k, $arrOperators)){
					$arrKeys[] = $k;
					$v = str_replace('‘', '&lsquo;', $v);
					$v = str_replace('’', '&rsquo;', $v);
					$v = str_replace('“', '&ldquo;', $v);
					$v = str_replace('”', '&rdquo;', $v);
					$v = str_replace('"', '&dquo;', $v);
					$v = str_replace("'", '&squo;', $v);
					$arrValues[] = "'".htmlentities($v)."'";
				}
			}

			if(isset($arrParams['id'])){

				$updateParams= array();

				foreach($arrParams as $k => $v){
					if(!in_array($k, $arrOperators)){
						$v = str_replace('‘', '&lsquo;', $v);
						$v = str_replace('’', '&rsquo;', $v);
						$v = str_replace('“', '&ldquo;', $v);
						$v = str_replace('”', '&rdquo;', $v);
						$v = str_replace('"', '&dquo;', $v);
						$v = str_replace("'", '&squo;', $v);
						$updateParams[] = $k . "='" .htmlentities($v). "'";
					}
				}

				$id = $arrParams['id'];

				$Sql = "UPDATE $table SET ".implode(",", $updateParams)." WHERE id = '$id';";
			
			}else{

				$Sql = "INSERT INTO $table (". implode(",", $arrKeys) .") VALUES(". implode(",", $arrValues) .");";
			
			}


			if(mysql_query($Sql) === false){
				$arrAttrResults['success'] = 0;
				$arrAttrResults['message'] = "Something went wrong. Please try again.";
				$arrAttrResults['message'] .= $Sql;

			}else{
				$arrAttrResults['success'] = 1;
				$arrAttrResults['message'] = "Operation Successful.";

				$Sql = "SELECT * FROM $table ORDER BY id DESC LIMIT 1";
				$latest = db::getRows($Sql);
				$arrAttrResults['id'] = $latest[0]['id'];
			}
	

			if($files != null){	
				//echo '<pre>' . print_r($files) . '</pre>';
				if(move_uploaded_file($files['author_image']['tmp_name'] ,$_SERVER['DOCUMENT_ROOT'].'/img/'.strtolower(str_replace(" ","-",$author)).'.jpg')){
						$arrAttrResults['message'] .= " Author image saved too.";
				}

				if(move_uploaded_file($files['project_image']['tmp_name'] ,$_SERVER['DOCUMENT_ROOT'].'/img/'.strtolower(str_replace(" ","-",$title)).'.jpg')){
						$arrAttrResults['message'] .= " Project image saved too.";
				}

				if(move_uploaded_file($files['sequence_image']['tmp_name'] ,$_SERVER['DOCUMENT_ROOT'].'/img/'.strtolower(str_replace(" ","-",$author)).'-sequence.jpg')){
						$arrAttrResults['message'] .= " Sequence image saved too.";
				}

				if(move_uploaded_file($files['cover_image']['tmp_name'] ,$_SERVER['DOCUMENT_ROOT'].'/img/'.strtolower(str_replace(" ","-",$title)).'-cover.jpg')){
						$arrAttrResults['message'] .= " Cover image saved too.";
				}
			}


			return $arrAttrResults;



		}


	}

}

?>