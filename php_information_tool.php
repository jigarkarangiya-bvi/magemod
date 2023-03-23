<!DOCTYPE html>
<html>
<head>
	<title>PHP Infomation</title>
	<?php include 'commons.php'; ?>
</head>
<body>
<nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
        <span class="navbar-brand mb-0 h1">PHP Information</span>
        </div>
</nav>
<div><br></div>
<div class="container">
	<div class="row">
     <?php phpinfo( ); ?>
	</div>
<?php include 'footer.php'; ?>
</body>
</html>