<?php include("top.php");?>

<div class="main-container">
<div class="main-container-signin">
      <form class="form-signin" action="check-signup.php" method="POST">
          <h2> Sign up!</h2>
          <label class="sr-only">Email</label>
          <input name="email" class="form-control" type="text" autofocus="" required="" placeholder="Email"/>
          <label class="sr-only">Password</label>
          <input name="password" class="form-control" type="password" autofocus="" required="" placeholder="Password"/>          
          <label class="sr-only">RePassword</label>
          <input name="password2" class="form-control" type="password" autofocus="" required="" placeholder="Retype Password"/>
          <label class="sr-only">Name</label>
          <input name="name" class="form-control" type="text" autofocus="" required="" placeholder="Name"/>
          <label class="sr-only">Surname</label>
          <input name="surname" class="form-control" type="text" autofocus="" required="" placeholder="Surname"/>
          <label class="sr-only">Date of birth</label>
          <input name="birth" class="form-control" type="text" autofocus="" required="" placeholder="Date of birth"/>
          <div class="radio-inline-panel">
              <label>Gender: </label>
            <label class="radio-inline">M</label><input type="radio" name="optradio" id="male" value="M"/>
            <label class="radio-inline">F</label><input type="radio" name="optradio" id="female" value="F"/>
          </div>
          <button class="btn btn-lg btn-primary btn-block" type="submit">Confirm</button>
      </form>
    </div>
  </div>
<?php include("bottom.html"); ?>
