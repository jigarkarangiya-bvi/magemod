<!DOCTYPE html>
<html>
<head>
	<title>Magento Log Viewer</title>
  <style>
      div.scroll {
        overflow-x: hidden;
        overflow-y: auto;
        height: 420px;
      }
    </style>
	<?php include 'commons.php'; ?>
	<?php
    $filename = "system.log";
    if (isset($_POST['log_file'])) {
        $filename = $_POST['log_file'];
    }
		$directoryList = $objectManager->get('\Magento\Framework\App\Filesystem\DirectoryList');
    $driver = $objectManager->get('\Magento\Framework\Filesystem\DriverInterface');
    $pathLogfile = $directoryList->getPath('log') . DIRECTORY_SEPARATOR . $filename;
    //tail the length file content
    $lengthBefore = 500000;
    $contents = '';
    $handle = $driver->fileOpen($pathLogfile, 'r');
    fseek($handle, -$lengthBefore, SEEK_END);
    if (!$handle) {
        $contents =  "Log file is not readable or does not exist at this moment. File path is "
        . $pathLogfile;
    }

    if ($driver->stat($pathLogfile)['size'] > 0) {
        $contents = $driver->fileReadLine(
            $handle,
            $driver->stat($pathLogfile)['size']
        );
        if ($contents === false) {
            $contents = "Log file is not readable or does not exist at this moment. File path is "
                . $pathLogfile;
        }
        $driver->fileClose($handle);
    }
		
	?>
</head>
<body>
  <nav class="navbar bg-body-tertiary">
  <div class="container-fluid">
    <span class="navbar-brand mb-0 h1">Magento Log Viewer</span>
  </div>
  </nav>
  <br>
<div class="container">
  <div class="row">
      <div class="card">
        <div class="card-body">
         <table>
          <form class="row g-3" method="post">
           <tr>
             <td>
                <select class="form-select" aria-label="Select Log File" name="log_file">
                  <?php foreach (new DirectoryIterator($directoryList->getPath('log')) as $file) {
                    if ($file->isFile()) {
                       ?>
                  <option 
                    value="<?php echo $file->getFilename(); ?>" 
                    <?php 
                    if(isset($_POST['log_file']) && $_POST['log_file'] == $file->getFilename()) 
                      { echo "selected"; } ?>
                    >
                    <?php echo $file->getFilename();?>
                    </option>
                  <?php 
                    }
                  } ?>
                </select>
             </td>
             <td>&nbsp;
               <input class="btn btn-primary" type="submit" value="View" name="view">
             </td>
           </tr>
         </form>
         </table>
        </div>
      </div>
  </div>
  <br>
	<div class="row">
    <div class="alert scroll" id="logs" style="color: green;background-color: black;" >
        <?php echo nl2br($contents); ?>
    </div>
  </div>

<?php include 'footer.php'; ?>
<script type="text/javascript">
var objDiv = document.getElementById("logs");
objDiv.scrollTop = objDiv.scrollHeight;
</script>
</body>
</html>