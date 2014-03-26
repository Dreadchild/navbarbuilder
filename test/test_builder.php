<?php

  require_once(dirname(dirname(__FILE__))."/src/builder.php");

  class BuilderTest extends PHPUnit_Framework_TestCase
  {
    public function setup()
    {
      $this->builder = new Builder(new FakeNavCurl("hellow world"));
    }

    public function testSlurp()
    {
      $this->assertEquals($this->builder->slurp(), "hellow world");
    }

    public function testSlupWithCurl()
    {
      $spy = new CurlWrapperSpy();
      $builder = new Builder($spy);
      $builder->slurp();
      $this->assertTrue($spy->called);
    }
  }

  /**
  *
  */
  class CurlWrapperSpy
  {
    public $called = false;

    public function slurp()
    {
      $this->called = true;
    }
  }

  class FakeNavCurl
  {
    private $slurp_return;

    function __construct($slurp_return) {
      $this->slurp_return = $slurp_return;
    }

    public function slurp()
    {
      return $this->slurp_return;
    }
  }
?>
