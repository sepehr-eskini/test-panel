<?php 

	include 'db_connect.php';

	if(isset($_POST['sign-in'])) {
		session_start();
		$_SESSION['inputUsername'] = $_POST['username'];
		$_SESSION['inputPassword'] = $_POST['password'];
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
			header('Location: ../login.php');
		} else {
			$stmt = $db->prepare('SELECT id, password FROM users WHERE nationalcode = :nationalcode');
			$stmt->bindParam(':nationalcode', $_SESSION['inputUsername']);
			$stmt->execute();
			$result = $stmt->fetch(PDO::FETCH_ASSOC);
			if($result) {
				if($result['password'] == $_SESSION['inputPassword']) {
					$_SESSION['userId'] = $result['id'];
					echo 'User Id: ' . $_SESSION['userId'] . '<br>';
					echo 'Logged On Successfully !';
				} else {
					$_SESSION['loginError'] = 'Incorrect password';
					header('Location: ../login.php');
				}
			} else {
				$_SESSION['loginError'] = 'User does not exist';
				header('Location: ../login.php');
			}
		}
	}

?>