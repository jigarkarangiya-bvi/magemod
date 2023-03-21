<!DOCTYPE html>
<html>
<head>
	<title>Observer Lookup Tool</title>
	<?php include 'commons.php'; ?>
</head>
<body>
<?php
if (isset($_POST['event_name']) && $_POST['event_name'] !='') {
	$eventName = $_POST['event_name'];
	$eventConfig = $objectManager->create('Magento\Framework\Event\Config');
	$eventConfigData = $eventConfig->getObservers($eventName);
	$events = [];
	foreach ($eventConfigData as $eventName => $config) {
	    $events[] = $eventName;
	}
}

?>
<div class="container">
	<div class="row">
      <h2 class="pb-2 border-bottom">Observer Lookup Tool</h2>
      <div class="table-responsive">
      <table class="table table-sm table-bordered">
      <form method="post">
      	<tr>
	 		<th scope="col">event</th>
	 		<td>
	 			<input type="text" name="event_name" required>
	 		</td>
	 	</tr>
	 	<tr>
	 		<th scope="col"></th>
	 		<td><button type="submit" class="btn btn-success">fetch observers</button></td>
	 	</tr>
      </form>
	</table>
	<table class="table table-sm table-bordered">
		<tr>
	 		<?php if(isset($events)){
	 			foreach($events as $event)
	 			{
	 		 ?>
	 		 <tr>
	 		 	
	 		<td>
	 			<?php echo $event; ?>
	 		</td>
	 		<?php } } else { ?>
	 		 </tr>
	 		<td>Enter event name and click on fetch observers</td>
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