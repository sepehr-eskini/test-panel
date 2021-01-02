<!DOCTYPE html>
<html>

	<?php include 'template/header.php'; ?>

	<div class="container">
		<div class="section">
			<div class="row">
				<div class="col-3">
					<?php include 'template/nav.php'; ?>
				</div>
				<div class="col-9">
					<div class="main-section">
						<div class="profile-section">
							<a href="panel_profile.php" class="button"><i class="fa fa-arrow-left"></i> Profile</a>
							<form action="config/profileEditHandler.php" method="POST">
								<ul>
									<li>First Name: <input type="text" name="userFirstnameEdit" value="<?php echo ($_SESSION['userFirstnameEdit'] ?? $_SESSION['userFirstname']); ?>"></li>
									<div class="red-text edit-error"><?php echo ($_SESSION['userFirstnameEditError'] ?? ''); ?></div>

									<li>Last Name: <input type="text" name="userLastnameEdit" value="<?php echo ($_SESSION['userLastnameEdit'] ?? $_SESSION['userLastname']); ?>"></li>
									<div class="red-text edit-error"><?php echo ($_SESSION['userLastnameEditError'] ?? ''); ?></div>

									<li>National Code: <input type="text" name="userNationalCodeEdit" value="<?php echo ($_SESSION['userNationalCodeEdit'] ?? $_SESSION['userNationalCode']); ?>"></li>
									<div class="red-text edit-error"><?php echo ($_SESSION['userNationalCodeEditError'] ?? ''); ?></div>

									<li>Email: <input type="text" name="userEmailEdit" value="<?php echo ($_SESSION['userEmailEdit'] ?? $_SESSION['userEmail']); ?>"></li>
									<div class="red-text edit-error"><?php echo ($_SESSION['userEmailEditError'] ?? ''); ?></div>

									<li>Registration Date: <?php echo htmlspecialchars($_SESSION['userRegisterTs']); ?></li>
									<li><input type="submit" name="profileEditSubmit"></li>
								</ul>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php include 'template/footer.php'; ?>

</html>