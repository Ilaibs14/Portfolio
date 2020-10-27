<?php 
session_start();
include('includes/header.php');
?>

  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5 bg-light">
		  <h3 class="text-center">Ilai Ben ShuShan</h3>
          <div class="card-body">
            <h5 class="card-title text-center">Sign In</h5>
			  <?php 
			  	if(isset($_SESSION['status']) && $_SESSION['status'] != '') {
					echo '<h2> '.$_SESSION['status'].' </h2>';
					unset($_SESSION['status']);
				}
			  ?>
            <form class="form-signin" action="code.php" method="post">
              <div class="form-label-group">
				 <label for="inputEmail">Username</label>
                <input type="text" id="inputUsername" name="username" class="form-control" placeholder="Username" required autofocus>
              </div>

              <div class="form-label-group">
                <label for="inputPassword">Password</label>
				<input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required> 
              </div>

              <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input" id="customCheck1">
                <label class="custom-control-label" for="customCheck1">Remember password</label>
              </div>
              <button class="btn btn-lg btn-primary btn-block text-uppercase" name="login_btn" type="submit">Sign in</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>



<?php 
include('includes/scripts.php');
include('includes/footer.php');
?>