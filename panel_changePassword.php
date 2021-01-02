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
									<li class="show-password">Current Password: <input type="password" name="userCurrentPassword"></li>
									<i class="fa fa-eye eye-icon-small"></i>
									<div class="red-text edit-error">
										<?php 
											if(isset($_SESSION['userCurrentPasswordError'])) {
												echo $_SESSION['userCurrentPasswordError'];
												unset($_SESSION['userCurrentPasswordError']);
											}
										?>											
									</div>

									<li class="show-password">New Password: <input type="password" name="userNewPassword"></li>
									<i class="fa fa-eye eye-icon-small"></i>
									<div class="red-text edit-error">
										<?php 
											if(isset($_SESSION['userNewPasswordError'])) {
												echo $_SESSION['userNewPasswordError'];
												unset($_SESSION['userNewPasswordError']);
											}
										?>	
									</div>

									<li class="show-password">Confirm New Password: <input type="password" name="userConfirmNewPassword"></li>
									<i class="fa fa-eye eye-icon-small"></i>
									<div class="red-text edit-error">
										<?php 
											if(isset($_SESSION['userConfirmNewPasswordError'])) {
												echo $_SESSION['userConfirmNewPasswordError'];
												unset($_SESSION['userConfirmNewPasswordError']);
											}
										?>
									</div>

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