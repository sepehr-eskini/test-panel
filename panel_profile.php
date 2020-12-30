<!DOCTYPE html>
<html>

	<?php include 'template/header.php'; ?>

	<div class="container">
		<div class="section">
			<div class="row">
				<div class="col-3">
					<div class="nav">
						<ul>
							<li class="active"><a href="panel_profile.php">Profile</a></li>
							<li><a href="panel_birthDateAstrology.php">Birthdate Astrology</a></li>
							<li><a href="panel_bankAccounts.php">Bank Accounts</a></li>
						</ul>
					</div>
				</div>
				<div class="col-9">
					<div class="main-section">
						<div class="profile-section">
							<ul>
								<li>Name: <?php echo htmlspecialchars($_SESSION['userFirstname']) . ' ' . htmlspecialchars($_SESSION['userLastname']); ?></li>
								<li>National Code: <?php echo htmlspecialchars($_SESSION['userNationalCode']); ?></li>
								<li>Email: <?php echo htmlspecialchars($_SESSION['userEmail']); ?></li>
								<li>Registration Date: <?php echo htmlspecialchars($_SESSION['userRegisterTs']); ?></li>
								<li><a href="panel_profile_edit.php">Edit Profile</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php include 'template/footer.php'; ?>

</html>