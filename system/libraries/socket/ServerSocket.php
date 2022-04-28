<?php

class serviceApi {

	//connect database
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "iosdb";
	
    public function __construct()
    {
		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
    }
	
	public function addDonation($data) {
		$sql = "INSERT INTO donatetable(FName, LName, Age, BloodID, CityID, Phone, Email, Created) VALUES('".$data.FirstName."', '".$data.LastName."', ".$data.Age.", ".$data.BloodID.", ".$data.CityID.", '".$data.Phone."', '".$data.Email."', NOW())";

		$result = -1;
		if ($conn->query($sql) === TRUE) {
			$result = 1;
		// $conn->close();
		return $result;
	}
	
	public function getDonation($blood = 0, $city = 0) {
		$where = " WHERE 1";
		if( $blood > 0 )
			$where .= " AND BloodID = ".$blood;
		if( $city > 0 )
			$where .= " AND CityID = ".$city;
		$sql = "SELECT * FROM donatetable LEFT JOIN citytable USING(CityID) LEFT JOIN bloodtable USING(BloodID)".$where;
		$result = $conn->query($sql);
		$jsonData = array();
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = mysql_fetch_assoc($result)) {
				$jsonData[] = $row;
			}
		}
		// $conn->close();
		return $jsonData;
	}
}