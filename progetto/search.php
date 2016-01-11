<?php include("top.php");
	//Check SQL INJECTION
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
<script src="js/search.js"></script>
<div class="main-container">
        <div class="central-panel">
        	<?php
        	if(isset($_POST["search"]) AND ($_POST["search"] !== "") AND checkSQLInjection($_POST["search"])){
        		$search = $_POST["search"];
        		$conn = mysqli_connect("localhost", "adminID5Rju3", "Rz5h2JWnm4xd", "tweb");
		        if ($conn->connect_error) {
		        ?>
		            <div class="alert alert-warning">
                		<a class="close" data-dismiss="alert" aria-label="close">&times;</a>
                		<strong>Warning!</strong> Conection problems.
            		</div>
		        <?php
		        }
		        else{
		        	//First of all, we look for user
			        $result = mysqli_query($conn,"SELECT name, surname, birth, gender, email 
			        	FROM user WHERE name = '$search' OR surname = '$search'");
			  		$i = 1;
			        //If there is a user...
			        if(($num_rows = mysqli_num_rows($result)) > 0){
			        	?>
			        	<h2 class="comments-title"> Users with <?= $search ?> as name:</h2>
			        	<?php
			        	while ($row = mysqli_fetch_array($result, MYSQL_NUM)) {
			        		echo "<div id='" . $i ."' class='user-block'>";
			        		echo "<form id='form" . $i . "' action='user.php' method='POST'>";
            				echo "<input type='hidden' name='user' value='" . $row[4] . "'/>";
			        		?>
		       					<div class="inline-cars">
		            				<div class="transport-panel-photo">
		                				<img src="images/user.png" alt="userphoto"/>
		            				</div>
		            				<div class="transport-panel-info">
						                <p> Name: <?= $row[0] ?> </p> </br>
						                <p> Surname: <?= $row[1] ?></p></br>
						                <p> Birth: <?= $row[2] ?> </p></br>
						                <p> Gender: <?= $row[3] ?> </p>
						            </div>
						        </div>
						        <hr>
						    </form>
						    </div>
			        	<?php
			        		$i = $i + 1;
			        	}
			        }
			        else{	//Users not found 
			        	?>
			        	<h4> There are not users with <?= $search ?> as name. </h4>
			        <?php
			    	}
			    	echo "<hr>";
			        //Now, we look for pet name
			        $result = mysqli_query($conn,"SELECT t1.pet_type, t1.pet_name,
			        	t1.pet_age, t1.info, t2.name, t2.surname, t1.postID 
			        	FROM post t1, user t2 WHERE post_type = 'pet' 
			        	AND t1.user = t2.email AND t1.pet_name = '$search'");

			        if(($num_rows = mysqli_num_rows($result)) > 0){
			        	?>
			        	<h2 class="comments-title"> Pets with <?= $search ?> as name:</h2>
			        	<?php
			        	while ($row = mysqli_fetch_array($result, MYSQL_NUM)) {
				        	echo "<div id='" . $i ."' class='post-block'>";
				        	echo "<form id='form" . $i . "' action='postview.php' method='POST'>";
            				echo "<input type='hidden' name='postid' value='" . $row[6] . "'/>";
		       				?>
		       					<div class="inline-cars">
		            				<div class="transport-panel-photo">
		                				<img src="images/user.png" alt="userphoto"/>
		            				</div>
		            				<div class="transport-panel-info">
						                <p> Pet type: <?= $row[0] ?> </p> </br>
	                                	<p> Pet Name: <?= $row[1] ?> </p></br>
	                                	<p> Pet age: <?= $row[2] ?> </p></br>
	                                	<p> Special comments: <?= $row[3] ?> </p></br>
	                        			<p> Owner: <?= $row[4] . " " .$row[5] ?> </p>
						            </div>
						        </div>
						        <hr>
						    </form>
						    </div>
			        	<?php
			        		$i = $i + 1;
			        	}
			        }
			        else{	//Pets not found 
			        	?>
			        	<h4> There are not pets with <?= $search ?> as name. </h4>
			        <?php
			    	}
			    	echo "<hr>";
			    	//Now, we look for carers
			    	$result = mysqli_query($conn,"SELECT t1.pet_type, t1.info, t2.name, t2.surname, t1.postID FROM post t1, user t2 
			    		WHERE post_type = 'carer' AND t1.user = t2.email 
			    		AND (t2.name = '$search' OR t2.surname = '$search')");
			        if(($num_rows = mysqli_num_rows($result)) > 0){
			        	?>
			        	<h2 class="comments-title"> Carers with <?= $search ?> as name:</h2>
			        	<?php
			        	while ($row = mysqli_fetch_array($result, MYSQL_NUM)) {
				        	echo "<div id='" . $i ."' class='post-block'>";
				        	echo "<form id='form" . $i . "' action='postview.php' method='POST'>";
            				echo "<input type='hidden' name='postid' value='" . $row[4] . "'/>";
		       				?>
		       					<div class="inline-cars">
		            				<div class="transport-panel-photo">
		                				<img src="images/user.png" alt="userphoto"/>
		            				</div>
		            				<div class="transport-panel-info">
						                <p> Pet type: <?= $row[0] ?> </p> </br>
	                                	<p> Special comments: <?= $row[1] ?> </p></br>
	                        			<p> Owner: <?= $row[2] . " " .$row[3] ?> </p>
						            </div>
						        </div>
						        <hr>
						    </form>
						    </div>
			        	<?php
			        		$i = $i + 1;
			        	}
			        }
			        else{	//Carers not found 
			        	?>
			        	<h4> There are not carers with <?= $search ?> as name. </h4>
			        <?php	
			        }
			    	echo "<hr>";
			    }
			}
			?>    	
        </div>
</div>

<?php include("bottom.html"); ?>