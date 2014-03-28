<?php

  if (isset($_REQUEST['storefront-url'])) {
    $storefront_url = htmlspecialchars($_REQUEST['storefront-url'])
  }else{
    $storefront_url = "";
  }

?>
<!DOCTYPE html>
<html>
  <head>
    <?php include_once("header.php"); ?>
    <title>Generate Your Navbar</title>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="page-header">
            <h1>Nav Builder</h1>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-8">
          <form action="run.php" method="POST">
            <div class="form-group">
              <label for="storefront-url">Storefront URL</label>
              <input type="text" value="<?php echo $storefront_url ?>" name="storefront-url" placeholder="shop.example.com" id="storefront-url" class="form-control input-lg">
            </div>

            <div class="form-group">
              <input type="submit" value="Build Navigation" class="btn btn-primary btn-lg">
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
