<?php include("top.php");
    $conn = mysqli_connect("localhost", "adminID5Rju3", "Rz5h2JWnm4xd", "tweb");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sender = "";
    if(isset($_COOKIE["email"])){
        $sender = $_COOKIE["email"];
    }
    //Startting session parameters
    $receiver = $_POST["user"]; //new
    $result = mysqli_query($conn,"SELECT name, surname, birth, 
        gender FROM user WHERE email = '$receiver'");
    $row = mysqli_fetch_array($result, MYSQL_NUM);
    $name = $row[0];
    $surname = $row[1];
    $birth = $row[2];
    $gender = $row[3];
    ?>
    <script src="js/chat.js"></script> 
    <div class="main-container">
        <div class="central-panel">
            <?php
                if(isset($_GET["error"])){
                    if($_GET["error"] == 1){?>
                        <div class="alert alert-warning">
                            <a class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Warning!</strong> There was a problem with the connection.
                        </div>
                        <?php
                    }
                    else{?>
                        <div class="alert alert-success">
                            <a class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Success!</strong> Comment added successfuly.
                        </div>
                        <?php
                    }
                }
            ?>
    <hr>
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
        </div>
        <hr>
    </div>
    <div class="transport-comment-block">
    <?php
        if($sender !== ""){   //User has loged in
            ?>
                <h2 class="comments-title"> Chat </h2>
                <div class="chat-block"></div>
                <!-- Using same div comment as chat block -->
                <div class="comment">
                    <!-- Same form method to call same PHP file but 
                        textarea tag has different name-->
                    <input id="receiver" type="hidden" value="<?= $receiver?>" name="user" />
                    <textarea id="message" name="message" value= "" class="user-comment" required></textarea>
                    <div class="inline-submit">
                        <button id="button" class="btn btn-lg btn-primary btn-block" onclick="addMessage()">Send</button>            
                    </div>
                </div>
            
            <?php
        }
        else{   //Hide info to unloged users and show some feedback
            ?>
                <h4 class="comments-title"> Log in to send messages to <?= $name . " " . $surname ?> </h4>
            <?php
        }
    ?>
    </div>
    
</div>
    </div>         
<?php include("bottom.html"); ?>

