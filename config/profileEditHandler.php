<?php 

	include 'db_connect.php';

	if(isset($_POST['profileEditSubmit'])) {
		session_start();
		$_SESSION['userFirstnameEdit'] = $_POST['userFirstnameEdit'];
		$_SESSION['userLastnameEdit'] = $_POST['userLastnameEdit'];
		$_SESSION['userEmailEdit'] = $_POST['userEmailEdit'];
		$_SESSION['userNationalCodeEdit'] = $_POST['userNationalCodeEdit'];
		$_SESSION['userFirstnameEditError'] = '';
		$_SESSION['userLastnameEditError'] = '';
		$_SESSION['userEmailEditError'] = '';
		$_SESSION['userNationalCodeEditError'] = '';

		// First name validation
		if(empty($_SESSION['userFirstnameEdit'])) {
			$_SESSION['userFirstnameEditError'] = 'Enter your first name';
		} else if(!preg_match('/^[a-zA-Z\s]+$/', $_SESSION['userFirstnameEdit'])) {
			$_SESSION['userFirstnameEditError'] = 'First name must be letters and spaces only';
		}

		// Last name validation
		if(empty($_SESSION['userLastnameEdit'])) {
			$_SESSION['userLastnameEditError'] = 'Enter your last name';
		} else if(!preg_match('/^[a-zA-Z\s]+$/', $_SESSION['userLastnameEdit'])) {
			$_SESSION['userLastnameEditError'] = 'Last name must be letters and spaces only';
		}

		// Email validation
		if(empty($_SESSION['userEmailEdit'])) {
			$_SESSION['userEmailEditError'] = 'Enter your email';
		} else if(!filter_var($_SESSION['userEmailEdit'], FILTER_VALIDATE_EMAIL)) {
			$_SESSION['userEmailEditError'] = 'Email is not valid';
		}

		// National code validation
		if(empty($_SESSION['userNationalCodeEdit'])) {
			$_SESSION['userNationalCodeEditError'] = 'Enter your national code';
		} else if(!preg_match('/^[0-9]{10}$/', $_SESSION['userNationalCodeEdit'])) {
			$_SESSION['userNationalCodeEditError'] = 'National code is not valid';
		}

		// Errors checking
		$errors = array($_SESSION['userFirstnameEditError'], $_SESSION['userLastnameEditError'], $_SESSION['userEmailEditError'], $_SESSION['userNationalCodeEditError']);
		if(array_filter($errors)) {
			header('Location: ../panel_profileEdit.php');
		} else {
			$stmt = $db->prepare('UPDATE users SET firstname = :firstname, lastname = :lastname, email = :email, nationalcode = :nationalcode WHERE id = :id');
			$stmt->bindParam(':firstname', $_SESSION['userFirstnameEdit']);
			$stmt->bindParam(':lastname', $_SESSION['userLastnameEdit']);
			$stmt->bindParam(':email', $_SESSION['userEmailEdit']);
			$stmt->bindParam(':nationalcode', $_SESSION['userNationalCodeEdit']);
			$stmt->bindParam(':id', $_SESSION['userId']);
			$stmt->execute();
			$_SESSION['userFirstname'] = $_SESSION['userFirstnameEdit'];
			$_SESSION['userLastname'] = $_SESSION['userLastnameEdit'];
			$_SESSION['userNationalCode'] = $_SESSION['userNationalCodeEdit'];
			$_SESSION['userEmail'] = $_SESSION['userEmailEdit'];

			header('Location: ../panel_profile.php');
		}
	}

?>