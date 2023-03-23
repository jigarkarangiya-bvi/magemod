<!DOCTYPE html>
<html>
<head>
	<title>MageMod v1.0-beta by Jigar Karangiya</title>
	<?php include 'commons.php'; ?>
	<?php $page = 'home'; ?>
</head>
<body>
	<nav class="navbar bg-body-tertiary">
		<div class="container-fluid">
		<span class="navbar-brand mb-0 h1">MageMod Tool - Jigar Karangiya</span>
		</div>
	 </nav>
	 <div><br></div>
	<div class="container">
  		<table class="table table-bordered">
			<thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Tool Name</th>
			      <th scope="col">Description</th>
			      <th scope="col">Link</th>
			    </tr>
		  	</thead>
				<tr>
					<th scope="row">1</th>
					<td>Magento Information</td>
					<td>Prints infos about the current magento system.</td>
					<td><a class="btn btn-primary" href="magento_infotmation.php" role="button">Go</a></td>
				</tr>
				<tr>
					<th scope="row">2</th>
					<td>Magento Database Info</td>
					<td>Prints infos about the current database for magento system.</td>
					<td><a class="btn btn-primary" href="magento_db_infotmation.php" role="button">Go</a></td>
				</tr>
				<tr>
					<th scope="row">3</th>
					<td>Class Debugger</td>
					<td>Automated class information grabber tool.</td>
					<td><a class="btn btn-primary" href="class_debug_tool.php" role="button">Go</a></td>
				</tr>
				<tr>
					<th scope="row">4</th>
					<td>Routes Info Grabber</td>
					<td>Lists all registered routes with area, frontname, module, route.</td>
					<td><a class="btn btn-primary" href="routes_information.php" role="button">Go</a></td>
				</tr>
				<tr>
					<th scope="row">5</th>
					<td>PHP configuration Checker</td>
					<td>Outputs information about PHP's configuration.</td>
					<td><a class="btn btn-primary" href="php_information_tool.php" role="button">Go</a></td>
				</tr>
				<tr>
					<th scope="row">6</th>
					<td>Adminer - DB tool</td>
					<td>Database management in a single PHP file</td>
					<td><a class="btn btn-primary" href="adminer.php" role="button">Go</a></td>
				</tr>
				<tr>
					<th scope="row">7</th>
					<td>Advance Search tool</td>
					<td>Advance frontend code grapper tool.</td>
					<td><a class="btn btn-primary" href="search_advanced.php" role="button">Go</a></td>
				</tr>
				<tr>
					<th scope="row">8</th>
					<td>Admin Token Generator</td>
					<td>Create quick admin token without password.</td>
					<td><a class="btn btn-primary" href="admin_token_generator.php" role="button">Go</a></td>
				</tr>
				<tr>
					<th scope="row">9</th>
					<td>Module Status Checker</td>
					<td>Generates seperate list of enabled and disabled modules.</td>
					<td><a class="btn btn-primary" href="module_status_checker.php" role="button">Go</a></td>
				</tr>
				<tr>
					<th scope="row">10</th>
					<td>M2 Observers Lookup</td>
					<td>Fetch a list of all observers for specific in Magento 2.</td>
					<td><a class="btn btn-primary" href="magento_observer_lookup.php" role="button">Go</a></td>
				</tr>
				<tr>
					<th scope="row">11</th>
					<td>Log Viewer</td>
					<td>Read any log file in realtime.</td>
					<td><a class="btn btn-primary" href="log_viewer.php" role="button">Go</a></td>
				</tr>
				<tr>
					<th scope="row">12</th>
					<td>Dependency Dumper</td>
					<td>Dump dependency injection in pretty format.</td>
					<td><a class="btn btn-primary" href="dependency_dumper.php" role="button">Go</a></td>
				</tr>
		</table>
	<?php include 'footer.php'; ?>
</body>
</html>