<?php include("top.php");?>
<?php
	if(isset($_GET["error"])){
      if($_GET["error"] == 1){?>
      	<div class="alert-block">
            <div class="alert alert-warning">
                <a class="close" data-dismiss="alert" aria-label="close">&times;</a>
                You must log in or sign up first.
            </div>
    	</div>
      <?php
      }
  	}
?>
<div class="main-container">
	<div class="main-container-signin">
	      <form class="form-signin" action="check-login.php" method="POST">
	          <h2> Log in!</h2>
	          <label class="sr-only">Email</label>
	          <input name="email" class="form-control" type="text" autofocus="" required="" placeholder="Email"/>
	          <label class="sr-only">Password</label>
	          <input name="password" class="form-control" type="password" autofocus="" required="" placeholder="Password"/>          
	          <button class="btn btn-lg btn-primary btn-block" type="submit">Log in</button>
	      </form>
	</div>

</div>
<?php include("bottom.html"); ?>
