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
									<li>First Name: <input type="text" name="userFirstnameEdit" value="<?php if(isset($_SESSION['userFirstnameEdit'])) {echo $_SESSION['userFirstnameEdit']; unset($_SESSION['userFirstnameEdit']);} else {echo $_SESSION['userFirstname'];} ?>"></li>
									<div class="red-text edit-error">
										<?php 
											if(isset($_SESSION['userFirstnameEditError'])) {
												echo $_SESSION['userFirstnameEditError'];
												unset($_SESSION['userFirstnameEditError']);
											}
										?>
									</div>

									<li>Last Name: <input type="text" name="userLastnameEdit" value="<?php if(isset($_SESSION['userLastnameEdit'])) {echo $_SESSION['userLastnameEdit']; unset($_SESSION['userLastnameEdit']);} else {echo $_SESSION['userLastname'];} ?>"></li>
									<div class="red-text edit-error">
										<?php 
											if(isset($_SESSION['userLastnameEditError'])) {
												echo $_SESSION['userLastnameEditError'];
												unset($_SESSION['userLastnameEditError']);
											}
										?>
									</div>

									<li>National Code: <input type="text" name="userNationalCodeEdit" value="<?php if(isset($_SESSION['userNationalCodeEdit'])) {echo $_SESSION['userNationalCodeEdit']; unset($_SESSION['userNationalCodeEdit']);} else {echo $_SESSION['userNationalCode'];} ?>"></li>
									<div class="red-text edit-error">
										<?php 
											if(isset($_SESSION['userNationalCodeEditError'])) {
												echo $_SESSION['userNationalCodeEditError'];
												unset($_SESSION['userNationalCodeEditError']);
											}
										?>
									</div>

									<li>Email: <input type="text" name="userEmailEdit" value="<?php if(isset($_SESSION['userEmailEdit'])) {echo $_SESSION['userEmailEdit']; unset($_SESSION['userEmailEdit']);} else {echo $_SESSION['userEmail'];} ?>"></li>
									<div class="red-text edit-error">
										<?php 
											if(isset($_SESSION['userEmailEditError'])) {
												echo $_SESSION['userEmailEditError'];
												unset($_SESSION['userEmailEditError']);
											}
										?>
									</div>

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