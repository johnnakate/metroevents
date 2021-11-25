<?php
session_start();
include "connect.php";

$eventID = $_GET['eventID'];



$resultset = $mysqli->query("SELECT * from tblEvent WHERE eventID = '$eventID'") or die($mysqli->error);

$row = $resultset->fetch_assoc();
		$organizerID = $row['userID'];
		$eventName = $row['eventName'];
		$email = $_SESSION['email'];
		$userID = $_SESSION['userID'];


$mysqli-> query("INSERT into tblRequest (userID, requestType, requestDesc, organizerID, eventID) values ('$userID','Join $eventName','$email would like to join $eventName','$organizerID','$eventID')") or die("<script> alert('You have already sent a request');window.location='eventDashboard.php'</script>");

$mysqli-> query("INSERT into tblNotifications (userID, notifType, notifDesc) values ('$organizerID','Join Event','$email would like to join $eventName')") or die($mysqli->error);

		echo "<script> alert('Sent a request');window.location='eventDashboard.php'</script>"
		

?>