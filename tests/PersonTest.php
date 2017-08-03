<?php

require 'lib/person.php';

class PersonTest extends PHPUnit_FrameworkTestCase
{
	public $personInstance;
	
	public function setUp() {
		$this->personInstance = new Person();
	}
	
	public function testIfNameWorks() {
		$this->personInstance->setName("Jon", "Snow");
		
		$this->assertEquals("Jon Snow", $this->personInstance->getName());
	}
}