<?php

include "connect.php";
session_start();
$userID = $_SESSION['userID'];
$eventID = $_GET['eventID']; 


$del = mysqli_query($mysqli,"DELETE FROM tblParticipant WHERE eventID = '$eventID' AND userID = '$userID'");

$mysqli-> query("UPDATE tblEvent SET participants = participants-1 WHERE eventID = '$eventID'") or die($mysqli->error);


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