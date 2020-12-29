<?php 

	$host = 'localhost';
	$dbname = 'test_panel';
	$charset = 'utf8';
	$username = 'sepehr_eskini';
	$password = 'strongRDBMSPassWord';

	function db_connect ($host, $dbname, $charset, $username, $password) {
		try {
			$db = new PDO("mysql:host=$host;dbname=$dbname;charset=$charset",$username,$password);
			return $db;
		} catch (Exception $e) {
			echo 'Database connection error.';
		}
	}

	$db = db_connect($host, $dbname, $charset, $username, $password);
	
?>