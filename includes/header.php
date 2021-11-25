<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    

  <style>.badge {
  position: absolute;
  top: -5px;
  right: 10px;
  padding: 5px 10px;

  background: red;
  color: white;
}</style>
<title>Metro Events - <?php echo $title ?></title>
  </head>
  <body>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #192231; ">
  <a class="navbar-brand" href="#.php">MetroEvents</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>  

      <?php 
      session_start();
      if(isset($_SESSION['email'])) {
      ?>
      <?php echo 	"<li class='nav-item'>
		    		<a class='nav-link' href='profile.php'>Profile</a>
					</li>"; 

          include "connect.php";
              $emaillogin = $_SESSION["user_priv"];
              $user_info = $mysqli->query("SELECT * from tbluser WHERE email = '$emaillogin'") or die($mysqli->error);
          $getrole = $user_info->fetch_assoc();
          $canCreate_event = $getrole['role'];

          if($canCreate_event == 'Administrator'){
          echo  "<li class='nav-item'>
          <a class='nav-link' href='dashboard.php'>Admin Dashboard</a>
          </li>";
          }
          

          if($canCreate_event == 'Organizer' || $canCreate_event == 'Administrator'){
          echo  "<li class='nav-item'>
          <a class='nav-link' href='requestDashboard.php'>Request Dashboard</a>
          </li>";
          }else{
           echo "<li class='nav-item'>
          <a class='nav-link' href='requestOrg.php'>Request Promotion</a>
          </li>";
          }

			echo    "<li class='nav-item dropdown'>
        			<a class='nav-link dropdown-toggle' href='#'' id='navbarDropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Events</a>
        			<div class='dropdown-menu' aria-labelledby='navbarDropdownMenuLink'>
       				<a class='dropdown-item' href='eventDashboard.php'>Join Event</a>
              <a class='dropdown-item' href='eventsJoined.php'>Events Joined</a>";



       				
					if($canCreate_event == 'Organizer' || $canCreate_event == 'Administrator'){
						echo	"<div class='dropdown-divider'></div>
         						<a class='dropdown-item' action='' href='createEvent.php'>Create Event</a>";
      					echo	"<a class='dropdown-item' action='' href='manageEvent.php'>Manage Events</a>
      							</li>";
                    
							}


							$userID = $_SESSION['userID'];


							if($canCreate_event == 'Administrator'){

								$notifications = $mysqli->query("SELECT * from tblNotifications WHERE userID = '$userID' OR notifType='Organizer Request'  ORDER BY notifID DESC LIMIT 5") or die($mysqli->error);
                    
							}else{
								$notifications = $mysqli->query("SELECT * from tblNotifications WHERE userID = '$userID' AND status='new'  ORDER BY notifID DESC LIMIT 5") or die($mysqli->error);
							}

      		

          
          

         

          echo"<li class='nav-item dropdown'>
              <a class='nav-link dropdown-toggle' href='#'' id='navbarDropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Notifications</a>";

              if($canCreate_event == 'Administrator'){

								$countNotif = $mysqli->query("SELECT COUNT(*) as total FROM tblNotifications WHERE userID = '$userID' OR notifType='Organizer Request' ") or die($mysqli->error);
                    
							}else{
								$countNotif = $mysqli->query("SELECT COUNT(*) as total FROM tblNotifications WHERE userID = '$userID' AND status='new' ") or die($mysqli->error);
							}

              

              $count = $countNotif->fetch_assoc();
              




              	if ($count['total'] == 0) {
              	echo "<div class='dropdown-menu' aria-labelledby='navbarDropdownMenuLink'>
              	<a class='dropdown-item' >No notifications</a></li>";
              	} else {
              		echo "<span class='badge'>";
              		echo $count['total'];
              		echo "</span><div class='dropdown-menu' aria-labelledby='navbarDropdownMenuLink'>";
              		while($row = $notifications->fetch_assoc()):

              		echo "<a class='dropdown-item' data-toggle='modal' data-target='#myModal";
                  echo $row['notifID'];
                  echo "'>";
              		echo $row['notifType'];
              		echo "</a><div class='dropdown-divider'></div>";
              		endwhile;
              		echo "</li>";
              	}
              	
				

              
              ?>




      <?php
      }
      ?>


    </ul>
    <style>

.navbar-text {
  font-size: 16px;
}

</style>
    <span class="navbar-text">

      <?php 
      if(isset($_SESSION['email'])) {
      ?>
      <?php echo $_SESSION['email']; 
            echo "&nbsp;&nbsp;&nbsp;<a href=logout.php><small>(logout)</small></a>";?>

      <?php
      }
      ?>

    </span>
  </div>
</nav>


<?php  
if(isset($_SESSION['email'])) {

	if($canCreate_event == 'Administrator'){

								$notifications = $mysqli->query("SELECT * from tblNotifications WHERE userID = '$userID' OR notifType='Organizer Request'  ORDER BY notifID DESC LIMIT 5") or die($mysqli->error);
                
							}else{
								$notifications = $mysqli->query("SELECT * from tblNotifications WHERE userID = '$userID' AND status='new'  ORDER BY notifID DESC LIMIT 5") or die($mysqli->error);
								}
  
        
          

while($row = $notifications->fetch_assoc()):

  echo "<div class='modal fade' id='";
  echo "myModal";
  echo $row['notifID'];
  echo "' role='dialog'>
    <div class='modal-dialog'>
      <!-- Modal content-->
      <div class='modal-content'>
        <div class='modal-header'>
          <h4 class='modal-title'>";
          echo $row['notifType'];
          echo"</h4>
          <button type='button' class='close' data-dismiss='modal'>&times;</button>
          
        </div>
        <div class='modal-body'>
          <p>";
          echo $row['notifDesc'];
          echo "</p>
        </div>
        <div class='modal-footer'>
          <a href='notif.php?notifID=";
          echo $row['notifID']; 
          echo "'>OK</a>
        </div>
      </div>
      </div>
    </div>";

    endwhile;
  }
?>

  </div>