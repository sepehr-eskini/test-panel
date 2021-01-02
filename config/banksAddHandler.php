<?php 

	include 'db_connect.php';

	if(isset($_POST['bankNameAddSubmit'])) {
		session_start();
		$_SESSION['bankNameAdd'] = $_POST['bankName'];
		$_SESSION['bankNameAddError'] = '';

		$stmt = $db->query('SELECT * FROM banks');
		$stmt->execute();
		$banks = $stmt->fetchAll(PDO::FETCH_ASSOC);

		// Bank name validation
		if(empty($_SESSION['bankNameAdd'])) {
			$_SESSION['bankNameAddError'] = 'Enter bank name';
		} else if(!preg_match('/^[a-zA-Z\s]+$/', $_SESSION['bankNameAdd'])) {
			$_SESSION['bankNameAddError'] = 'Bank name must be letters and spaces only';
		}

		// Duplicate bank name validation
		foreach ($banks as $bank) {
			if($bank['bank_name'] == $_SESSION['bankNameAdd']) {
				$_SESSION['bankNameAddError'] = 'Bank name Exists';
			}
		}

		// Errors checking
		$errors = array($_SESSION['bankNameAddError']);
		if(array_filter($errors)) {
			header('Location: ../panel_banksAdd.php');
		} else {
			$stmt = $db->prepare('INSERT INTO banks (bank_name) VALUES (:bank_name)');
			$stmt->bindParam(':bank_name', $_SESSION['bankNameAdd']);
			$stmt->execute();
			unset($_SESSION['bankNameAdd']);

			header('Location: ../panel_banks.php');
		}
	}

?>