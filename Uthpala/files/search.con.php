<?php
include_once("search.view.php");
include_once("search.model.php");

Class SearchCon extends SearchModel{

	private $selectOption;
	private $searchValue;

	public function __constructor($selectOption,$searchValue){
		$this->selectOption=$selectOption;
		$this->searchValue=$searchValue;
	}

	public function getTitle($selectOption,$searchValue){
		$object=new SearchModel();
		$res=$object->searchResult($selectOption,$searchValue);

		for($i=0; $i<count($res); $i++){
          echo $res[$i]['Title'];
          ?><br><br>
          <?php
        }  

	}

	public function getAuthor($selectOption,$searchValue){
		$object=new SearchModel();
		$res=$object->searchResult($selectOption,$searchValue);

		for($i=0; $i<count($res); $i++){
          echo $res[$i]['Author'];
          ?><br><br>
          <?php
        }  

	}

	public function getAvailable($selectOption,$searchValue){
		$object=new SearchModel();
		$res=$object->searchResult($selectOption,$searchValue);

		for($i=0; $i<count($res); $i++){
          echo $res[$i]['Availale'];
          ?><br><br>
          <?php
        }  

	}

	public function setReserve($selectOption,$searchValue){
		$object=new SearchModel();
		$res=$object->searchResult($selectOption,$searchValue);

		for($i=0; $i<count($res); $i++){
			if($res[$i]['Availale']==1){?>
				<input type="submit" name="submit" value="Reserve" style="width: 80px; height: 30px;" >
<?php
			}else{
				echo "reserved";
			}  
          ?><br><br>
          <?php
        }  

	}


	

} 

?>