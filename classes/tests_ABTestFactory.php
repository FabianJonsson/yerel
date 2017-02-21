<?php

require_once("ABTestFactory.php");

$f = $GLOBALS['TEST_SUITE'];

$f->addNewSection("ABTestFactory Unit Tests");

$ab = new ABTestFactory();

$ab->defineA("Variant A");
$ab->defineB("Variant B");

$result = 0;
for($i=0; $i < 1000; $i++) {
	if($ab->getInstance() == "Variant A") {
		$result++;
	}
}

$f->EXPECT_TRUE($result > 400, "ABTestFactory produced unlikely distribution.");
$f->EXPECT_TRUE($result < 600, "ABTestFactory produced unlikely distribution.");

?>