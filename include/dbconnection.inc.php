<?php 

class dbconnection{
	private $host = "localhost";
	private $user = "root";
	private $pwd= "";
	private $dbName = "newlibrarydb";


	protected function connect(){
		
		$dsn = 'mysql:host='.$this->host.';dbname='.$this->dbName;
		$con = new PDO($dsn,$this->user,$this->pwd);
		$con->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
	
		return $con;
	}
}
?>