<?php include("top.php");
	$conn = mysqli_connect("localhost", "adminID5Rju3", "Rz5h2JWnm4xd", "tweb");
    if ($conn->connect_error) {
        header("Location: home.php?error=2");
    }
    $user = $_POST["user"];
    $result = mysqli_query($conn,"SELECT name, surname, birth, 
        gender FROM user WHERE email = '$user'");
    $row = mysqli_fetch_array($result, MYSQL_NUM);
    $name = $row[0];
    $surname = $row[1];
    $birth = $row[2];
    $gender = $row[3];

?>
<div class="main-container">
    <div class="central-panel">
        <div class="transport-panel">
            <div class="inline-cars">
                <div class="transport-panel-photo">
                    <img src="images/user.png" alt="userphoto"/>
                </div>
                <div class="transport-panel-info">
                    <p> Name: <?= $name ?> </p> </br>
                    <p> Surname: <?= $surname ?></p></br>
                    <p> Birth: <?= $birth ?> </p></br>
                    <p> Gender: <?= $gender ?> </p>
                </div>
                <div class="transport-panel-actions">
                    <form action="chat.php" method="POST">
                        <input type="hidden" name="user" value="<?= $user ?>" />
                        <button class="btn btn-primary" type="submit"> Start Chatting</button>
                    </form>
                </div>
            </div>
            <hr>
        </div>
    </div>
</div>
<?php include("bottom.html");?>