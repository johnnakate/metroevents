<?php
session_start();
include "connect.php";
    $email = $_SESSION['email'];
    $eventID = $_GET['eventID'];


$mysqli-> query("INSERT into tblupvote (eventID, upvotes) values ('$eventID','$email upvoted $eventID')") or die("<script> alert('You have already upvoted');window.history.back();</script>");

$mysqli-> query("UPDATE tblEvent SET upvotes = upvotes+1 WHERE eventID = '$eventID'") or die($mysqli->error);

    echo "<script> alert('Thank you!');window.history.back()</script>"
?>