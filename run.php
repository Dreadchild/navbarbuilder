<?php
  require('src/builder.php');

  if ($_REQUEST['storefront-url'] == null || $_REQUEST['storefront-url'] == "") {
    header('Location: index.php');
    die();
  }

  $builder = new Builder();
  $html    = $builder->build($_REQUEST['storefront-url']);
?>

<!DOCTYPE html>
<html>
<head>
  <?php include_once("header.php"); ?>
  <title>Your Generated Navbar Code</title>
</head>
<body>
  <div class="container">
    <?php if ($html == null){ ?>
      <div class="row">
        <div class="col-sm-12">
        <h2>Whoops!</h2>
          <div class="alert alert-danger">
            <p>The storefront navigation bar could not be found at the URL you provided. <a href="index.php?storefront-url=<?php echo urlencode($_REQUEST['storefront-url'])?>">Enter a different URL.</a></p>
          </div>
        </div>
      </div>
    <?php }else{ ?>
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
    <hr>
    <div class="row">
      <div class="col-sm-12">
        <div class="well">
          <h2>Using This Navbar</h2>
          <ol>
            <li>Copy the content in the HTML box below.</li>
            <li>Paste the content into your custom HTML page.</li>
          </ol>
        </div>
      </div>
    </div>
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
    <?php } ?>
  </div>
</body>
</html>
