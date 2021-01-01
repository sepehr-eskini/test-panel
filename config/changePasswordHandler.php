<?php 

	include 'db_connect.php';

	if(isset($_POST['changePasswordSubmit'])) {
		session_start();
		$_SESSION['userCurrentPassword'] = $_POST['userCurrentPassword'];
		$_SESSION['userNewPassword'] = $_POST['userNewPassword'];
		$_SESSION['userConfirmNewPassword'] = $_POST['userConfirmNewPassword'];
		$_SESSION['userCurrentPasswordError'] = '';
		$_SESSION['userNewPasswordError'] = '';
		$_SESSION['userConfirmNewPasswordError'] = '';

		// Current password validation
		if(empty($_SESSION['userCurrentPassword'])) {
			$_SESSION['userCurrentPasswordError'] = 'Enter your current password';
		} else if($_SESSION['userCurrentPassword'] != $_SESSION['userPassword']) {
			$_SESSION['userCurrentPasswordError'] = 'Current password is wrong';
		}

		// New password validation
		if(empty($_SESSION['userNewPassword'])) {
			$_SESSION['userNewPasswordError'] = 'Enter new password';
		} else if(!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $_SESSION['userNewPassword'])) {
			$_SESSION['userNewPasswordError'] = 'Password must contain at least 8 characters, at least one uppercase letter, one lowercase letter, one number and one special character';
		} else if($_SESSION['userNewPassword'] == $_SESSION['userPassword']) {
			$_SESSION['userNewPasswordError'] = 'New password is same as current password ';
		}

		// Confirm new password validation
		if(empty($_SESSION['userConfirmNewPassword'])) {
			$_SESSION['userConfirmNewPasswordError'] = 'Confirm new password';
		} else if($_SESSION['userConfirmNewPassword'] != $_SESSION['userNewPassword']) {
			$_SESSION['userConfirmNewPasswordError'] = 'Passwords does not match';
		}

		// Errors checking
		$errors = array($_SESSION['userCurrentPasswordError'], $_SESSION['userNewPasswordError'], $_SESSION['userConfirmNewPasswordError']);
		if(array_filter($errors)) {
			header('Location: ../panel_changePassword.php');
		} else {
			$stmt = $db->prepare('UPDATE users SET password = :password WHERE id = :id');
			$stmt->bindParam(':password', $_SESSION['userNewPassword']);
			$stmt->bindParam(':id', $_SESSION['userId']);
			$stmt->execute();
			$_SESSION['userPassword'] = $_SESSION['userNewPassword'];

			header('Location: ../panel_profile.php');
		}
	}

?>