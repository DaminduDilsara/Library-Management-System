<?php
	Class Inserting{ 
		public insertBook($barcode,$isbn,$subject,$title,$sub,$author,$editor,$publisher,$section,$place,$date,$pages,$price,$dim,$cd){ 
			$sql = "INSERT INTO `book` ('BarcodeNo',`ISBN`,'Subject', `Title`, `Subtitle`,'Author','Editor','Publisher','Section','PublishedPlace','PublishedDate','NumberOfPages','Price','Dimentions','CD_Include') VALUES ('$barcode','$isbn','$subject', '$title', '$sub','$author','$editor','$publisher','$section','$place','$date','$pages','$price','$dim','$cd')";
			$query = $dbh->prepare($sql);
			$query->bindParam(':barcode',$barcode,PDO::PARAM_STR);
			$query->bindParam(':isbn',$isbn,PDO::PARAM_STR);
			$query->bindParam(':subject',$subject,PDO::PARAM_STR);
			$query->bindParam(':title',$title,PDO::PARAM_STR);
			$query->bindParam(':sub',$sub,PDO::PARAM_STR);
			$query->bindParam(':author',$author,PDO::PARAM_STR);
			$query->bindParam(':editor',$editor,PDO::PARAM_STR);
			$query->bindParam(':publisher',$publisher,PDO::PARAM_STR);
			$query->bindParam(':section',$section,PDO::PARAM_STR);
			$query->bindParam(':place',$place,PDO::PARAM_STR);
			$query->bindParam(':date',$date,PDO::PARAM_STR);
			$query->bindParam(':pages',$pages,PDO::PARAM_STR);
			$query->bindParam(':price',$price,PDO::PARAM_STR);
			$query->bindParam(':dim',$dim,PDO::PARAM_STR);
			$query->bindParam(':cd',$cd,PDO::PARAM_STR);
			$nrows = $pdo->exec($sql);
			return $nrows;
		}
		public insertNewspaper(){

		}
		public insertAuthor(){

		}
		public insertMember(){

		}
		public insertStaff(){

		}
		public insertBorrowSession(){

		}
	}