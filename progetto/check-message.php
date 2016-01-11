<?php
	session_start();
    $sender = "";
    $receiver = "";
    if(isset($_COOKIE["email"])){
        $sender = $_COOKIE["email"];
    }
    if(isset($_POST["user"])){
        $receiver = $_POST["user"];
    }
	//Check who called this page
	if(isset($_POST["postid"])){	//We know It is a comment
		$postid = $_POST["postid"];
		if(isset($_POST["comment"])){	//Comment inserted
			$comment = $_POST["comment"];
			if(checkSQLInjection($comment)){
				insertComment($comment,$sender,$receiver,$postid);
			}
		}
		else{	//Get comments petition
			getPostComments($postid);
		}
		
	}
	else{	//We know It is a chat message
		if(isset($_POST["check"])){	//Get chat messages 	
			getChatMessages($sender,$receiver);
		}
		else{	//Here, We insert a new chat message
			$message = $_POST["message"];
			if(checkSQLInjection($message)){
				insertMessage($message,$sender,$receiver);
			}
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

function insertMessage($message,$sender,$receiver){
	$conn = mysqli_connect("localhost","adminID5Rju3","Rz5h2JWnm4xd","tweb");
	if ($conn->connect_error) {
        header("Location chat.php?error=1");
    }
    date_default_timezone_set('Europe/Copenhagen');
    $date = date("Y-m-d H:i:s"); 
    $sql = "INSERT INTO message(text,date,sender,receiver) 
    	VALUES('$message','$date','$sender','$receiver')";
    if ($conn->query($sql) === TRUE) {
    	getChatMessages($sender,$receiver);
	}
}

function insertComment($comment,$sender,$receiver,$postid){
    $conn = mysqli_connect("localhost","adminID5Rju3","Rz5h2JWnm4xd","tweb");
    if ($conn->connect_error) {
        header("Location postview.php?postid=$postid&error=1");
    }
    date_default_timezone_set('Europe/Copenhagen');
    $date = date("Y-m-d H:i:s");
    $sql = "INSERT INTO comment(text,date,user,postID,sender) 
    	VALUES('$comment','$date','$receiver','$postid','$sender')";
    if ($conn->query($sql) === TRUE) {
		getPostComments($postid);
	}
}

function getPostComments($postid){
	$conn = mysqli_connect("localhost","adminID5Rju3","Rz5h2JWnm4xd","tweb");
    if ($conn->connect_error) {
        header("Location postview.php?postid=$postid&error=1");
    }
    $i = 1;
    $result = mysqli_query($conn,"SELECT DISTINCT t1.text, t1.date, t1.sender, t2.name, t2.surname
     FROM comment t1, user t2 WHERE postID = '$postid' AND t1.sender = t2.email");
    while($row = mysqli_fetch_array($result, MYSQL_NUM)){
        echo "<div class='existing-comment'>";
        echo "<p class='grey-background'>" . $row[0] . "</p></br>";
        echo "<p> Date: " . $row[1] . "</p></br>";
        echo "<form id='form" . $i . "' action='user.php' method='POST'>";
        	echo "<input type='hidden' name='user' value='" . $row[2] ."' />";
        	echo "<p> Comment by: <a id='" . $i . "' class='redirection'>" . $row[3] . " " . $row[4] . "</a></p>";
        echo "</form>";
        echo "</div>"; 
        $i = $i + 1;
    }
}

function getChatMessages($sender,$receiver){
	$conn = mysqli_connect("localhost","adminID5Rju3","Rz5h2JWnm4xd","tweb");
    if ($conn->connect_error) {
        header("Location postview.php?postid=$postid&error=1");
    }
    //Query
    $result = mysqli_query($conn,"SELECT * FROM message 
        WHERE (sender = '$sender' AND receiver = '$receiver') 
        OR (sender = '$receiver' AND receiver = '$sender') 
        ORDER BY messageID ASC");
    //Lets populate chat conversation
    while ($row = mysqli_fetch_array($result, MYSQL_NUM)) {
        if($row[3] === $sender){
            echo "<div class='chat-sender'>";
            echo "<p> <b>You: </b> </p>";
            echo "<p> " . $row[1] . "</p>";
            echo "</div>";
        }
        else{
            echo "<div class='chat-receiver'>";
            echo "<p> <b>" . $name . " " . $surname . ": </b></p>";
            echo "<p>" . $row[1] . "</p></br>";
            echo "<p>" . $row[2] . "</p>";
            echo "</div>";
        }
    }   
	echo "<hr>";
}
?>