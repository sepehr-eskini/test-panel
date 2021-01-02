<?php

	session_start(); 
	include 'config/userAuthentication.php';

?>

<head>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script type="text/javascript" src="script/main.js"></script>
</head>
<body>
	<div class="container">
		<div class="section">
			<div class="panel-home">
				<?php if($_SESSION['userType'] == 'user') { ?>
				<ul>
					<li class="right"><a href="config/logOutHandler.php">Log Out</a></li>
					<li class="right"><a href="panel_changePassword.php">Change Password</a></li>
					<li class="left">User: <?php echo htmlspecialchars($_SESSION['userFirstname']) . ' ' . htmlspecialchars($_SESSION['userLastname']); ?></li>
				</ul>
				<?php } ?>

				<?php if($_SESSION['userType'] == 'admin') { ?>
				<ul>
					<li class="right"><a href="config/logOutHandler.php">Log Out</a></li>
					<li class="right"><a href="panel_changePassword.php">Change Password</a></li>
					<li class="left">Admin: <?php echo htmlspecialchars($_SESSION['userFirstname']) . ' ' . htmlspecialchars($_SESSION['userLastname']); ?></li>
				</ul>
				<?php } ?>
			</div>
		</div>
	</div>