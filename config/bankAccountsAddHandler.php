<?php 

	include 'db_connect.php';

	if(isset($_POST['bankAccountsAddSubmit'])) {
		session_start();
		$_SESSION['bankIdAdd'] = $_POST['bankId'];
		$_SESSION['bankAccountNumberAdd'] = $_POST['bankAccountNumber'];
		$_SESSION['bankAccountNumberAddError'] = '';

		$stmt = $db->prepare('SELECT * FROM bank_accounts WHERE user_id = :user_id');
		$stmt->bindParam(':user_id', $_SESSION['userId']);
		$stmt->execute();
		$userBankAccountsResult = $stmt->fetchAll(PDO::FETCH_ASSOC);

		// First name validation
		if(empty($_SESSION['bankAccountNumberAdd'])) {
			$_SESSION['bankAccountNumberAddError'] = 'Enter your bank account number';
		} else if(!preg_match('/^[0-9]{11,}$/', $_SESSION['bankAccountNumberAdd'])) {
			$_SESSION['bankAccountNumberAddError'] = 'Your bank account number must be at least 11 digits';
		}
		foreach ($userBankAccountsResult as $ubar) {
			if($ubar['bank_id'] == $_SESSION['bankIdAdd'] && $ubar['bank_account_number'] == $_SESSION['bankAccountNumberAdd']) {
				$_SESSION['bankAccountNumberAddError'] = 'Bank account Exists';
			}
		}

		// Errors checking
		$errors = array($_SESSION['bankAccountNumberAddError']);
		if(array_filter($errors)) {
			header('Location: ../panel_bankAccountsAdd.php');
		} else {
			$stmt = $db->prepare('INSERT INTO bank_accounts (user_id, bank_id, bank_account_number) VALUES (:user_id, :bank_id, :bank_account_number)');
			$stmt->bindParam(':user_id', $_SESSION['userId']);
			$stmt->bindParam(':bank_id', $_SESSION['bankIdAdd']);
			$stmt->bindParam(':bank_account_number', $_SESSION['bankAccountNumberAdd']);
			$stmt->execute();
			unset($_SESSION['bankAccountNumberAdd']);
			unset($_SESSION['bankIdAdd']);

			header('Location: ../panel_bankAccounts.php');
		}
	}

?>