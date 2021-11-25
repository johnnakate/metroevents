<?php

include "connect.php";

$notifID = $_GET['notifID']; 

$del = mysqli_query($mysqli,"DELETE FROM tblNotifications WHERE notifId = '$notifID'"); 

header("location:".$_SERVER['HTTP_REFERER']);

?>