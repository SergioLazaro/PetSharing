<?php include("top.php");?>
    <div class="alert-block">
    <?php
        $conn = mysqli_connect("localhost", "adminID5Rju3", "Rz5h2JWnm4xd", "tweb");
        if ($conn->connect_error) {
            header("Location: home.php?error=2");
        }
        if(isset($_GET["error"])){
          if($_GET["error"] == 1){?>
            <div class="alert alert-warning">
                <a class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Warning!</strong> Fields invalid.
            </div>
          <?php
          }
          else if($_GET["error"] == 2){?>
            <div class="alert alert-warning">
                <a class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Warning!</strong> Conection problems.
            </div>
          <?php
          }
          else{?>
            <div class="alert alert-success">
                <a class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Success!</strong> Now you can search your post.
            </div>
          <?php
            }
        }
    ?> 
    </div>
    <script src="js/home.js"></script>
    <div class="main-container">
        <div class="central-panel">
        <div class="top-options">
            <div class="row">
                <p> Choose posts you want to see: </p>
            </div>
            <div class="row" >
                <select id="selector" name="select" class="form-control" name="postype">
                    <option value="pets">Pets</option>
                    <option value="carers">Carers</option>
                </select>
            </div>
        </div>
        
    <?php
        if(!isset($_GET["select"])){
            $select = "pet";
            
        }
        else{
            if($_GET["select"] == "Pets"){
                $select = "pet";
            }
            else{
                $select = "carer";
            }
            
        }
        $i = 1;
    ?>
    <div id="pets" class="transport-panel">
    <?php
        $result = mysqli_query($conn,"SELECT t1.pet_type, t1.pet_name, t1.pet_age, 
            t1.info, t2.name, t2.surname, t1.postID, t1.post_type 
            FROM post t1 , user t2 WHERE t1.user = t2.email AND t1.post_type = 'pet'");
        while ($row = mysqli_fetch_array($result, MYSQL_NUM)) {
            echo "<div id='" . $i ."' class='post-block'>";
            echo "<form id='form" . $i . "' action='postview.php' method='POST'>";
            echo "<input type='hidden' name='postid' value='" . $row[6] . "'/>";            
            $i = $i + 1;
            ?>
                <hr>
                <div class="inline-cars">
                    <div class="transport-panel-photo">
                        <img src="images/user.png" alt="userphoto"/>
                    </div>
                    <div class="transport-panel-info">
                        <p> Pet type: <?= $row[0] ?> </p> </br>
                        <?php
                            if($select === "pet"){  //If $select = pet -> show fields
                                ?>
                                <p> Pet Name: <?= $row[1] ?> </p></br>
                                <p> Pet age: <?= $row[2] ?> </p></br>
                                <?php
                            }
                        ?>
                        <p> Special comments: <?= $row[3] ?> </p></br>
                        <p> Owner: <?= $row[4] . " " .$row[5] ?> </p>
                    </div>
                </div>
            </form>
            </div>
        <?php 
        }  
    ?>
    </div>
    <div id="carers" class="transport-panel">
        <?php
        $result = mysqli_query($conn,"SELECT t1.pet_type, t1.pet_name, t1.pet_age, 
            t1.info, t2.name, t2.surname, t1.postID, t1.post_type 
            FROM post t1 , user t2 WHERE t1.user = t2.email AND t1.post_type = 'carer'");
        while ($row = mysqli_fetch_array($result, MYSQL_NUM)) {
            echo "<div id='" . $i ."' class='post-block'>";
            echo "<form id='form" . $i . "' action='postview.php' method='POST'>";
            echo "<input type='hidden' name='postid' value='" . $row[6] . "'/>";
            $i = $i + 1;
            ?>
                <hr>
                <div class="inline-cars">
                    <div class="transport-panel-photo">
                        <img src="images/user.png" alt="userphoto"/>
                    </div>
                    <div class="transport-panel-info">
                        <p> Pet type: <?= $row[0] ?> </p> </br>
                        <p> Special comments: <?= $row[3] ?> </p></br>
                        <p> Owner: <?= $row[4] . " " .$row[5] ?> </p>
                    </div>
                </div>
            </form>
            </div>
        <?php 
        }  
    ?>
    </div>            
</div>
</div>
        
</div>       
<?php include("bottom.html"); ?>


