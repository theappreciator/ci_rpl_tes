<?php

require_once 'lib/person.php';

use PHPUnit\Framework\TestCase;

class PersonTest extends TestCase
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
		
		$children = $this->personInstance->getChildren();
		$testChild = $children[0];
		
		$this->assertEquals("Test Child", $testChild->getName());
	}	
}