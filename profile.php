    
    <?php
        $title = 'User Profile';
        require_once 'includes/header.php';
    ?>


<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.title {
  color: grey;
  font-size: 18px;
}



</style>


<br><br>
<h2 style="text-align:center">User Profile</h2>
<hr><br><br>
<div class="card">
    <img src="images/profile.jpg" style="width:100%">

    <?php  
    $userID = $_SESSION['userID'];
    $resultset = mysqli_query($mysqli,"SELECT * from tblUser WHERE userID='$userID'") or die($mysqli->error);
    $row = $resultset->fetch_assoc();
    ?>

  <h1><?php echo $row['firstName']?> <?php echo $row['lastName']?></h1>
  <p class="title"><?php echo $row['role']?></p>
  <p><?php echo $row['email']?></p>

</div>


    <?php
        require_once 'includes/footer.php';
    ?>