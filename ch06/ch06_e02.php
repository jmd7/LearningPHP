<!DOCTYPE html>
<html><pre>
<?php
	class Ingredient {
		private $name;
		private $cost;

		public function __construct($name, $cost) {
			$this->name = $name;
			$this->cost = $cost;

			print "Class Ingredient initialized with Name $name and Cost $cost.\n";
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

		protected function getID() {
			return "Instance[".$this->name."|".$this->cost."]";
		}
	}

	$ing1 = new Ingredient("Ingredient 1", 100);
	$ing2 = new Ingredient("ingredient 2", 200);

	function out_ingredient($ing) {
		print $ing->getName()." costs ".$ing->getCost()."\n";
	}

	out_ingredient($ing1);
	out_ingredient($ing2);

	$ing1->setName("Ingredient 1+");
	$ing2->setCost(220);

	out_ingredient($ing1);
	out_ingredient($ing2);

?>
</pre></html>