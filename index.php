<!DOCTYPE html>
<html>
  <head>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
    <!-- Latest compiled and minified JavaScript -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
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
          <form action="builder.php" method="POST">
            <div class="form-group">
              <label for="storefront-url">Storefront URL</label>
              <input type="text" name="storefront-url" placeholder="shop.example.com" id="storefront-url" class="form-control input-lg">
            </div>
            <div class="form-group">
              <label for="rewrite-links" class="checkbox">
                <input type="hidden" name="rewrite-links" value="0">
                <input type="checkbox" name="rewrite-links" value="1" id="rewrite-links" class="">
                Rewrite Links
              </label>
            </div>

            <div class="form-group">
              <input type="submit" value="Snag" class="btn btn-primary btn-lg">
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
