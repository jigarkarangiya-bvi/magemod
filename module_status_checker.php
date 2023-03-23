<!DOCTYPE html>
<html>
<head>
	<title>Module Status Checker</title>
	<?php include 'commons.php'; ?>
</head>
<body>
<?php 
$fullModuleList = $objectManager->create('Magento\Framework\Module\FullModuleList');
$allModules = $fullModuleList->getNames();

$enabledModuleList = $objectManager->create('Magento\Framework\Module\ModuleList');
$enabledModules = $enabledModuleList->getNames();

$disabledModules = array_diff($allModules, $enabledModules);
?>
<nav class="navbar bg-body-tertiary">
		<div class="container-fluid">
		<span class="navbar-brand mb-0 h1">Module Status Checker</span>
		</div>
	 </nav>
	 <div><br></div>
<div class="container">
	<div class="row">
	<div class="col">
      <h3 class="pb-2 border-bottom" style="color:green;">Enabled Modules</h3>
      <table class="table table-sm table-bordered">
	 	<?php 
	 	foreach ($enabledModules as $enabledModule) { ?>
	 	 <tr>
	 	 	<td><?php echo $enabledModule; ?></td>
	 	 </tr>
	 	 <?php } ?>
	</table>
	</div>
	<div class="col">
    <h3 class="pb-2 border-bottom" style="color:red;">Disabled Modules</h3>
    	<div class="table-responsive">
        <table class="table table-bordered">
	 	<?php 
	 	foreach ($disabledModules as $disabledModule) { ?>
	 	 <tr>
	 	 	<td><?php echo $disabledModule; ?></td>
	 	 </tr>
	 	 <?php } ?>
	</table>
	</div>
	</div>
  </div>

<?php include 'footer.php'; ?>
</body>
</html>