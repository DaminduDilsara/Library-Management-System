<?php 

include_once('../include/dbconnection.inc.php');

class Creation extends dbconnection{

	public function getCreationalInfo(){
        
		$sql = "SELECT * FROM creation WHERE Approved='0'" ;
		$result = $this->connect()->prepare($sql);
		$result->execute();
		return $result;
		
	}
}

?>