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
            <textarea rows="20" style="font-family:monospace;" class="form-control"><?php include('lib/default.css'); ?><?php echo htmlspecialchars($html); ?><script type="text/javascript" language="javascript" src="http://img2.wsimg.com/pc/js/6/pl_js_20130201.min.js"></script></textarea>
          </div>
        </form>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <h2>Preview</h2>
        <?php include('lib/default.css'); ?>
        <div id="pch3">
          <?php echo $html; ?>
        </div>
        <script type="text/javascript" language="javascript" src="http://img2.wsimg.com/pc/js/6/pl_js_20130201.min.js"></script>
      </div>
    </div>
  </div>
</body>
</html>
