<?php 
include_once('../controller/usercontroller.controller.php');
include_once('../include/dbconnection.inc.php');


class User extends dbConnection {

	 public function getInfo($memNo){
	 	$sql = "SELECT * FROM member WHERE MembershipNo= ?";
		$query = $this->connect()->prepare($sql);
		$query->execute([$memNo]);
		$query = $query->fetchAll();
		return $query;
	 }

	 public function updatePassword($memNo,$newpassword){
	 	$sql = "UPDATE member SET Password='$newpassword' WHERE MembershipNo=?";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$memNo]); 
	 }

    public function addCreationalInfo($me,$fileName,$fileTmpName,$str){
        $sql = 'INSERT INTO creation(MembershipNo,Title,Creation,Approved) VALUES (?,?,?,?)';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$me,$fileName,$fileTmpName,$str]);
    }

	 public function getUserLoginInfo($memNo, $password){
         $sql = "SELECT * FROM member WHERE MembershipNo= '$memNo' and Password = '".md5($password)."'";  //'".md5($psw)."' decrypting
         $result = mysqli_query($this -> connectInDifferentWay(),$sql) or die(mysql_error());
         $rows = mysqli_num_rows($result);
         return $rows;
     }
	 public function checkExist($memNo){
         $check = "SELECT * FROM `member` WHERE `MembershipNo`='$memNo'";
         $checked = mysqli_query($this -> connectInDifferentWay(),$check) or die(mysql_error());
         return $checked -> fetch_assoc();
     }
    public function CheckNull($memNo){
        $sql = "SELECT * FROM member WHERE MembershipNo= '$memNo'";
        $result = mysqli_query($this -> connectInDifferentWay(),$sql) or die(mysql_error());
        return mysqli_num_rows($result);
    }
     public function saveUserRegisterInfo($email,$psw,$memNo){
         $query = "UPDATE `member` SET email = '$email', Password = '".md5($psw)."' WHERE MembershipNo='$memNo'";
         $result = mysqli_query($this -> connectInDifferentWay(),$query);
         return $result;
     }

    public function getApprovedCreations(){
        $query = "SELECT * FROM `creation` WHERE `Approved` = 1";
        $result = mysqli_query($this -> connectInDifferentWay(),$query) or die(mysql_error());
        return $result;
    }
	
}
?>