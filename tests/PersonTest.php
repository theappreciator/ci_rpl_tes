<?php

require_once 'lib/person.php';

class PersonTest extends PHPUnit_Framework_TestCase
{
	public $personInstance;
	
	public function setUp() {
		$this->personInstance = new Person();
	}
	
	public function testIfNameWorks() {
		echo "Testing the name functions of Person";
		
		echo "Setting name to Jon Snow";
		$this->personInstance->setName("Jon", "Snow");
		
		$this->assertEquals("Jon Snow", $this->personInstance->getName());
		echo "Finished asserting that name was Jon Snow";
	}
	
	public function testAddChild() {
		echo "Testing the child functions of a Person";
		
		$this->assertEquals(0, count($this->personInstance->getChildren()));
		echo "Finished asserting that the initial child count of Person is 0";
		
		echo "Adding a test child";
		$child = new Person("Test", "Child");
		$this->personInstance->addChild($child);
		
		$this->assertEquals(1, count($this->personInstance->getChildren()));
		echo "Finished asserting that the child count is now 1";
	}	
}