<?php
	$email = $_POST["email"];
	$password = $_POST["password"];
	$repassword = $_POST["password2"];
	$name = $_POST["name"];
	$surname = $_POST["surname"];
	$birth = $_POST["birth"];
	$gender = $_POST["optradio"];

	// Check connection
	$conn = mysqli_connect("localhost", "adminID5Rju3", "Rz5h2JWnm4xd", "tweb");
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

	if(checkSQLInjection($email) AND checkSQLInjection($password) AND
		checkSQLInjection($repassword) AND checkSQLInjection($name) AND 
		checkSQLInjection($surname) AND checkSQLInjection($birth)){
			$result = mysqli_query($conn,"SELECT * FROM user WHERE email = '$email'");
			if(mysqli_num_rows($result) > 0){	//If there is a user with the same email -> cant sign up
				header("Location: index.php?error=1");
			}
			else{	//No problems, we create the new user
				$sql = "INSERT INTO user VALUES('$email','$password','name','surname','$birth','$gender')";
				if ($conn->query($sql) === TRUE) {
    				setcookie("email",$email,time() + (86400 * 30),"/");
					header("Location: index.php");
				} else {
					header("Location: index.php?error=2");
				}
				$conn->close();
			}
	}

	//CHECK SQL INJECTION
	function checkSQLInjection($data){
		$input = strtolower($data);
		if(strpos($input,'select') !== 0 AND strpos($input,'alter table') !== 0 
			AND strpos($input,'update') !== 0 AND strpos($input,'delete')!== 0
			 AND strpos($input,'insert into')!== 0){
			return 1;
		}
		else{
			return 0;
		}
	}
?>