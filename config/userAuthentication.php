<?php 

	if (!$_SESSION['userAuthenticated']) {
		session_destroy();
		header('Location: signIn.php');
	}

?>