<!DOCTYPE html>
<html>
<head>
	<title>Magento Infomation</title>
	<?php include 'commons.php'; ?>
</head>
<body>
<?php 
	$deploymentConfig = $objectManager->get('\Magento\Framework\App\DeploymentConfig');
	$dbData = $deploymentConfig->get('db/connection/default');
?>
<div class="container">
	<div class="row">
      <h2 class="pb-2 border-bottom">Magento Database Information</h2>
      <table class="table table-sm table-bordered">
	 	<tr>
	 		<th scope="col">DB Host</th>
	 		<td><?php echo $dbData['host'] ?></td>
	 	</tr>
	 	<tr>
	 		<th scope="col">DB Name</th>
	 		<td><?php echo $dbData['dbname'] ?></td>
	 	</tr>
	 	<tr>
	 		<th scope="col">DB Username</th>
	 		<td><?php echo $dbData['username'] ?></td>
	 	</tr>
	 	<tr>
	 		<th scope="col">DB Password</th>
	 		<td><?php echo $dbData['password'] ?></td>
	 	</tr>
	 	<tr>
	 		<th scope="col">DB Model</th>
	 		<td><?php echo $dbData['model'] ?></td>
	 	</tr>
	 	<tr>
	 		<th scope="col">DB Engine</th>
	 		<td><?php echo $dbData['engine'] ?></td>
	 	</tr>
	 	<tr>
	 		<th scope="col">DB Status</th>
	 		<td><?php echo $dbData['active'] ?></td>
	 	</tr>
	</table>
	<table class="table table-sm table-bordered">
		<tr>
	 		<td>CLI Command to connect</td>
	 		<td>mysql -u <?php echo $dbData['username'] ?> -h <?php echo $dbData['host'] ?> <?php echo $dbData['dbname'] ?> -p</td>
	 	</tr>
	 	<tr>
	 		<td colspan="2"><b>Note:</b> Copy password from above line and enter when asked</td>
	 	</tr>
	</table>
  </div>
  <div><a class="btn btn-primary" href="index.php" role="button">Go to home</a></div>
</div>

<?php include 'footer.php'; ?>
</body>
</html>