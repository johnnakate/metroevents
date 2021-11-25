   <?php
        $title = 'Create Event';
        require_once 'includes/header.php';
    ?>
<link rel="stylesheet" href="css/register.css">


  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Create an event</h5>


 <form  class="form-signin" action="create.php" method="POST">

    <div class="form-label-group">
    <input class="form-control" type="date" id="event_date" name="event_date" required>
    <label for="Event_Date">Event Date:</label>
    </div>

    <div class="form-label-group">
    <input class="form-control" type="text"  placeholder="Enter Event Name" name="event_name" id="event_name"required>
     <label for="event_name">Event Name:</label>
    </div>

    <div class="form-label-group">
    <input class="form-control" type="text" placeholder="Enter Event Description" name="event_desc" id="event_desc"required>
    <label for="event_desc">Event Description:</label>
    </div>

    <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="btnevent" id="btnevent">Make Event</button>

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