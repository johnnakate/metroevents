<?php
session_start();
include "connect.php";
		$userID = $_SESSION['userID'];
		$email = $_SESSION['email'];


$mysqli-> query("INSERT into tblRequest (userID, requestType, requestDesc) values ('$userID','Request Organizer Role','$email would like to be an Organizer')") or die("<script> alert('You have already sent a request');window.history.back();</script>");

$mysqli-> query("INSERT into tblNotifications (notifType, notifDesc) values ('Organizer Request','$email requests to be an Organizer')") or die($mysqli->error);

		echo "<script> alert('Sent a request');window.history.back()</script>"
?>