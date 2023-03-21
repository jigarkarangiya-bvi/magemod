<!DOCTYPE html>
<html>
<head>
	<title>Admin Token Generator</title>
	<?php include 'commons.php'; ?>
</head>
<body>
<?php 
$tokenModelFactory = $objectManager->get('Magento\Integration\Model\Oauth\TokenFactory');
$userModel = $objectManager->get('Magento\User\Model\User');
$userList = $userModel->getCollection();

if (isset($_POST['admin_user'])) {
	$username = $_POST['admin_user'];
	$adminUser = $userModel->loadByUsername($username);
	$tokenModel = $tokenModelFactory->create();
    $token = $tokenModel->createAdminToken($adminUser->getId());
}
?>
<div class="container">
	<div class="row">
      <h2 class="pb-2 border-bottom">Magento Admin Token Generator</h2>
      <div class="table-responsive">
      <table class="table table-sm table-bordered">
      <form method="post">
      	<tr>
	 		<th scope="col">Select Admin User</th>
	 		<td>
	 			<select name="admin_user" class="form-control">
	 			<?php foreach ($userList as $user) { ?>
	 				<option value="<?php echo $user->getUsername(); ?>"><?php echo $user->getUsername(); ?></option>
	 			<?php } ?>
	 			</select>
	 		</td>
	 	</tr>
	 	<tr>
	 		<th scope="col"></th>
	 		<td><button type="submit" class="btn btn-success">Generate</button></td>
	 	</tr>
      </form>
	</table>
	<table class="table table-sm table-bordered">
		<tr>
	 		<?php if(isset($token)){ ?>
	 		<td><?php echo str_replace('oauth_token=', '', $token); ?></td>
	 		<?php } else { ?>
	 		<td>Click on generate button</td>
	 		<?php }?>
	 	</tr>
	</table>
	 </div>
  </div>
  <div><a class="btn btn-primary" href="index.php" role="button">Go to home</a></div>
</div>

<?php include 'footer.php'; ?>
</body>
</html>