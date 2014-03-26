<?php

  require_once(dirname(dirname(__FILE__))."/src/builder.php");

  class BuilderTest extends PHPUnit_Framework_TestCase
  {
    public function setup()
    {
      $this->builder = new Builder(new FakeNavCurl("hellow world"));
      $this->spy = new CurlWrapperSpy();
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
  }

  /**
  *
  */
  class CurlWrapperSpy
  {
    public $called = false;
    public $calledWith = null;

    public function slurp($url=false)
    {
      $this->calledWith = $url;
      $this->called = true;
    }
  }

  class FakeNavCurl
  {
    private $slurp_return;

    function __construct($slurp_return) {
      $this->slurp_return = $slurp_return;
    }

    public function slurp($url=false)
    {
      return $this->slurp_return;
    }
  }
?>
