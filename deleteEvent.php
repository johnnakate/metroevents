<?php

include "connect.php";

$eventID = $_GET['eventID']; 

$resultset = $mysqli->query("SELECT * from tblEvent WHERE eventID = '$eventID'") or die($mysqli->error);

$rows = $resultset->fetch_assoc();
		$eventName = $rows['eventName'];


$result = $mysqli->query("SELECT * from tblParticipant WHERE eventID = '$eventID'") or die($mysqli->error);
while($row = $result->fetch_assoc()):
      $userID = $row['userID'];
      $mysqli-> query("INSERT into tblNotifications (userID, notifType, notifDesc) values ('$userID','Event Cancelled','Event $eventName has been cancelled')") or die($mysqli->error);
 
  endwhile;




$del = mysqli_query($mysqli,"DELETE FROM tblevent WHERE eventID = '$eventID'"); 

if($del)
{
    mysqli_close($mysqli); 
    header("location:".$_SERVER['HTTP_REFERER']);
    exit;	
}
else
{
    echo "Error deleting record"; 
}
?>