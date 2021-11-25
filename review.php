<?php
include "connect.php";
session_start();

$userID = $_SESSION['userID'];
 
$resultset = mysqli_query($mysqli,"SELECT * from tblParticipant WHERE userID='$userID'") or die($mysqli->error);
$userreview = $resultset->fetch_assoc();

if(isset($_POST['btnreview'])){
	$eventID = $userreview['eventID']; 
	$userID = $userreview['userID'];
	$wreview = $_POST['wreview'];

		$mysqli-> query("INSERT into tblreview (eventID,userID,review) values ('$eventID','$userID','$wreview')") or die($mysqli->error);
		$mysqli-> query("UPDATE tblEvent SET reviews = reviews+1 WHERE eventID = '$eventID'") or die($mysqli->error);

		
	echo "<script> alert('Thank you for Reviewing in the Event!');window.location='eventsJoined.php'</script>";
}
else{
	header('Location: writeReview.php');
}
?>



	