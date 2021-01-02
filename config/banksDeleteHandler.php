<?php 

	include 'db_connect.php';

	if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
		$url = "https://";
	} else {
		$url = "http://";
	}

    $url.= $_SERVER['HTTP_HOST'];   
    $url.= $_SERVER['REQUEST_URI']; 
	$url_components = parse_url($url);  
	parse_str($url_components['query'], $params); 
	$_SESSION['bankIdDelete'] = $params['id'];

	$stmt = $db->prepare('DELETE FROM banks WHERE bank_id = :bank_id');
	$stmt->bindParam(':bank_id', $_SESSION['bankIdDelete']);
	$stmt->execute();

	$stmt = $db->prepare('DELETE FROM bank_accounts WHERE bank_id = :bank_id');
	$stmt->bindParam(':bank_id', $_SESSION['bankIdDelete']);
	$stmt->execute();

	unset($_SESSION['bankIdDelete']);
	header('Location: ../panel_banks.php');

?>