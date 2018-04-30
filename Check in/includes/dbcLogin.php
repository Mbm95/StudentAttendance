<?php

session_start();

if (isset($_POST['submit'])) {
	
	include 'dbc.php';
	
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
	
	//Error handlers
	//Check if inputs are empty
	if (empty($email) || empty($pwd)) {
		header("Location: ../Index.php?login=empty");
		exit();
	} else {
		$sql = "SELECT * FROM reg_teachers WHERE email='$email'";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);
		if ($resultCheck < 1) {
			header("Location: ../Index.php?login=error");
			exit();
		} else {
			if ($row = mysqli_fetch_assoc($result)) {
				//De-hashing the password
				$hashedPwdCheck = password_verify($pwd, $row['password']);
				if ($hashedPwdCheck == false) {
					header("Location: ../Index.php?login=error");
					exit();
				} elseif ($hashedPwdCheck == true) {
					//Log in the user here
					$_SESSION['u_name'] = $row['name'];
					$_SESSION['u_email'] = $row['email'];
					header("Location: ../Index.php?login=success");
					exit();
				}
			}
		}
	}
} else {
	header("Location: ../Index.php?login=error");
	exit();
}