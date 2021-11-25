<?php

include "connect.php";

$requestDesc = $_GET['requestDesc']; 

$resultset = $mysqli->query("SELECT * from tblRequest WHERE requestDesc = '$requestDesc'") or die($mysqli->error);

$row = $resultset->fetch_assoc();
		$userID = $row['userID'];

		$mysqli-> query("INSERT into tblOrganizer (userID) values ('$userID')") or die($mysqli->error);
		$mysqli-> query("UPDATE tbluser SET role = 'Organizer' WHERE userid = $userID;") or die($mysqli->error);

		$mysqli-> query("INSERT into tblNotifications (userID, notifType, notifDesc) values ('$userID','Promotion Accepted','Your request to become an Organizer has been Approved')") or die($mysqli->error);


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