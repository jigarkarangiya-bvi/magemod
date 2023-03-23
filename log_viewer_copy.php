<!DOCTYPE html>
<html>
<head>
	<title>Magento Log Viewer</title>
	<?php include 'commons.php'; ?>
	<?php
		/*$this->_dir->getPath('log');*/
		$directory = $objectManager->get('\Magento\Framework\Filesystem\DirectoryList');
		$logPath =  $directory->getPath('log'); 
		$logFile = $logPath.'/exception.log';
	?>
	<script>
      function loadFile() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("content").innerHTML = this.responseText;
          }
        };
        xhttp.open("GET", "<?php echo $logFile; ?>", true);
        xhttp.send();
      }
      setInterval(loadFile, 1000); // refresh every 1 second
    </script>
</head>
<body>
<?php
?>
<div class="container">
	<div class="row">
      <h2 class="pb-2 border-bottom">Magento Log Viewer</h2>
      <div id="content"></div>
  </div>
  <div><a class="btn btn-primary" href="index.php" role="button">Go to home</a></div>
</div>

<?php include 'footer.php'; ?>
</body>
</html>