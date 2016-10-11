<?php
	namespace rg4;

	class Ingredient {
		private $name;
		private $cost;

		public function __construct($name, $cost) {
			$this->name = $name;
			$this->cost = $cost;

			print "Class (rg4)Ingredient initialized with Name $name and Cost $cost.\n";
		}

		public function setName($name) {
			print $this->getID().": Name changed from [".$this->name;
			$this->name = $name;
			print "] to [".$this->name."]\n";
		}

		public function getName() {
			return $this->name;
		}

		public function setCost($cost) {
			print $this->getID().": Cost changed from [".$this->cost;
			$this->cost = $cost;
			print "] to [".$this->cost."]\n";
		}

		public function getCost() {
			return $this->cost;
		}

		public function getID() {
			return "(rg4)Ingredient ".$this->name." [".$this->cost."]";
		}
	}
?>
