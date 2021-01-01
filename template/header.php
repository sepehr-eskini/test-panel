<?php

	session_start(); 
	include 'config/userAuthentication.php';

?>

<head>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<div class="container">
		<div class="section">
			<div class="panel-home">
				<ul>
					<li class="right"><a href="config/logOutHandler.php">Log Out</a></li>
					<li class="right"><a href="panel_changePassword.php">Change Password</a></li>
					<li class="left">User: <?php echo htmlspecialchars($_SESSION['userFirstname']) . ' ' . htmlspecialchars($_SESSION['userLastname']); ?></li>
			</ul>
			</div>
		</div>
	</div>