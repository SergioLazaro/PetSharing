<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>PetSharing</title>

    <!-- Bootstrap -->
      
    <link href="frameworks/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="frameworks/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/mystyle.css" rel="stylesheet">
    <link href="frameworks/bootstrap-select/js/bootstrap-select.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.9.3/css/bootstrap-select.min.css">
    <!-- JQuery -->
    <script src="http://ajax.googleapis.com/ajax/libs/prototype/1.7.0.0/prototype.js"
            type="text/javascript"></script>
    <script src="http://www.cs.washington.edu/education/courses/cse190m/12sp/homework/7/grading.js"
            type="text/javascript"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="js/searchBar.js"></script>
  </head>
  <body>

      <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle collapsed" aria-controls="navbar" 
                    data-target="#navbar" data-toggle="collapse" type="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Pet Sharing</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse" aria-expanded="false" style="height: 1px;">
            <ul class="nav navbar-nav">
                <li id="home-nav"><a href="home.php">Home</a></li>
                <li id="post-nav"><a href="post.php">Post your advert</a></li>
                <li id="about-nav"><a href="about.php">About us</a></li>
            </ul>
            <?php
                //Check if user has logged in
                if(!isset($_COOKIE["email"])){?>
                    <div class="navbar-form navbar-right" id="login-actions">
                        <div class="form-group">
                            <button class="btn btn-primary" id="loginbutton">Log in</button>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" id="signupbutton">Sign up</button>
                        </div>
                    </div>

                <?php       
                }
                else{   //If yes, we show his user mail ?>
                    <div class="navbar-form navbar-right" id="login-actions">
                        <p id="cookie">Welcome <?= $_COOKIE["email"] ?>,  
                            <a href="check-login.php">(log out)</a>
                        </p>
                    </div>
                <?php
                }
            
            ?>
            <div class="navbar-form navbar-right">
                <form method="POST" action="search.php">
                    <div class="form-group">
                        <input id="search-bar" name="search" class="form-control" type="text" placeholder="Search"/>
                    </div>
                </form>
            </div>
        </div>       
        </div>
    </nav>
		