<script src="js/randomPhotos.js"></script>
<?php include("top.php");
    $conn = mysqli_connect("localhost", "adminID5Rju3", "Rz5h2JWnm4xd", "tweb");
    if ($conn->connect_error) {
        header("Location: home.php?error=2");
    }
    $postid = "";
    if(isset($_POST["postid"])){
        $postid = $_POST["postid"];  //Getting the postID that was clicked
    }
    
    //Getting every info available in the DB for this 'POSTID'
    $result = mysqli_query($conn,"SELECT t1.pet_type, t1.pet_name, t1.pet_age, 
        t1.info, t2.name, t2.surname, t1.postID, t1.user, t1.post_type 
        FROM post t1 , user t2 WHERE t1.user = t2.email AND t1.postID = '$postid'");
    $row = mysqli_fetch_array($result, MYSQL_NUM); 
    $pet_type = $row[0];
    $pet_name = $row[1];
    $pet_age = $row[2];
    $info = $row[3];
    $name = $row[4];
    $surname = $row[5];
    $postid = $row[6];
    $user = $row[7];
    $post_type = $row[8];
?>
<script src="js/postview.js"></script>
<div class="main-container">
    <div class="central-panel">
    <?php
        //Checking errors
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
    <div class="transport-panel">
        <div class="inline-cars">
            <div class="transport-panel-photo">
                <img src="images/user.png" alt="userphoto"/>
            </div>
            <div class="transport-panel-info">
                <p> Pet type: <?= $pet_type ?> </p> </br>
                <?php
                    if($post_type === "pet"){  //If $select = pet -> show fields
                        ?>
                        <p> Pet Name: <?= $pet_name ?> </p></br>
                        <p> Pet age: <?= $pet_age ?> </p></br>
                        <?php
                    }
                ?>
                <p> Special comments: <?= $info ?> </p></br>
                <p> Owner: <?= $name . " " .$surname ?> </p>
            </div>
            <div class="transport-panel-actions">
                    <form action="chat.php" method="POST">
                        <input type="hidden" name="user" value="<?= $user ?>" />
                        <button class="btn btn-primary" type="submit"> Start Chatting</button>
                    </form>
            </div>
        </div>
    </div>
    <div class="transport-comment-block">
        <h2 class="comments-title"> Comments </h2>
        <div id="comments" class="comment"></div>
            <!-- Using same div comment as chat block -->
            <div class="comment">
                <!-- Same form method to call same PHP file but 
                    textarea tag has different name-->
                <input id="e1" type="hidden" name="user" value="<?= $user ?>" />
                <input id="e2" type="hidden" name="postid" value="<?= $postid ?>" />
            <?php
            if(isset($_COOKIE["email"])){
                ?>
                <textarea id="e3" name="comment" value="" class= "user-comment" required></textarea>
                <div class="inline-submit">
                    <button class="btn btn-lg btn-primary btn-block" onclick="addComment()">Send</button>            
                </div>
            </div>
            <?php
            }
        ?>
        
    </div>
</div>  
    </div>       
<?php include("bottom.html"); ?>

