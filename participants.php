    
    <?php
        $title = 'Participants';
        require_once 'includes/header.php';
    ?>

  </head>
  <body>

<head>
  <link rel="stylesheet" href="css/dashcss.css">
</head>
<body>

<?php
include "connect.php";
$eventID = $_GET['eventID'];



  $result = $mysqli->query("SELECT * from tblParticipant WHERE eventID = '$eventID'") or die($mysqli->error);
?>


<center><h4>List of Participants</h4></center>
<br>
<table id="tblusers" class="table table-striped table-bordered" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th>ID</th>
      <th>Email</th>
      <th>Password</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Age</th>
      <th>Province</th>
      <th>City</th>
      <th>Role</th>


    </tr>
  </thead>
  <tbody>
    <?php 
      while($row = $result->fetch_assoc()):
      $userID = $row['userID'];

      $users = $mysqli->query("SELECT * from tblUser WHERE userID = '$userID'") or die($mysqli->error);
      $rows = $users->fetch_assoc();
    ?>
    <tr>
      <td><?php echo $rows['userID']?></td>
      <td><?php echo $rows['email']?></td>
      <td><?php echo $rows['password']?></td>
      <td><?php echo $rows['firstName']?></td>
      <td><?php echo $rows['lastName']?></td>
      <td><?php echo $rows['age']?></td>
      <td><?php echo $rows['province']?></td>
      <td><?php echo $rows['city']?></td>
      <td><?php echo $rows['role']?></td>

  
    </tr>
  <?php endwhile;?>
  </tbody>
</table>
</body>
    <?php
        require_once 'includes/footer.php';
    ?>