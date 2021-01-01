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
							<a href="panel_bankAccounts.php" class="button"><i class="fa fa-arrow-left"></i> Bank Accounts</a>
							<form action="config/bankAccountsAddHandler.php" method="POST">
								<ul>
									<li> 
										Bank Name:
										<select name="bankId">
											<?php foreach ($banks as $bank) { ?>
											<option value="<?php echo $bank['bank_id']; ?>"><?php echo $bank['bank_name']; ?></option>
											<?php } ?>
										</select>
									</li>

									<li> 
										Bank Account Number:
										<input type="text" name="bankAccountNumber" value="<?php if(isset($_SESSION['bankAccountNumberAdd'])) {echo htmlspecialchars($_SESSION['bankAccountNumberAdd']);} ?>">
										<div class="red-text edit-error"><?php echo ($_SESSION['bankAccountNumberAddError'] ?? ''); ?></div>
									</li>

									<li><input type="submit" name="bankAccountsAddSubmit"></li>
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
	  unset($_SESSION['bankAccountNumberAdd']);
	  unset($_SESSION['bankAccountNumberAddError']);
	?>

</html>