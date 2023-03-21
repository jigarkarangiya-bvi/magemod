<!DOCTYPE html>
<html>
<head>
	<title>PHP Infomation</title>
	<?php include 'commons.php'; ?>
</head>
<body>

<div class="container">
	<div class="row">
      <h2 class="pb-2 border-bottom">PHP Information</h2>
     <?php

phpinfo( );

?>
	</div>
  </div>
  <div><a class="btn btn-primary" href="index.php" role="button">Go to home</a></div>
</div>
<?php include 'footer.php'; ?>
</body>
</html>