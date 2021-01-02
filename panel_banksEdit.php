<!DOCTYPE html>
<html>

	<?php include 'template/header.php'; ?>
	<?php 	
		include 'config/db_connect.php';

		$stmt = $db->query('SELECT * FROM banks ORDER BY bank_name ASC');
		$stmt->execute();
		$banks = $stmt->fetchAll(PDO::FETCH_ASSOC);

		if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
		$url = "https://";
		} else {
			$url = "http://";
		}

	    $url.= $_SERVER['HTTP_HOST'];   
	    $url.= $_SERVER['REQUEST_URI']; 
		$url_components = parse_url($url);  
		parse_str($url_components['query'], $params); 
		$_SESSION['bankIdEdit'] = $params['id'];

		$stmt = $db->prepare('SELECT bank_name FROM banks WHERE bank_id = :bank_id');
		$stmt->bindParam(':bank_id', $_SESSION['bankIdEdit']);
		$stmt->execute();
		$bankNameEdit = $stmt->fetch(PDO::FETCH_ASSOC);

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
							<form action="config/banksEditHandler.php" method="POST">
								<ul>
									<li>
										Bank Name:
										<input type="text" name="bankName" value="<?php if(isset($_SESSION['bankNameEdit'])) {echo $_SESSION['bankNameEdit']; unset($_SESSION['bankNameEdit']);} else {echo $bankNameEdit['bank_name'];} ?>">
										<div class="red-text edit-error">
											<?php 
												if(isset($_SESSION['bankNameEditError'])) {
													echo $_SESSION['bankNameEditError'];
													unset($_SESSION['bankNameEditError']);
												}
											?>
										</div>
									</li>
									<li><input type="submit" name="bankNameEditSubmit"></li>
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