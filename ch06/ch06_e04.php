<!DOCTYPE html>
<html><pre>
<?php
	require_once "ch06_e04n.php";
	use rg4\Ingredient;

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