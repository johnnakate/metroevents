<?php
session_start();
include "connect.php";

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
		}else{
			echo "<script> alert('Incorrect email or password.');window.history.back()</script>";
		}
	
}