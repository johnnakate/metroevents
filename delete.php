<?php

include "connect.php";

$userID = $_GET['userID']; 

$del = mysqli_query($mysqli,"DELETE FROM tbluser WHERE userID = '$userID'"); 

header("location:".$_SERVER['HTTP_REFERER']);

?>