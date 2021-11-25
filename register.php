    
    <?php
        $title = 'Register';
        require_once 'includes/header.php';
    ?>
      <link rel="stylesheet" href="css/register.css">
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Registration</h5>
            <form class="form-signin" action="create.php" method="POST">

              <div class="form-label-group">
                <input type="text" id="email" name="email" class="form-control" placeholder="Email" required>
                <label for="email">Email</label>
              </div>

              <div class="form-label-group">
                <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                <label for="password">Password</label>
              </div>


              <div class="form-label-group">
                <input type="text" id="fname" name="fname" class="form-control" placeholder="First Name" required>
                <label for="fname">First Name</label>
              </div>

              <div class="form-label-group">
                <input type="text" id="lname" name="lname" class="form-control" placeholder="Last Name" required>
                <label for="lname">Last Name</label>
              </div>

              <div class="form-label-group">
                <input type="number" id="age" name="age" class="form-control" placeholder="Age" required>
                <label for="age">Age</label>
              </div>

             <div class="form-label-group">
                <input type="text" id="province" name="province" class="form-control" placeholder="Province" required autofocus>
                <label for="province">Province</label>
              </div>

              <div class="form-label-group">
                <input type="text" id="city" name="city" class="form-control" placeholder="City" required autofocus>
                <label for="city">City</label>
              </div>

              <button class="btn btn-lg btn-primary btn-block text-uppercase" name="btnAdd" id="btnAdd" type="submit">Register</button>
              <hr class="my-4">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>



    <?php
        require_once 'includes/footer.php';
    ?>