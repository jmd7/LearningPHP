<!DOCTYPE html>
<html><pre>
<?php
	class Entree {
		private $name;
		protected $ingredients = array();

		public function getName() {
			return $this->name;
		}

		public function __construct($name, $ingredients) {
			if (!is_array($ingredients)) {
				throw new Exception("$ingredients must be an array.");
			}
			$this->name = $name;
			$this->ingredients = $ingredients;
		}

		public function hasIngredients($ingredient) {
			return in_array($ingredient, $this->ingredients);
		}
	}

	class EntreeSub extends Entree {
		public function __construct($name, $ingredients) {
			parent::__construct($name, $ingredients);

			foreach ($ingredients as $i) {
				if (!$i instanceof Ingredient) {
					throw new Exception("$ingredients should only contain Ingredient instances.");
				}
			}

			print "Class EntreeSub initialized: ".$this->getID()."\n";
		}

		public function addIngredient($ingredient) {
			if (!$ingredient instanceof Ingredient) {
				throw new Exception("$ingredient should be an Ingredient instance.");
			}
			$this->ingredients[] = $ingredient;
			print "Added ingredient ".$ingredient->getID()." to EntreeSub instance ".$this->getName().".\n";
		}

		public function getID() {
			$id = "EntreeSub ".$this->getName()." [";

			foreach ($this->ingredients as $i) {
				$names[] = $i->getName();
			}
			return $id.implode("|", $names)."]"; 
		}

		public function getTotalCost() {
			$total = 0;
			foreach ($this->ingredients as $i) {
				$total += $i->getCost();
			}
			return $total;
		}
	}

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

		public function getID() {
			return "Ingredient ".$this->name." [".$this->cost."]";
		}
	}

	$ing1 = new Ingredient("Ingredient 1", 101);
	$ing2 = new Ingredient("ingredient 2", 202);
	$ing3 = new Ingredient("Ingredient 3", 303);
	$ing4 = new Ingredient("ingredient 4", 401);
	$ing5 = new Ingredient("Ingredient 5", 502);
	$ing6 = new Ingredient("ingredient 6", 603);

	function out_ingredient($ing) {
		print $ing->getName()." costs ".$ing->getCost()."\n";
	}

	function out_entreesub($e) {
		print $e->getID()." overall cost ".$e->getTotalCost()."\n";
	}

	$es = new EntreeSub("Entree+", [$ing1, $ing2, $ing3]);

	out_entreesub($es);

	$es->addIngredient($ing4);
	out_entreesub($es);
	$es->addIngredient($ing5);
	out_entreesub($es);
	$es->addIngredient($ing6);
	out_entreesub($es);

?>
</pre></html>