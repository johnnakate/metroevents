<?php

include "connect.php";

$userID = $_GET['userID']; 

		$result = $mysqli-> query("SELECT * FROM tbluser WHERE userID ='$userID'") or die($mysqli->error);
		$row = $result->fetch_assoc();
		$role = $row['role'];

		if($role == 'Regular User'){
		$mysqli-> query("INSERT into tblOrganizer (userID) values ('$userID')") or die($mysqli->error);
		$mysqli-> query("UPDATE tbluser SET role = 'Organizer' WHERE userid = $userID") or die($mysqli->error);

		$mysqli-> query("INSERT into tblNotifications (userID, notifType, notifDesc) values ('$userID','Promotion','You have been promoted to Organizer')") or die($mysqli->error);
		header("Location: dashboard.php");
	}else if($role == 'Organizer'){
		$mysqli-> query("INSERT into tblAdministrator (userID) values ('$userID')") or die($mysqli->error);
		$mysqli-> query("UPDATE tbluser SET role = 'Administrator' WHERE userid = $userID") or die($mysqli->error);

		$mysqli-> query("INSERT into tblNotifications (userID, notifType, notifDesc) values ('$userID','Promotion','You have been promoted to Administrator')") or die($mysqli->error);
		header("Location: dashboard.php");
	}else {
		echo "<script> alert('You cant promote this user any further.');window.history.back()</script>";
	}

?>