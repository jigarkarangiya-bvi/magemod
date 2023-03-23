<!DOCTYPE html>
<html>
<head>
	<title>Class Debugger Tool</title>
	<?php include 'commons.php'; ?>
</head>
<body>
<?php
if (isset($_POST['class_name']) && $_POST['class_name'] !='') {
	$className = $_POST['class_name'];
	$classObj = $objectManager->get($className);
	$classMethods = get_class_methods($classObj);
}

?>
<nav class="navbar bg-body-tertiary">
		<div class="container-fluid">
		<span class="navbar-brand mb-0 h1">Class Debugger Tool</span>
		</div>
	 </nav>
<div><br></div>
<div class="container">
	<div class="row">
      <div class="table-responsive">
      <table class="table table-sm table-bordered">
      <form method="post">
      	<tr>
	 		<th scope="col">Class</th>
	 		<td>
	 			<input type="text" name="class_name" required>
	 		</td>
	 	</tr>
	 	<tr>
	 		<th scope="col"></th>
	 		<td><button type="submit" class="btn btn-success">get class methods</button></td>
	 	</tr>
      </form>
	</table>
	<table class="table table-sm table-bordered">
		<tr>
	 		<?php if(isset($classMethods)){
	 			foreach($classMethods as $method)
	 			{
	 		 ?>
	 		 <tr>
	 		 	
	 		<td>
	 			<?php echo $method; ?>
	 		</td>
	 		<?php } } else { ?>
	 		 </tr>
	 		<td>Click on get class methods to fetch</td>
	 		<?php }?>
	 	</tr>
	</table>
	 </div>
  </div>

<?php include 'footer.php'; ?>
</body>
</html>