<?php
session_start();
include "connect.php";

if(isset($_POST['btnAdd'])){
	$email = $_POST['email'];
	$password = $_POST['password'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$age = $_POST['age'];
	$province = $_POST['province'];
	$city = $_POST['city'];

	$mysqli-> query("INSERT into tbluser (email, password,firstName, lastName, age, province, city) values ('$email','$password','$fname','$lname','$age','$province','$city')") or die("<script> alert('Email already exist');window.location='register.php'</script>");


		$resultset = $mysqli->query("SELECT * from tbluser WHERE email='$email'") or die($mysqli->error);

		$row = $resultset->fetch_assoc();
		$userID = $row['userID'];
		$mysqli-> query("INSERT into tblRegularUser (userID) values ('$userID')") or die($mysqli->error);

		if (isset($_POST['email']) && isset($_POST['password'])) {
	$_SESSION["user_priv"] = $_POST['email']; #pass to event.php
	
	function validate($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	$email = validate($_POST['email']);
	$password = validate($_POST['password']);

	
	
		$sql = "SELECT * FROM tbluser WHERE email = '$email' AND password = '$password'";

		$result = mysqli_query($mysqli, $sql);

		if(mysqli_num_rows($result) === 1){
			$row = mysqli_fetch_assoc($result);
			if(($row['email'] === $email) && ($row['password'] === $password)) {
				$_SESSION['email'] = $row['email'];
				$_SESSION['userID'] = $row['userID'];
				header("Location: profile.php");
				exit();
			}
		}
	
}
}

if(isset($_POST['btnevent'])){
	$userID = $_SESSION['userID'];
	$eventdate = $_POST['event_date'];
	$eventname = $_POST['event_name'];
	$eventdesc = $_POST['event_desc'];
	$mysqli-> query("INSERT into tblevent (userID,eventDate,eventName, eventDesc) values ('$userID','$eventdate','$eventname','$eventdesc')") or die($mysqli->error);
		header("Location:manageEvent.php");
}
?> 