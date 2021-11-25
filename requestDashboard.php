<?php 
		$title = 'Request Dashboard';
        require_once 'includes/header.php';
?>

<head>
  <link rel="stylesheet" href="css/dashcss.css">
</head>
<body>

<?php
include "connect.php";
  $userID = $_SESSION['userID'];  
  $request = $mysqli->query("SELECT * from tblRequest WHERE organizerID = '$userID'") or die($mysqli->error);
?>

<center><h4>Event Requests</h4></center>
<br>
<table id="tblrequest" class="table table-striped table-bordered" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th>Request Type</th>
      <th>Description</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php 
      while($row = $request->fetch_assoc()):
    ?>
    <tr>
      <td><?php echo $row['requestType']?></td>
      <td><?php echo $row['requestDesc']?></td>

      <td>
        <a href="acceptRequest.php?requestDesc=<?php echo $row['requestDesc']; ?>">ACCEPT</a> <br><hr>
        <a href="deleteRequest.php?requestDesc=<?php echo $row['requestDesc']; ?>">DENY</a>
      </td>
    </tr>   
  <?php endwhile;?>
  </tbody>
</table>

<?php  

include "connect.php";
              $emaillogin = $_SESSION["user_priv"];
              $user_info = $mysqli->query("SELECT * from tbluser WHERE email = '$emaillogin'") or die($mysqli->error);
          $getrole = $user_info->fetch_assoc();
          $canCreate_event = $getrole['role'];

          if($canCreate_event == 'Administrator'){
          $request = $mysqli->query("SELECT * from tblRequest WHERE organizerID IS NULL") or die($mysqli->error);

echo  "<center><h4>Promotion Request</h4></center>
<br>
<table id='tblrequest' class='table table-striped table-bordered' cellspacing='0' width='100%''>
  <thead>
    <tr>
      <th>Request Type</th>
      <th>Description</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>";
    
      while($row = $request->fetch_assoc()):
    
   echo "<tr>
      <td>";
      echo $row['requestType'];
      echo "</td>
      <td>";
      echo $row['requestDesc'];
      echo "</td>";
      echo  "<td>
        <a href='acceptPromotion.php?requestDesc=";
        echo $row['requestDesc'];
        echo "'>ACCEPT</a> <br><hr>
        <a href='denyPromotion.php?requestDesc=";
        echo $row['requestDesc']; 
        echo "'>DENY</a>
      </td>
    </tr>";

  endwhile;
  echo "</tbody>
</table>";
          }
?>




</body>
    <?php
        require_once 'includes/footer.php';
    ?>