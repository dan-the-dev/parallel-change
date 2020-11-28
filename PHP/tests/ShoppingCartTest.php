<?php
declare(strict_types=1);

use ParallelChange\ShoppingCart;

class ShoppingCartTest extends PHPUnit_Framework_TestCase {
	public function testShoppingCartMayHaveJustOneItem() {
		$shoppingCart = new ShoppingCart();
		$shoppingCart->add(10);

		$this->assertSame(1, $shoppingCart->getNumberOfProducts());
	}

	public function testShoppingCartHasTotalPriceEqualToTotalPriceOfItsContents() {
		$shoppingCart = new ShoppingCart();
		$shoppingCart->add(10);

		$this->assertSame(10, $shoppingCart->calculateTotalPrice());
	}

	public function testShoppingCartHasDiscountWhenContainsAtLeastOnePremiumItem() {
		$shoppingCart = new ShoppingCart();
		$shoppingCart->add(100);

		$this->assertTrue($shoppingCart->hasDiscount());
	}

	public function testShoppingCartDoesNotHaveDiscountWhenAllItemsAreCheap() {
		$shoppingCart = new ShoppingCart();
		$shoppingCart->add(10);

		$this->assertFalse($shoppingCart->hasDiscount());
	}

	// new tests for Parallel change to add "more items in the cart" functionality

	public function testShoppingCartMayHaveMoreThanOneItem() {
		$shoppingCart = new ShoppingCart();
		$shoppingCart->addItem(10);
		$shoppingCart->addItem(20);

		$this->assertSame(2, $shoppingCart->numberOfProducts());
	}

	public function testShoppingCartHasTotalPriceEqualToTotalPriceOfItsItems() {
		$shoppingCart = new ShoppingCart();
		$shoppingCart->addItem(10);
		$shoppingCart->addItem(20);

		$this->assertSame(30, $shoppingCart->totalPrice());
	}

	public function testShoppingCartHasDiscountWhenAtLeastOneItemIsPremium() {
		$shoppingCart = new ShoppingCart();
		$shoppingCart->addItem(100);
		$shoppingCart->addItem(20);

		$this->assertTrue($shoppingCart->hasTheDiscount());
	}

	public function testShoppingCartDoesNotHaveDiscountWhenNoPreiumItemInIt() {
		$shoppingCart = new ShoppingCart();
		$shoppingCart->add(10);
		$shoppingCart->add(20);

		$this->assertFalse($shoppingCart->hasTheDiscount());
	}
}
