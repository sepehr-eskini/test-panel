<?php 

	include 'db_connect.php';

	if(isset($_POST['sign-in'])) {
		session_start();
		$_SESSION['inputUsername'] = $_POST['username'];
		$_SESSION['inputPassword'] = $_POST['password'];
		$_SESSION['userType'] = $_POST['userType'];
		$_SESSION['inputUsernameError'] = '';
		$_SESSION['inputPasswordError'] = '';
		$_SESSION['loginError'] = '';

		if(empty($_SESSION['inputUsername'])) {
			$_SESSION['inputUsernameError'] = 'Enter username';
		}

		if(empty($_SESSION['inputPassword'])) {
			$_SESSION['inputPasswordError'] = 'Enter password';
		}

		$errors = array($_SESSION['inputUsernameError'], $_SESSION['inputPasswordError']);
		if(array_filter($errors)) {
			header('Location: ../signIn.php');
		} else if($_SESSION['userType'] == 'user') {
			$stmt = $db->prepare('SELECT * FROM users WHERE nationalcode = :nationalcode');
			$stmt->bindParam(':nationalcode', $_SESSION['inputUsername']);
			$stmt->execute();
			$result = $stmt->fetch(PDO::FETCH_ASSOC);
			if($result) {
				if($result['password'] == $_SESSION['inputPassword']) {
					$_SESSION['userId'] = $result['id'];
					$_SESSION['userFirstname'] = $result['firstname'];
					$_SESSION['userLastname'] = $result['lastname'];
					$_SESSION['userEmail'] = $result['email'];
					$_SESSION['userNationalCode'] = $result['nationalcode'];
					$_SESSION['userPassword'] = $result['password'];
					$_SESSION['userRegisterTs'] = $result['register_ts'];
					$_SESSION['userAuthenticated'] = $result['id']; 
					header('Location: ../panel_profile.php');
				} else {
					$_SESSION['loginError'] = 'Incorrect password';
					header('Location: ../signIn.php');
				}
			} else {
				$_SESSION['loginError'] = 'User does not exist';
				header('Location: ../signIn.php');
			}
		} else if($_SESSION['userType'] == 'admin') {
			$stmt = $db->prepare('SELECT * FROM users WHERE nationalcode = :nationalcode AND admin_previlege = 1');
			$stmt->bindParam(':nationalcode', $_SESSION['inputUsername']);
			$stmt->execute();
			$result = $stmt->fetch(PDO::FETCH_ASSOC);
			if($result) {
				if($result['password'] == $_SESSION['inputPassword']) {
					$_SESSION['userId'] = $result['id'];
					$_SESSION['userFirstname'] = $result['firstname'];
					$_SESSION['userLastname'] = $result['lastname'];
					$_SESSION['userEmail'] = $result['email'];
					$_SESSION['userNationalCode'] = $result['nationalcode'];
					$_SESSION['userPassword'] = $result['password'];
					$_SESSION['userRegisterTs'] = $result['register_ts'];
					$_SESSION['userAuthenticated'] = $result['id']; 
					header('Location: ../panel_profile.php');
				} else {
					$_SESSION['loginError'] = 'Incorrect password';
					header('Location: ../signIn.php');
				}
			} else {
				$_SESSION['loginError'] = 'User does not exist';
				header('Location: ../signIn.php');
			}
		}
	}

?>