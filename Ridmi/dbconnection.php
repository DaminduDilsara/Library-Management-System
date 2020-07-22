<?php

class dbconnection {
 
    function connection(){
        $server="localhost";
        $dbname="librarydb";
        $uname="root";
        $password="";
        
        $con = new PDO("mysql:host=$server;dbname=$dbname","$uname","$password");
        return $con;
    }
}

$obcon=new dbconnection();
$con=$obcon->connection();


?>

