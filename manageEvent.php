<?php 
		$title = 'Manage Events';
        require_once 'includes/header.php';
?>

<head>
  <link rel="stylesheet" href="css/dashcss.css">
</head>
<body>

<?php
include "connect.php";
  $userID = $_SESSION['userID'];  
  $userevents = $mysqli->query("SELECT * from tblEvent WHERE userID = '$userID'") or die($mysqli->error);
?>

<center><h4>Manage Events</h4></center>
<br>
<table id="tblevents" class="table table-striped table-bordered" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th>Event ID</th>
      <th>User ID</th>
      <th>Event Date</th>
      <th>Event Name</th>
      <th>Event Description</th>
      <th>Event Participant</th>
      <th>Event Upvotes</th>
      <th>Event Reviews</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php 
      while($row = $userevents->fetch_assoc()):
    ?>
    <tr>
      <td><?php echo $row['eventID']?></td>
      <td><?php echo $row['userID']?></td>
      <td><?php echo $row['eventDate']?></td>
      <td><?php echo $row['eventName']?></td>
      <td><?php echo $row['eventDesc']?></td>
      <td><a href="participants.php?eventID=<?php echo $row['eventID']; ?>"><?php echo $row['participants']?></a></td>
      <td><?php echo $row['upvotes']?></td>
      <td><a href="reviews.php?eventID=<?php echo $row['eventID']; ?>"><?php echo $row['reviews']?></a></td>
      <td>
        <a href="deleteEvent.php?eventID=<?php echo $row['eventID']; ?>">DELETE</a>
      </td>
    </tr>
  <?php endwhile;?>
  </tbody>
</table>

</body>
    <?php
        require_once 'includes/footer.php';
    ?>