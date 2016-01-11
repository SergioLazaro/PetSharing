<?php include("top.php");?>
  <script src="js/randomPhotos.js"></script>
    <div class="main-container">
      <?php
        if(isset($_GET["error"])){
          if($_GET["error"] == 1){?>
            <div class="alert alert-warning">
                <a class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Warning!</strong> That user already exists.
            </div>
          <?php
          }
          else{?>
            <div class="alert alert-danger">
                <a class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Error!</strong> Conection problems.
            </div>
          <?php
          }
        }
      ?>
      <div id= "carousel-example-generic" class="carousel slide" data-ride="carousel" data-interval="5000">
          <ol class="carousel-indicators">
            <li data-slide-to="0" data-target="#carousel-example-generic"></li>
            <li data-slide-to="1" data-target="#carousel-example-generic"></li>
            <li data-slide-to="2" data-target="#carousel-example-generic"></li>
            <li data-slide-to="3" data-target="#carousel-example-generic"></li>
            <li data-slide-to="4" data-target="#carousel-example-generic"></li>
          </ol>
          <div class="carousel-inner" role="listbox">
            <div class="item active">
              <img id="photo1" data-holder-rendered="true" alt="Slide num. 1">
            </div>
            <div class="item">
              <img id="photo2" data-holder-rendered="true" alt="Slide num. 2">
            </div>
            <div class="item">
              <img id="photo3" data-holder-rendered="true" alt="Slide num. 3">
            </div>
            <div class="item">
              <img id="photo4" data-holder-rendered="true" alt="Slide num. 4">
            </div>
            <div class="item">
              <img id="photo5" data-holder-rendered="true" alt="Slide num. 5">
            </div>
          </div>
          <a class="left carousel-control" data-slide="prev"
 role="button" href="#carousel-example-generic">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
          </a>
          <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
          </a>
     </div>
    <hr class="featurette-divider"> 
  </div>
  <div class="main-container-bottom">
    <div class="row">
        <div class="col-lg-4">
          <img class="img-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" height="140" width="140">
          <h2>Create a post for your pet</h2>
          <p>People could see your pet and interest for it. Show important information about your pet (like amount of food, diseases, ...) could help you to
          be elected.
          </p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img class="img-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" height="140" width="140">
          <h2>Create a post for caring a pet</h2>
          <p>Show to people you want to take care of a pet and 
            ease other information about you. Good self description make bigger offers!
          </p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img class="img-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" height="140" width="140">
          <h2>Keep in touch with other users</h2>
          <p>Thanks to our chat system you could speak with
            other users and choose a date or a place to meet.
          </p>
        </div><!-- /.col-lg-4 -->
      </div>
      <hr class="featurette-divider">
  </div>
    
<?php include("bottom.html");?>

