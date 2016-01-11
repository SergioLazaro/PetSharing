<?php
	$post_type = $_POST["optradio"];
	if($post_type === "pet"){
		$pet_name = $_POST["name"];
		$pet_age = $_POST["age"];
	}
	$pet_type = $_POST["pettype"];
	$comment = $_POST["comment"];
	$user = $_COOKIE["email"];
	//$target_dir = "/var/lib/openshift/561e6c1489f5cf425a00010d/app-root/runtime/repo/progetto/images/";
	if(isset($pet_type) AND isset($comment)){
		if(checkSQLInjection($pet_type) AND checkSQLInjection($comment)){
			// Check connection
			$conn = mysqli_connect("localhost", "adminID5Rju3", "Rz5h2JWnm4xd", "tweb");
			if ($conn->connect_error) {
			    header("Location: post.php?error=1");
			}
			if(isset($pet_name) AND isset($pet_age)){	//Pet post
				if(checkSQLInjection($pet_name) AND checkSQLInjection($pet_age)){
					$sql = "INSERT INTO post(pet_type,info,post_type,pet_name,pet_age,user) VALUES('$pet_type','$comment','$post_type','$pet_name','$pet_age','$user')";
				}
				else{
					header("Location: home.php?error=1");
				}
			}
			else{	//Carer post
				$sql = "INSERT INTO post(pet_type,info,post_type,user) VALUES('$pet_type','$comment','$post_type','$user')";
			}
			if ($conn->query($sql) === TRUE) {
				header("Location: home.php?error=0");
			}
			else {
				header("Location: home.php?error=2");
			}
			$conn->close();
		}
		else{
			header("Location: home.php?error=1");
		}
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