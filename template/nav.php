<?php 

	$path = pathinfo($_SERVER['PHP_SELF']);
	$fileName = $path['basename'];

?>

<div class="nav">
	<?php if($_SESSION['userType'] == 'user') { ?>
	<ul>
		<li class="<?php if($fileName == 'panel_profile.php' || $fileName == 'panel_profileEdit.php') {echo 'active';} ?>"><a href="panel_profile.php">Profile</a></li>
		
		<li class="<?php if($fileName == 'panel_bankAccounts.php' || $fileName == 'panel_bankAccountsAdd.php') {echo 'active';} ?>"><a href="panel_bankAccounts.php">Bank Accounts</a></li>
	</ul>
	<?php } ?>

	<?php if($_SESSION['userType'] == 'admin') { ?>
	<ul>
		<li class="<?php if($fileName == 'panel_profile.php' || $fileName == 'panel_profileEdit.php') {echo 'active';} ?>"><a href="panel_profile.php">Profile</a></li>
		
		<li class="<?php if($fileName == 'panel_banks.php' || $fileName == 'panel_banksAdd.php' || $fileName == 'panel_banksEdit.php') {echo 'active';} ?>"><a href="panel_banks.php">Banks</a></li>
	</ul>
	<?php } ?>	
</div>