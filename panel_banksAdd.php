<!DOCTYPE html>
<html>

	<?php include 'template/header.php'; ?>
	<?php 	
		include 'config/db_connect.php';

		$stmt = $db->prepare('SELECT * FROM banks ORDER BY bank_name ASC');
		$stmt->execute();
		$banks = $stmt->fetchAll(PDO::FETCH_ASSOC);
	?>

	<div class="container">
		<div class="section">
			<div class="row">
				<div class="col-3">
					<?php include 'template/nav.php'; ?>
				</div>
				<div class="col-9">
					<div class="main-section">
						<div class="bankAccounts-section">
							<a href="panel_banks.php" class="button"><i class="fa fa-arrow-left"></i> Banks</a>
							<form action="config/banksAddHandler.php" method="POST">
								<ul>
									<li> 
										Bank Name:
										<input type="text" name="bankName" value="<?php if(isset($_SESSION['bankNameAdd'])) {echo htmlspecialchars($_SESSION['bankNameAdd']);} ?>">
										<div class="red-text edit-error"><?php echo ($_SESSION['bankNameAddError'] ?? ''); ?></div>
									</li>
									<li><input type="submit" name="bankNameAddSubmit"></li>
								</ul>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php include 'template/footer.php'; ?>
	<?php
	  unset($_SESSION['bankNameAdd']);
	  unset($_SESSION['bankNameAddError']);
	?>

</html>