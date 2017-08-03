<?php

	class Person {
		private $firstName = "DEFAULT";
		private $lastName = "DEFAULT";
		
		public function __constrct() {
			
		}
		
		public function __construct($firstName, $lastName) {
			if (isset($firstName) && $firstName != "" &&
			    isset($lastName) && $lastName != "") {
				$this->setName($firstName, $lastName);
			}
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
	
	}