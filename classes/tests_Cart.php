<?php

require_once("Cart.php");
require_once("Item.php");

$f = $GLOBALS['TEST_SUITE'];
$f->addNewSection("Cart unit test");

$c = new Cart();

$f->EXPECT_TRUE(isset($c), "Instantiating cart class.");
$f->EXPECT_TRUE($c->addItem(new Item()), "Adding a valid item to cart.");
$f->EXPECT_FALSE($c->addItem(""), "Adding an invalid item to cart.");
$f->EXPECT_EQ($c->numItems(), 1, "Checking how many items there are in the cart.");
$f->EXPECT_TRUE($c->hasNext(), "Checking that hasNext returns true.");
$item = $c->next();
$f->EXPECT_FALSE($c->hasNext(), "Checking that hasNext returns false when iteration over items is done.");
$c->rewind();
$f->EXPECT_TRUE($c->hasNext(), "Checking that hasNext return true when iterator has been reset.");
$c->addItem(new Item());
$f->EXPECT_EQ($c->numItems(), 2, "Checking how many items there are in the cart.");
$f->EXPECT_TRUE($c->removeItem(1), "Removing one item.");
$f->EXPECT_EQ($c->numItems(), 1, "Checking how many items there are in the cart.");
$f->EXPECT_FALSE($c->removeItem(1), "Removing an item that has already been removed.");
$f->EXPECT_EQ($c->numItems(), 1, "Checking how many items there are in the cart.");
$f->EXPECT_TRUE($c->removeItem(0), "Removing one item.");
$f->EXPECT_EQ($c->numItems(), 0, "Checking how many items there are in the cart.");
$f->EXPECT_FALSE($c->removeItem(0), "Removing one item that has already been removed.");
$f->EXPECT_EQ($c->numItems(), 0, "Checking how many items there are in the cart.");

?>