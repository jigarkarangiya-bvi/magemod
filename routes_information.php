<!DOCTYPE html>
<html>
<head>
	<title>Routes Information Fetcher</title>
	<?php include 'commons.php'; ?>
</head>
<body>
<?php 

$reader = $objectManager->get('Magento\Framework\Module\Dir\Reader');
$config = $objectManager->get('Magento\Framework\App\Route\Config');
$areaList = $objectManager->get('Magento\Framework\App\AreaList');
$configReader = $objectManager->get('Magento\Framework\App\Route\Config\Reader');

$table = [];
$moduleActions = [];

$actionPaths = $reader->getActionFiles();

foreach ($actionPaths as $fullActionPath) {
    $area = 'frontend';

    $actionPath = explode('\\', $fullActionPath);
    $vendorName = array_shift($actionPath);
    $packageName = array_shift($actionPath);
    $actionClass = array_pop($actionPath);

    // Remove \Controller prefix
    array_shift($actionPath);

    if (in_array('Adminhtml', $actionPath)) {
        $area = 'adminhtml';
        array_shift($actionPath);
    }

    if (!$actionPath) {
        $actionPath = ['Index'];
    }

    $moduleName = $vendorName . '_' . $packageName;

    // Routes that might end in one of the reserved keywords have 'Action' appended. This should reverse in
    // such cases
    if (substr($actionClass, -6) === 'Action') {
        $actionClass = substr($actionClass, 0, -6);
    }

    $moduleActions[$moduleName][$area][] = strtolower(implode('/', $actionPath) . '/' . $actionClass);
}

$areas = $areaList->getCodes();
$moduleOption = null;

foreach ($areas as $area) {
    if ($defaultRouter = $areaList->getDefaultRouter($area)) {
        $routes = $configReader->read($area)[$defaultRouter]['routes'];

        foreach ($routes as $route) {
            $routeInfo = [
                $area,
                $route['frontName'],
            ];

            foreach ($route['modules'] as $module) {
                if ($moduleOption !== null && $moduleOption !== $module) {
                    continue;
                }

                $moduleRoute = $routeInfo;
                $moduleRoute[] = $module;

                if (isset($moduleActions[$module][$area])) {
                    foreach ($moduleActions[$module][$area] as $action) {
                        $moduleRouteAction = $moduleRoute;
                        $moduleRouteAction[] = $route['frontName'] . '/' . $action;

                        $table[] = $moduleRouteAction;
                    }
                }
            }
        }
    }
}
?>
<nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
        <span class="navbar-brand mb-0 h1">Routes Information Tool</span>
        </div>
     </nav>
<div><br></div>
<div class="container">
	<div class="row">
    	<div class="table-responsive">
        <table class="table table-bordered">
	 	 <tr>
	      <th scope="col">#</th>
	      <th scope="col">Area</th>
	      <th scope="col">Frontname</th>
	      <th scope="col">Module Name</th>
	      <th scope="col">Route</th>
	    </tr>
	 	<?php 
	 	$i =1;
	 	foreach ($table as $routeEntity) { ?>
	 	 <tr>
	 	 	<th scope="row"><?php echo $i; ?></th>
	 	 	<td><?php echo $routeEntity[0]; ?></td>
	 	 	<td><?php echo $routeEntity[1]; ?></td>
	 	 	<td><?php echo $routeEntity[2]; ?></td>
	 	 	<td><?php echo $routeEntity[3]; ?></td>
	 	 </tr>
	 	 <?php $i++;} ?>
	</table>
	</div>
  </div>
<?php include 'footer.php'; ?>
</body>
</html>