<?php
	
	$mysqli = NULL;

	function connect(){
		global $mysqli;

		if(!is_null($mysqli)) return;

		$mysqli = mysqli_connect('localhost', 'root', '', 'lear_bdd');
		$mysqli->set_charset("utf8");
	}

	function e($val){
		global $mysqli;

		connect();
			
		return mysqli_real_escape_string($mysqli, $val);
	}

	function executeQuery($query){
		try{
			global $mysqli;

			connect();
						
			$stmt = $mysqli->query($query);
			
			return $stmt;
		}catch(Exception $e){
			return false;
		}
	}
	
	function executeNonQuery($query){
		global $mysqli;
		connect();
		
		$stmt = $mysqli ->prepare($query);
				
		return $stmt->execute();
	}

	function getInsertId(){
		global $mysqli;
		connect();

		return $mysqli->insert_id;
	}

	function executeScalar($query) {
		try{
			global $mysqli;

			connect();

			$tmp =$mysqli->query($query)->fetch_object();

			if(!$tmp) return false;

		    $value = $tmp->value;  

		    return $value;

			
		}catch(Exception $e){
			return false;
		}
	}

	function countRows($query) {
		try{
			global $mysqli;

			connect();

		    $result = $mysqli->query($query);
		    $count = 0;

			while($r = $result->fetch_assoc()){
				$count++;
			} 

		    return $count;

			
		}catch(Exception $e){
			return false;
		}
	}

	function anyLines($query) {
		try{
				
			global $mysqli;

			connect();

		    $query = executeQuery($query);  
		    
		    return $query-> fetch_assoc();
		}catch(Exception $e){
			return false;
		}
	}

	function beginTransaction(){
		global $mysqli;

		connect();

		$mysqli->autocommit(false);
	}
		
	function commit(){
		global $mysqli;

		connect();

		$mysqli->commit();
		$mysqli->autocommit(true);
	}
		
	function rollback(){
		global $mysqli;

		connect();

		$mysqli->rollback();
		$mysqli->autocommit(true);
	}

	function getError(){
		global $mysqli;

		if(is_null($mysqli)) return "";

		return $mysqli->error;
	}

	function clean($str) {
	    $str = @trim($str);
	    if(get_magic_quotes_gpc()) {
	        $str = stripslashes($str);
	    }
	    return e($str);
	}

	function clean_r($arr) {

		for ($i=0; $i < sizeof($arr); $i++) { 
			$arr[$i] = clean($arr[$i]);
		}

		return $arr;
	}

?>