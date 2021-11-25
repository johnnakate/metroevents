    
    <?php
        $title = 'Admin Dashboard';
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


if($canCreate_event == 'Administrator' AND isset($_SESSION['email'])){
  $resultset = $mysqli->query("SELECT * from tbluser") or die($mysqli->error);
?>

<center><h4>List of Accounts</h4></center>
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
      <th>Action</th>

    </tr>
  </thead>
  <tbody>
    <?php 
      while($row = $resultset->fetch_assoc()):
    ?>
    <tr>
      <td><?php echo $row['userID']?></td>
      <td><?php echo $row['email']?></td>
      <td><?php echo $row['password']?></td>
      <td><?php echo $row['firstName']?></td>
      <td><?php echo $row['lastName']?></td>
      <td><?php echo $row['age']?></td>
      <td><?php echo $row['province']?></td>
      <td><?php echo $row['city']?></td>
      <td><?php echo $row['role']?></td>
      <td>
        <a href="promote.php?userID=<?php echo $row['userID']; ?>">PROMOTE</a>
        <br><hr>
        <a href="delete.php?userID=<?php echo $row['userID']; ?>">DELETE</a>
      </td>
    </tr>
  <?php endwhile;?>
  </tbody>
</table>
</body>
<?php } ?>
    <?php
        require_once 'includes/footer.php';
    ?>