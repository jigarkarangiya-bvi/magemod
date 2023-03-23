<!DOCTYPE html>
<html>
<head>
	<title>Dependency dumper</title>
	<?php include 'commons.php'; ?>
</head>
<body>
<?php 
use Symfony\Component\VarDumper\Cloner\VarCloner;
use Symfony\Component\VarDumper\Dumper\CliDumper;
$configLoader = $objectManager->get('Magento\Framework\ObjectManager\ConfigLoaderInterface');
$configDataPrimary = [];

        /*$configDataPrimary = $configLoader->load('primary');*/
       
        
        // Developer mode
        if ($configLoader instanceof \Magento\Framework\App\ObjectManager\ConfigLoader) {
            $configDataPrimary = $configLoader->load('primary');
        }

        // Production mode
        if ($configLoader instanceof \Magento\Framework\App\ObjectManager\ConfigLoader\Compiled) {
            $configDataPrimary = $configLoader->load('global');
        }


        //$scopes = ['global','adminhtml','frontend','graphql','webapi_rest','webapi_soap']; 
        $scope = 'global';
        $configDataScope = $configLoader->load($scope);  

        $configData = array_merge_recursive($configDataPrimary, $configDataScope);

        /*echo "<pre>";

        foreach($configData as $config)
        {
            print_r($config);
        }*/
        
        /*$cloner = new VarCloner();
        $cloner->setMaxItems(-1);
        $cloner->setMaxString(-1);
        $dumper = new CliDumper();
        $config = $configData;
        //$dumpContent = $dumper->dump($cloner->cloneVar($configData), true);
        echo "<pre>";
        foreach ($configData['preferences'] as $preference) {
           print_r($preference,true);
        }
        //var_dump($preferences);*/
        /*die;*/
?>
<nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
        <span class="navbar-brand mb-0 h1">Dependency Dumper</span>
        </div>
     </nav>
<div><br></div>
<div class="container">
	<div class="row">
    	<p>Coming Soon !!</p>
	</div>
<?php include 'footer.php'; ?>
</body>
</html>