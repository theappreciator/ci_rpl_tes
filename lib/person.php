<?php

	class Person {
		private $firstName;
		private $lastName;
		
		private $children;
		
		public function __construct($firstName=null, $lastName=null) {
			if ($firstName == null) {
				$firstName = "DEFAULT";
			}
			if ($lastName == null) {
				$lastName = "DEFAULT";
			}
			
			$this->setName($firstName, $lastName);
			
			$children = [];
		}
		
		public function getFirstName() {
			return $this->firstName;
		}
		
		public function setFirstName($firstName) {
			$this->firstName = $firstName;
		}
		
		public function getLastName() {
			return $this->lastName;
		}
		
		public function setLastName($lastName) {
			$this->lastName = $lastName;
		}
		
		public function getName() {
			return $this->firstName . ' ' . $this->lastName;
		}
		
		public function setName($firstName, $lastName) {
			$this->setFirstName($firstName);
			$this->setLastName($lastName);
		}
		
		public function addChild($child) {
			$this->children[] = $child;
		}
		
		public function getChildren() {
			return $this->children;
		}
	
	}