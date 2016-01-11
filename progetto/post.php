<?php include("top.php");?>
      
    <div class="main-container">
      <?php
        if(!isset($_COOKIE["email"])){
          header("Location: login.php?error=1");
        }
        if(isset($_GET["error"])){
          if($_GET["error"] == 1){?>
            <div class="alert alert-danger">
                <a class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Error!</strong> Conection problems.
            </div>
          <?php
          }
        }
      ?>
           <div class="main-container-signin">
    <script src="js/manageFields.js"></script>
    <form class="form-signin" action="check-post.php" method="POST">
        <h2> Create your post</h2>
        <p>Choose post type: </p>
        <div class="radio-inline-panel">
          <label class="radio-inline">Post pet </label><input type="radio" name="optradio" id="petselected" value="pet" onclick="check();"/>
          <label class="radio-inline">Post yourself </label><input type="radio" name="optradio" id="carerselected" value="carer" onclick="check();"/>
        </div>
        <div id="name">          
          <label class="sr-only">Pet Name</label>
          <input name="name" class="form-control" type="text" autofocus="" placeholder="Pet name"/>
        </div>          
        <div id="age">
          <label class="sr-only">Age</label>
          <input name="age" class="form-control" type="text" autofocus="" placeholder="Age"/>
        </div>
        <div id="pettype">
          <label class="sr-only">Pet type</label>
          <select name="pettype" class="form-control">
            <option>Dog</option>
            <option>Cat</option>
            <option>Bird</option>
          </select>
        </div>
        <!--<div id="photo">
          <span class="btn btn-default btn-file">
            Click to browse a photo<input name="photo" id="photo-file" type="file">
          </span>
        </div>-->
        <div id="comments">
          <label class="sr-only">Special comments</label>
          <input name="comment" id="comment" class="form-control" type="text" autofocus="" required="" placeholder="Description and comments"/>
        </div>
        <div id="button">
            <button class="btn btn-lg btn-primary btn-block" type="submit">Post it</button>
        </div>
    </form>
</div>

    </div>       
    
<?php include("bottom.html"); ?>

