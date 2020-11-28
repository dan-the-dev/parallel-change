<?php
declare(strict_types=1);

namespace ParallelChange;

class ShoppingCart {
	const PREMIUM_ITEMS_MINIMUM_PRICE = 100;

	private $prices = [];
	private $hasDiscount = false;

	public function add(int $price): void {
		array_push($this->prices, $price);
		$this->checkDiscount();
	}

	public function remove(int $price): void {
		$position = array_search($price, $this->prices);
		unset($this->prices[$position]);
		$this->prices = array_values($this->prices);
		$this->checkDiscount();
	}

	public function numberOfProducts(): int {
		return count($this->prices);
	}

	public function totalPrice(): int {
		return array_sum($this->prices);
	}

	public function hasDiscount(): bool {
		return $this->hasDiscount;
	}

	private function checkDiscount(): void {
		$this->hasDiscount = $this->checkIfAPremiumItemIsInTheCart();
	}

	private function checkIfAPremiumItemIsInTheCart(): bool {
		foreach($this->prices as $price) {
			if ($price >= self::PREMIUM_ITEMS_MINIMUM_PRICE) {
				return true;
			}
		}
		return false;
	}
}