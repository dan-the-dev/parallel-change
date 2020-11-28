<?php
declare(strict_types=1);

namespace ParallelChange;

class ShoppingCart {

	// The goal is to remove this field, replacing it with
	private $prices = [];

	public function add(int $price): void {
		array_push($this->prices, $price);
	}

	public function numberOfProducts(): int {
		return count($this->prices);
	}

	public function totalPrice(): int {
		return array_sum($this->prices);
	}

	public function hasDiscount(): bool {
		foreach($this->prices as $price) {
			if ($price >= 100) {
				return true;
			}
		}
		return false;
	}
}