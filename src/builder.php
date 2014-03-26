<?php
  require('nav_curl.php');
  class Builder
  {
    private $curl;
    function __construct($curl=false)
    {
      $this->curl = $curl ? $curl : new NavCurl();
    }

    public function slurp($url=false)
    {
      if (!$url) {
        return false;
      }
      return $this->curl->slurp($url);
    }
  }
?>
