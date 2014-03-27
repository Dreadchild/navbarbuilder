<?php
  require('nav_curl.php');
  require('simple_html_dom.php');

  class Builder
  {
    private $curl;
    function __construct($curl=false)
    {
      $this->curl = $curl ? $curl : new NavCurl();
    }

    public function build($url)
    {
      return $this->extractNav($this->slurp($url));
    }

    public function extractNav($html='')
    {
      $html = str_get_html($html);
      $parent = $html->find('div[id=pch3_top]', 0);
      if($parent == null) { return ''; }
      return "".$parent->children(3);
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
