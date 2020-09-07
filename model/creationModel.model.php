<?php 

include_once('../include/dbconnection.inc.php');
include_once('../controller/creationController.controller.php');

class Creation extends dbconnection{

	public function getCreationalInfo(){
        
		$sql = "SELECT * FROM creation WHERE Approved='0'" ;
		$result = $this->connect()->prepare($sql);
		$result->execute();
		return $result;
		
	}

	public function addCreationalInfo($me,$fileName,$fileTmpName,$str){
        $sql = 'INSERT INTO creation(MembershipNo,Title,Creation,Approved) VALUES (?,?,?,?)';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$me,$fileName,$fileTmpName,$str]);
    }
}

?>