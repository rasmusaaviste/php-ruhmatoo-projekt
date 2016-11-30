<?php 
class Car {
    private $connection;
    function __construct($mysqli){
        $this->connection = $mysqli;
    }
    function saveCar ($Tyyp, $Color) {

        $stmt = $this->connection->prepare("INSERT INTO CarWatchingGame (Tyyp, Color) VALUES (?, ?)");

        echo $this->connection->error;

        $stmt->bind_param("ss", $Tyyp, $Color);

        if ($stmt->execute()) {

            echo "Salvestamine õnnestus";
        } else {
            echo "ERROR ".$stmt->error;
        }
    }
	
	function getAll($q, $sort) {

		$allowedSort = ["UserId", "RegPlate", "Mark", "Model"];
		if(!in_array($sort, $allowedSort)) {
			//ei ole lubatud tulp
			$sort = "UserId";
		}

		if($q != "") {

			echo "Otsib: ".$q;

			$stmt = $this->connection->prepare("
			SELECT UserId, RegPlate, Mark, Model
			FROM repairCars
			WHERE deleted IS NULL AND UserId = ?
			AND (RegPlate LIKE ? OR Mark LIKE ? OR Model LIKE ?)
			ORDER BY $sort
			
			");
			$searchWord="%".$q."%";
			$stmt->bind_param("iss", $_SESSION["UserId"], $searchWord, $searchWord);

		} else {
			$stmt = $this->connection->prepare("
			SELECT UserId, RegPlate, Mark, Model
			FROM repairCars
			WHERE deleted IS NULL AND UserId = ?
			ORDER BY $sort 
			");


		}
		echo $this->connection->error;

		$stmt->bind_result($UserId, $RegPlate, $Mark, $Model);
		$stmt->execute();


		//tekitan massiivi
		$result = array();

		// tee seda seni, kuni on rida andmeid
		// mis vastab select lausele
		while ($stmt->fetch()) {

			//tekitan objekti
			$car = new StdClass();

			$Car->id = $UserId;
			$Car->RegPlate = $RegPlate;
			$Car->Mark = $Mark;
			$Car->Model = $Model;

			//echo $plate."<br>";
			// iga kord massiivi lisan juurde nr m�rgi
			array_push($result, $RegPlate);
		}

		$stmt->close();


		return $result;
	}
	
}

?>