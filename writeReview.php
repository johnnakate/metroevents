<?php
        $title = 'Review';
        require_once 'includes/header.php';
    ?>
<link rel="stylesheet" href="css/register.css">

<body> 

  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <br><br><br><br><br>
            <h5 class="card-title text-center">Write a review</h5>
            
            <hr class="my-4"> 


 <form action="review.php" method="POST">




    <div class="form-label-group" >
    <input class="form-control" type="text"  placeholder="Review" name="wreview" id="wreview"required>
     <label for="wreview">Review</label>
    </div>

    
    <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="btnreview" id="btnreview">Submit</button>

  </form>

  <hr>
      <center>
      <a href="dashboard.php">Go back to Dashboard</a>
      <hr class="my-4">  
        </center>
</div>
        </div>
      </div>
    </div>
  </div>


    <?php
        require_once 'includes/footer.php';
    ?>