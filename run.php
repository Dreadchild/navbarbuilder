<?php
  require('src/builder.php');
  $html = (new Builder())->build($_REQUEST['storefront-url']);
?>

<!DOCTYPE html>
<html>
<head>
  <?php include_once("header.php"); ?>
  <title>Your HTML</title>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <h2>HTML</h2>
        <form>
          <div class="form-group">
            <textarea rows="20" style="font-family:monospace;" class="form-control"><?php include('lib/default.css.inc'); ?><?php echo htmlspecialchars($html); ?><?php include('lib/default.js.inc'); ?></textarea>
          </div>
        </form>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <h2>Preview</h2>
        <?php include('lib/default.css.inc'); ?>
        <div id="pch3">
          <?php echo $html; ?>
        </div>
        <?php include('lib/default.js.inc'); ?>
      </div>
    </div>
  </div>
</body>
</html>
