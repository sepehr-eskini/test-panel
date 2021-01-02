<!DOCTYPE html>
<html>

	<?php include 'template/header.php'; ?>
	<?php 	
		include 'config/db_connect.php';
		$stmt = $db->query('SELECT * FROM banks');
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
							<a href="panel_banksAdd.php" class="button">+ Add Bank</a>

							<table>
								<tr>
									<th>Edit</th>
									<th>Delete</th>
									<th>No.</th>
									<th>Bank Name</th>
									<th>Submition Date</th>
								</tr>

								<?php $i = 1; foreach ($banks as $bank) { ?>
								<tr>
										<td><a href="panel_banksEdit.php?id=<?php echo $bank['bank_id']; ?>"><i class="fa fa-edit edit-icon"></i></a></td>
										<td><a href="config/banksDeleteHandler.php?id=<?php echo $bank['bank_id']; ?>"><i class="fa fa-remove remove-icon"></i></a></td>
										<td><?php echo $i; $i++; ?></td>
										<td><?php echo htmlspecialchars($bank['bank_name']); ?></td>
										<td><?php echo htmlspecialchars($bank['submition_date']); ?></td>
								</tr>
								<?php } ?>
							</table>

							<?php if(count($banks) == 0) {	?>
							<div class="not-found"><?php echo 'No Bank Found.' ?></div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php include 'template/footer.php'; ?>

</html>