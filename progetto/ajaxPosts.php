<?php
	if(isset($_GET["type"])){
		$type = $_GET["type"];
		$conn = mysqli_connect("localhost", "adminID5Rju3", "Rz5h2JWnm4xd", "tweb");
		//Starting checking the DB
		$result = mysqli_query($conn,"SELECT t1.pet_type, t1.pet_name, t1.pet_age, 
            t1.info, t2.name, t2.surname, t1.postID 
            FROM post t1 , user t2 WHERE t1.user = t2.email AND t1.post_type = '$type'");
        $i = 0;
        if($type === "pet"){	//pets
        	//Iterate over the rows
        	$JSON = "[";
        	while ($row = mysqli_fetch_array($result, MYSQL_NUM)) {
	            $pet_type = $row[0];
	            $pet_name = $row[1];
	            $pet_age = $row[2];
	            $info = $row[3];
	            $name = $row[4];
	            $surname = $row[5];
	            $postID = $row[6];
				//Starting populate the JSON response
	            $JSON = $JSON . json_encode(array(
	            	"pet_type" => $pet_type,
	            	"pet_name" => $pet_name,
	            	"pet_age" => $pet_age,
	            	"info" => $info,
	            	"name" => $name,
	            	"surname" => $surname,
	            	"postID" => $postID
	            )) . ",";
	        }
	        $JSON = substr($JSON,0,-1) . "]";
	        echo "$JSON";
        }
        else if($type === "carer"){	//Carers
        	//Iterate over the rows
        	$JSON = "[";
        	while ($row = mysqli_fetch_array($result, MYSQL_NUM)) {
        		$pet_type = $row[0];
	            $info = $row[3];
	            $name = $row[4];
	            $surname = $row[5];
	            $postID = $row[6];

	            //Starting populate the JSON response
	            $JSON = $JSON . json_encode(array(
	            	"pet_type" => $pet_type,
	            	"info" => $info,
	            	"name" => $name,
	            	"surname" => $surname,
	            	"postID" => $postID
	            )) . ",";
	        }
	        $JSON = substr($JSON,0,-1) . "]";
	        echo "$JSON";
	        
        } 
	}
	else{	//Error
		header("Location: home.php?error=2");
	}
?>