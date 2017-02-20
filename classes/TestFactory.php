<?php

class PassedTest {
	public function __construct() {
	}

	public function show() {
		print "Passed<br>\n";
	}
}

class FailedTest {

	private $msg;

	public function __construct($msg) {
		$this->msg = $msg;
	}

	public function show() {
		print "Failed with error message: ".$this->msg."<br>\n";
	}
}

class TestFactory {

	private $output;

	private function findAllTestFiles() {

		$output = array();

		$files = array_diff(scandir('classes/'), array('.', '..'));

		foreach($files as $file) {
			if(substr($file,0,5)=="tests") {
				$output[] = $file;
			}
		}

		return $output;

	}

	private function runTestsInFile($file) {
		include $file;
	}

	private function displayResults() {
		if(count($this->testResults) >= 1) {
			foreach($this->testResults as $result) {
				$result->show();
			}
		}
	}

	public function __construct() {
		$GLOBALS['TEST_SUITE'] = $this;
	}

	public function runAllTests() {

		$files = $this->findAllTestFiles();

		if(count($files) >= 1) {
			foreach($files as $file) {
				$this->runTestsInFile($file);
			}
		}

		$this->displayResults();

	}

	public function EXPECT_TRUE($statement, $errorMessage) {
		if($statement) {
			$this->testResults[] = new PassedTest();
		} else {
			$this->testResults[] = new FailedTest($errorMessage);
		}
	}

	public function EXPECT_FALSE($statement, $errorMessage) {
		if(!$statement) {
			$this->testResults[] = new PassedTest();
		} else {
			$this->testResults[] = new FailedTest($errorMessage);
		}
	}

	public function EXPECT_EQ($a, $b, $errorMessage) {
		if($a == $b) {
			$this->testResults[] = new PassedTest();
		} else {
			$this->testResults[] = new FailedTest($errorMessage);
		}
	}

	public function EXPECT_NE($a, $b, $errorMessage) {
		if($a != $b) {
			$this->testResults[] = new PassedTest();
		} else {
			$this->testResults[] = new FailedTest($errorMessage);
		}
	}

}

?>