<?php 

	include 'db_connect.php';

	if(isset($_POST['bankNameEditSubmit'])) {
		session_start();
		$_SESSION['bankNameEdit'] = $_POST['bankName'];
		$_SESSION['bankNameEditError'] = '';

		$stmt = $db->query('SELECT * FROM banks');
		$stmt->execute();
		$banks = $stmt->fetchAll(PDO::FETCH_ASSOC);

		// Bank name validation
		if(empty($_SESSION['bankNameEdit'])) {
			$_SESSION['bankNameEditError'] = 'Enter bank name';
		} else if(!preg_match('/^[a-zA-Z\s]+$/', $_SESSION['bankNameEdit'])) {
			$_SESSION['bankNameEditError'] = 'Bank name must be letters and spaces only';
		}

		// Duplicate bank name validation
		foreach ($banks as $bank) {
			if($bank['bank_name'] == $_SESSION['bankNameEdit'] && $bank['bank_id'] != $_SESSION['bankIdEdit']) {
				$_SESSION['bankNameEditError'] = 'Bank name Exists';
			}
		}

		// Errors checking
		$errors = array($_SESSION['bankNameEditError']);
		if(array_filter($errors)) {
			$headerUrl = '../panel_banksEdit.php' . '?id=' . $_SESSION['bankIdEdit'];
			header("Location: $headerUrl");
		} else {
			$stmt = $db->prepare('UPDATE banks SET bank_name = :bank_name WHERE bank_id = :bank_id');
			$stmt->bindParam(':bank_name', $_SESSION['bankNameEdit']);
			$stmt->bindParam(':bank_id', $_SESSION['bankIdEdit']);
			$stmt->execute();
			unset($_SESSION['bankNameEdit']);
			unset($_SESSION['bankIdEdit']);

			header('Location: ../panel_banks.php');
		}
	}

?>