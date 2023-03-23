<!DOCTYPE html>
<html>
<head>
	<title>Magento Infomation</title>
	<?php include 'commons.php'; ?>
</head>
<body>
<?php 
$magentoMetadata = $objectManager->get('Magento\Framework\App\ProductMetadataInterface');
$storeListObj = $objectManager->get('Magento\Store\Api\StoreRepositoryInterface');
$storeList = $storeListObj->getList();
?>
<nav class="navbar bg-body-tertiary">
		<div class="container-fluid">
		<span class="navbar-brand mb-0 h1">Magento Information</span>
		</div>
	 </nav>
<br>
<div class="container">
	<div class="row">

      <table class="table table-sm table-bordered">
	 	<tr>
	 		<td>Magento Edition</td>
	 		<td><?php echo $magentoMetadata->getEdition() ?></td>
	 	</tr>
	 	<tr>
	 		<td>Magento Name</td>
	 		<td><?php echo $magentoMetadata->getName() ?></td>
	 	</tr>
	 	<tr>
	 		<td>Magento Version</td>
	 		<td><?php echo $magentoMetadata->getVersion() ?></td>
	 	</tr>
	</table>
   
    <h2 class="pb-2 border-bottom">Stores</h2>
    	<div class="table-responsive">
        <table class="table table-bordered">
	 	 <tr>
	      <th scope="col">#</th>
	      <th scope="col">Store ID</th>
	      <th scope="col">Store Code</th>
	      <th scope="col">Store Name</th>
	      <th scope="col">Active</th>
	      <th scope="col">Group ID</th>
	      <th scope="col">Sort Order</th>
	    </tr>
	 	<?php 
	 	$i =1;
	 	foreach ($storeList as $store) { ?>
	 	 <tr>
	 	 	<th scope="row"><?php echo $i; ?></th>
	 	 	<td><?php echo $store->getStoreId(); ?></td>
	 	 	<td><?php echo $store->getCode(); ?></td>
	 	 	<td><?php echo $store->getName(); ?></td>
	 	 	<td><?php if ($store->getIsActive() == 1 ) { echo 'yes'; } else { echo 'no' ;} ?></td>
	 	 	<td><?php echo $store->getGroupId();?></td>
	 	 	<td><?php echo $store->getSortOrder();?></td>
	 	 </tr>
	 	 <?php $i++;} ?>
	</table>
	</div>
  </div>

<?php include 'footer.php'; ?>
</body>
</html>