<?php

class PassedTest {
	public function __construct() {
	}

	public function show() {
		print "<tr><td class=\"passed\">&nbsp;</td><td></td></tr>\n";
	}
}

class FailedTest {

	private $msg;

	public function __construct($msg) {
		$this->msg = $msg;
	}

	public function show() {
		print "<tr><td class=\"failed\">&nbsp;</td><td>".$this->msg."</td></tr>\n";
	}
}

class TestSection {
	private $title;

	public function __construct($title) {
		$this->title = $title;
	}

	public function show() {
		print "<tr><th colspan=\"2\">".$this->title."</th></tr>\n";
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

		print "<LINK type=\"text/css\" rel=\"stylesheet\" href=\"css/TestFactory.css\">\n";

		print "<table>\n";

		if(count($this->testResults) >= 1) {
			foreach($this->testResults as $result) {
				$result->show();
			}
		}

		print "</table>\n";

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

	public function addNewSection($title) {
		$this->testResults[] = new TestSection($title);
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