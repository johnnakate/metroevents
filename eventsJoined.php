<?php 
		$title = 'Events Joined';
        require_once 'includes/header.php';
?>

<head>
  <link rel="stylesheet" href="css/dashcss.css">
</head>
<body>

<?php
include "connect.php";
  $userID = $_SESSION['userID'];  
  $userevents = $mysqli->query("SELECT * from tblParticipant WHERE userID = '$userID'") or die($mysqli->error);
?>

<center><h4>Events Joined</h4></center>
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
      $eventsid = $row['eventID'];

      $events = $mysqli->query("SELECT * from tblevent WHERE eventID = '$eventsid'") or die($mysqli->error);
      $rows = $events->fetch_assoc();
    ?>
    <tr>
      <td><?php echo $rows['eventID']?></td>
      <td><?php echo $rows['userID']?></td>
      <td><?php echo $rows['eventDate']?></td>
      <td><?php echo $rows['eventName']?></td>
      <td><?php echo $rows['eventDesc']?></td>
      <td><a href="participants.php?eventID=<?php echo $row['eventID']; ?>"><?php echo $rows['participants']?></a></td>
      <td><?php echo $rows['upvotes']?></td>
      <td><a href="reviews.php?eventID=<?php echo $row['eventID']; ?>"><?php echo $rows['reviews']?></a></td>
      <td>
      	<a href="upvote.php?eventID=<?php echo $rows['eventID']; ?>">UPVOTE</a>
      	<br><hr>
      	<a href="review.php?eventID=<?php echo $rows['eventID']; ?>">REVIEW</a>
      	<br><hr>
        <a href="leaveEvent.php?eventID=<?php echo $rows['eventID']; ?>">LEAVE</a>
      </td>
    </tr>
  <?php endwhile;?>
  </tbody>
</table>

</body>
    <?php
        require_once 'includes/footer.php';
    ?>