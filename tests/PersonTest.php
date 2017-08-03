<?php

require_once 'lib/person.php';

class PersonTest extends PHPUnit_Framework_TestCase
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