    
    <?php
        $title = 'Reviews';
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



  $result = $mysqli->query("SELECT * from tblReview WHERE eventID = '$eventID'") or die($mysqli->error);
?>


<center><h4>Reviews</h4></center>
<br>
<table id="tblusers" class="table table-striped table-bordered" cellspacing="0" width="50%">
  <thead>
    <tr>
      <th>ID</th>
      <th>Review</th>
    </tr>
  </thead>
  <tbody>
    <?php 
      while($row = $result->fetch_assoc()):
    ?>
    <tr>
      <td><?php echo $row['userID']?></td>
      <td><?php echo $row['review']?></td>
    </tr>
  <?php endwhile;?>
  </tbody>
</table>
</body>
    <?php
        require_once 'includes/footer.php';
    ?>