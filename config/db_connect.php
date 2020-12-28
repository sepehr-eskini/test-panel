<?php 

	try {
		$db = new PDO('mysql:host=localhost;dbname=test_panel;charset=utf8','sepehr_eskini','strongRDBMSPassWord');
	} catch (Exception $e) {
		echo 'Database connection error.';
	}
	
?>