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
							<form action="config/changePasswordHandler.php" method="POST">
								<ul>
									<li>Current Password: <input type="password" name="userCurrentPassword"></li>
									<div class="red-text edit-error"><?php echo ($_SESSION['userCurrentPasswordError'] ?? ''); ?></div>

									<li>New Password: <input type="password" name="userNewPassword"></li>
									<div class="red-text edit-error"><?php echo ($_SESSION['userNewPasswordError'] ?? ''); ?></div>

									<li>Confirm New Password: <input type="password" name="userConfirmNewPassword"></li>
									<div class="red-text edit-error"><?php echo ($_SESSION['userConfirmNewPasswordError'] ?? ''); ?></div>

									<li><input type="submit" name="changePasswordSubmit"></li>
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