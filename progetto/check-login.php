<?php 
	if(!isset($_COOKIE["email"])){	//We want to create the cookie
		$email = $_POST["email"];
		$password = $_POST["password"];
		// Check connection
		$conn = mysqli_connect("localhost", "adminID5Rju3", "Rz5h2JWnm4xd", "tweb");
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}
		if(isset($email) AND isset($password)){
			startCookie($email,$password,$conn);
			mysqli_close($conn);
			header("Location: index.php");
		}
	}
	else{	//We want to delete the cookie
		deleteCookie();
		header("Location: index.php");
	}

	function startCookie($email,$password,$conn){
		if(checkSQLInjection($email) AND checkSQLInjection($password)){
			$result = mysqli_query($conn,"SELECT email , password FROM user WHERE email = '$email' AND password = '$password'");
			if(mysqli_num_rows($result) > 0){
				setcookie("email",$email,time() + (86400 * 30),"/");
			}
		}
		else{
			//SQL INJECTION
		}
	}
	function deleteCookie(){
		unset($_COOKIE["email"]);
		setcookie("email","",time()-3600,'/');
	}

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