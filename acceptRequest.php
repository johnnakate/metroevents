<?php

include "connect.php";

$requestDesc = $_GET['requestDesc']; 

$resultset = $mysqli->query("SELECT * from tblRequest WHERE requestDesc = '$requestDesc'") or die($mysqli->error);

$row = $resultset->fetch_assoc();
		$userID = $row['userID'];
		$eventID = $row['EventID'];

		$resultset = $mysqli->query("SELECT * from tblEvent WHERE eventID = '$eventID'") or die($mysqli->error);

$row = $resultset->fetch_assoc();
		$eventName = $row['eventName'];


		$mysqli-> query("INSERT into tblNotifications (userID, notifType, notifDesc) values ('$userID','Accepted Join Request','Your request to join $eventName has been accepted')") or die($mysqli->error);

		$mysqli-> query("INSERT into tblParticipant (userID, eventID) values ('$userID','$eventID')") or die($mysqli->error);

		$mysqli-> query("UPDATE tblEvent SET participants = participants+1 WHERE eventID = '$eventID'") or die($mysqli->error);






$del = mysqli_query($mysqli,"DELETE FROM tblRequest WHERE requestDesc = '$requestDesc'"); 

if($del)
{
    mysqli_close($mysqli); 
    header("location:requestDashboard.php"); 
    exit;	
}
else
{
    echo "Error deleting record"; 
}
?>