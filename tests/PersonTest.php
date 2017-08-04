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
	
	public function testAddChild() {
		$child = new Person("Test", "Child");
		
		$this->assertEquals(0, count($this->personInstance->getChildren()));
		
		$this->personInstance->addChild($child);
		
		$this->assertEquals(1, count($this->personInstance->getChildren()));
	}	
}