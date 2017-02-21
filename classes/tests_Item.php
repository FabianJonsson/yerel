<?php

$f = $GLOBALS['TEST_SUITE'];

$f->addNewSection("Item Class Unit Test");

$i = new Item();

$i->itemId = 1234;
$f->EXPECT_EQ($i->itemId, 1234, "Cannot set/get item ID");
$i->description = "This is a test description";
$f->EXPECT_EQ($i->description, "This is a test description", "Description set/get is not working.");
$i->price = 99;
$f->EXPECT_EQ($i->price, 99, "Price set/get is not working.");
$i->picture = "assets/testpicture.png";
$f->EXPECT_EQ($i->picture, "assets/testpicture.png", "Image set/get is not working.");

?>