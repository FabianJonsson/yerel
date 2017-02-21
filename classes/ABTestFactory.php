<?php

class ABTestFactory {

	private $A;
	private $B;

	public function __construct() {
	}

	public function defineA($contents) {
		$this->A = $contents;
	}

	public function defineB($contents) {
		$this->B = $contents;
	}

	public function getInstance() {
		if(round(rand(0,1)) == 1) {
			return $this->A;
		} else {
			return $this->B;
		}
	}

}

?>