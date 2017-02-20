<?php

class TestFactory {

	private function findAllTestFiles() {
	}

	private function runTestsInFile($f) {
	}

	private function displayResults($results) {

		foreach($results as $result) {
		}

	}

	public function __construct() {
	}

	public function runAllTests() {

		$files = $this->findAllTestFiles();

		$testResults = array();
		foreach($files as $file) {
			$testResults[] = $this->runTestsInFile($file);
		}

		$this->displayResults($testRestults);

	}

	public function EXPECT_TRUE($statement, $errorMessage) {
	}

	public function EXPECT_FALSE($statement, $errorMessage) {
	}

	public function EXPECT_EQ($a, $b, $errorMessage) {
	}

	public function EXPECT_NE($a, $b, $errorMessage) {
	}

}

?>