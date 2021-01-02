<?php 

	include 'db_connect.php';

	if(isset($_POST['sign-up'])) {
		session_start();
		$_SESSION['firstName'] = $_POST['firstname'];
		$_SESSION['lastName'] = $_POST['lastname'];
		$_SESSION['email'] = $_POST['email'];
		$_SESSION['nationalCode'] = $_POST['national-code'];
		$_SESSION['password'] = $_POST['password'];
		$_SESSION['rePassword'] = $_POST['re-password'];
		$_SESSION['firstNameError'] = '';
		$_SESSION['lastNameError'] = '';
		$_SESSION['emailError'] = '';
		$_SESSION['nationalCodeError'] = '';
		$_SESSION['passwordError'] = '';
		$_SESSION['rePasswordError'] = '';

		// First name validation
		if(empty($_SESSION['firstName'])) {
			$_SESSION['firstNameError'] = 'Enter your first name';
		} else if(!preg_match('/^[a-zA-Z\s]+$/', $_SESSION['firstName'])) {
			$_SESSION['firstNameError'] = 'First name must be letters and spaces only';
		}

		// Last name validation
		if(empty($_SESSION['lastName'])) {
			$_SESSION['lastNameError'] = 'Enter your last name';
		} else if(!preg_match('/^[a-zA-Z\s]+$/', $_SESSION['lastName'])) {
			$_SESSION['lastNameError'] = 'Last name must be letters and spaces only';
		}

		// Email validation
		if(empty($_SESSION['email'])) {
			$_SESSION['emailError'] = 'Enter your email';
		} else if(!filter_var($_SESSION['email'], FILTER_VALIDATE_EMAIL)) {
			$_SESSION['emailError'] = 'Email is not valid';
		}

		// National code validation
		if(empty($_SESSION['nationalCode'])) {
			$_SESSION['nationalCodeError'] = 'Enter your national code';
		} else if(!preg_match('/^[0-9]{10}$/', $_SESSION['nationalCode'])) {
			$_SESSION['nationalCodeError'] = 'National code is not valid';
		}

		// Password validation
		if(empty($_SESSION['password'])) {
			$_SESSION['passwordError'] = 'Enter your password';
		} else if(!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $_SESSION['password'])) {
			$_SESSION['passwordError'] = 'Password must contain at least 8 characters, at least one uppercase letter, one lowercase letter, one number and one special character';
		}
		
		// Re password validation
		if(empty($_SESSION['rePassword'])) {
			$_SESSION['rePasswordError'] = 'Enter your password again';
		} else if($_SESSION['rePassword'] != $_SESSION['password']) {
			$_SESSION['rePasswordError'] = 'Passwords does not match';
		}

		// Errors checking
		$errors = array($_SESSION['firstNameError'], $_SESSION['lastNameError'], $_SESSION['emailError'], $_SESSION['nationalCodeError'], $_SESSION['passwordError'], $_SESSION['rePasswordError']);
		if(array_filter($errors)) {
			header('Location: ../signUp.php');
		} else {
			$stmt = $db->prepare('INSERT INTO users (firstname, lastname, email, nationalcode, password) VALUES (:firstname, :lastname, :email, :nationalcode, :password)');
			$stmt->bindParam(':firstname', $_SESSION['firstName']);
			$stmt->bindParam(':lastname', $_SESSION['lastName']);
			$stmt->bindParam(':email', $_SESSION['email']);
			$stmt->bindParam(':nationalcode', $_SESSION['nationalCode']);
			$stmt->bindParam(':password', $_SESSION['password']);
			$stmt->execute();
			header('Location: ../signIn.php');
			session_destroy();
		}
	}

?>