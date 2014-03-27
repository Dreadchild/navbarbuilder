<?php
  require('src/builder.php');

  $builder = new Builder();
  $html = $builder->slurp($_REQUEST['storefront-url']);
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
      <div class="col-sm-9">
        <h2>HTML</h2>
        <form>
          <div class="form-group">
            <textarea rows="10" style="font-family:monospace;" class="form-control"><?php echo htmlspecialchars($html); ?></textarea>
          </div>
        </form>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-9">
        <h2>CSS</h2>
        <form>
          <div class="form-group">
            <textarea rows="10" style="font-family:monospace;" class="form-control"><?php include('lib/default.css'); ?></textarea>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
