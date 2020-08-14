<?php 
//include_once('../controller/usercontroller.controller.php');
include_once('../include/dbconnection.inc.php');

class Creation extends dbconnection{

	public function getCreationalInfo(){
        
		$sql = "SELECT * FROM creation";
		$result = $this->connect()->prepare($sql);
		$result->execute();
		return $result;
		//echo $result->rowCount();
	}
}

//$d=new Creation();
//$d->getCreationalInfo();