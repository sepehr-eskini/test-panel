<?php 

	$path = pathinfo($_SERVER['PHP_SELF']);
	$fileName = $path['basename'];

?>

<div class="nav">
	<ul>
		<li class="<?php if($fileName == 'panel_profile.php' || $fileName == 'panel_profileEdit.php') {echo 'active';} ?>"><a href="panel_profile.php">Profile</a></li>
		<li class="<?php if($fileName == 'panel_birthDateAstrology.php') {echo 'active';} ?>"><a href="panel_birthDateAstrology.php">Birthdate Astrology</a></li>
		<li class="<?php if($fileName == 'panel_bankAccounts.php') {echo 'active';} ?>"><a href="panel_bankAccounts.php">Bank Accounts</a></li>
	</ul>
</div>