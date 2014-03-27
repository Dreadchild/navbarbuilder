<?php

  require_once(dirname(dirname(__FILE__))."/src/builder.php");

  class BuilderTest extends PHPUnit_Framework_TestCase
  {
    public function setup()
    {
      $this->builder = new Builder(new FakeNavCurl("hellow world"));
      $this->spy = new SpyNavCurl();
    }

    public function testSlurp()
    {
      $this->assertEquals("hellow world", $this->builder->slurp("something"));
    }

    public function testSlurpWithDifferentFakeNavCurl()
    {
      $this->builder = new Builder(new FakeNavCurl("bye mom"));
      $this->assertEquals("bye mom", $this->builder->slurp("something"));
    }

    public function testSlupWithCurlWithNoUrl()
    {
      $builder = new Builder($this->spy);
      $result = $builder->slurp();
      $this->assertFalse($this->spy->called);
      $this->assertFalse($result);
    }

    public function testSlupWithCurlWithUrl()
    {
      $builder = new Builder($this->spy);
      $builder->slurp("http://www.google.com");
      $this->assertEquals("http://www.google.com", $this->spy->calledWith);
    }

    public function testSlurpWithCurlWithAnotherUrl()
    {
      $builder = new Builder($this->spy);
      $builder->slurp("http://www.example.com");
      $this->assertEquals("http://www.example.com", $this->spy->calledWith);
    }

    public function testExtractNavHTML()
    {
      $this->builder = new Builder(new FakeNavCurl());
      $html = '<html><div id="pch3_top"><div></div><div></div><div></div><div id="pch3_middle"><h1>Navalicious</h1></div></div></html>';
      $this->assertEquals('<div id="pch3_middle"><h1>Navalicious</h1></div>', $this->builder->extractNav($html));
    }

    public function testExtractNavWithDifferentHTML()
    {
      $this->builder = new Builder(new FakeNavCurl());
      $html = '<html><div id="pch3_top"><div></div><div></div><div></div><div><blink>Blinkilicious</blink></div></div></html>';
      $this->assertEquals('<div><blink>Blinkilicious</blink></div>', $this->builder->extractNav($html));
    }

    // public function testBuildCreatesTheCorrectHTML(){
    //   $this->builder = new Builder(new FakeNavCurl('<html><div id="pch3_middle"><blink>Blinkilicious</blink></div></html>'));
    //   $this->assertEquals('<div id="pch3_middle"><blink>Blinkilicious</blink></div>', $this->builder->build("http://shop.example.org"));
    // }

    public function testBuildCreatesTheMoreCorrectHTML(){
      $this->builder = new Builder(new FakeNavCurl( '<html><div id="pch3_top"><div></div><div></div><div></div><div style="font-face: comic-sans;"><h1>Navalicious</h1></div></div></html>'));
      $this->assertEquals('<div style="font-face: comic-sans;"><h1>Navalicious</h1></div>', $this->builder->build("http://shop.example.org"));
    }

    public function testBuildUsesTheCorrectLocation(){
      $spy = new SpyNavCurl();
      $this->builder = new Builder($spy);
      $this->builder->build("http://store.example.net");
      $this->assertEquals("http://store.example.net", $spy->calledWith);
    }

    public function testBuildUsesADifferentButAlsoCorrectLocation(){
      $spy = new SpyNavCurl();
      $this->builder = new Builder($spy);
      $this->builder->build("http://shop.example.com");
      $this->assertEquals("http://shop.example.com", $spy->calledWith);
    }
  }

  /**
  *
  */
  class SpyNavCurl
  {
    public $called = false;
    public $calledWith = null;

    public function slurp($url=false)
    {
      $this->calledWith = $url;
      $this->called = true;
      return '<html></html>';
    }
  }

  class FakeNavCurl
  {
    private $slurp_return;

    function __construct($slurp_return=false) {
      $this->slurp_return = $slurp_return;
    }

    public function slurp($url=false)
    {
      return $this->slurp_return;
    }
  }
?>
