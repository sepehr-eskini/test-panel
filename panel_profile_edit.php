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
							<form action="profileEditHandler" method="POST">
								<ul>
									<li class="left">First Name: <input type="text" name="userFirstnameEdit" value="<?php echo htmlspecialchars($_SESSION['userFirstname']); ?>"></li>
									<li>Last Name: <input type="text" name="userLastnameEdit" value="<?php echo htmlspecialchars($_SESSION['userLastname']); ?>"></li>
									<li>National Code: <input type="text" name="userNationalCodeEdit" value="<?php echo htmlspecialchars($_SESSION['userNationalCode']); ?>"></li>
									<li>Email: <input type="text" name="userEmailEdit" value="<?php echo htmlspecialchars($_SESSION['userEmail']); ?>"></li>
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