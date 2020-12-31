<!DOCTYPE html>
<html>

	<?php include 'template/header.php'; ?>
	<?php 	
		include 'config/db_connect.php';
		$stmt = $db->prepare('SELECT * FROM bank_accounts LEFT JOIN banks ON bank_accounts.bank_id = banks.bank_id WHERE user_id = :user_id ');
		$stmt->bindParam('user_id', $_SESSION['userId']);
		$stmt->execute();
		$bankAccountsResult = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
							<a href="panel_bankAccountsAdd.php" class="button">+ Add Bank Account</a>

							<table>
								<tr>
									<th>No.</th>
									<th>Bank Name</th>
									<th>Account Number</th>
								</tr>

								<?php $i = 1; foreach ($bankAccountsResult as $bar) { ?>
								<tr>
									<td><?php echo $i; $i++; ?></td>
									<td><?php echo htmlspecialchars($bar['bank_name']); ?></td>
									<td><?php echo htmlspecialchars($bar['bank_account_number']); ?></td>
								</tr>
								<?php } ?>
							</table>

							<?php if(count($bankAccountsResult) == 0) {	?>
							<div class="not-found"><?php echo 'No Bank Account Found.' ?></div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php include 'template/footer.php'; ?>

</html>