<?php

class Cart {

	private $items;
	private $iterator;

	public function __construct() {
		$this->items = array();
		$this->iterator = 0;
	}

	public function addItem($item) {
		if($item instanceof Item) {
			$this->items[] = $item;
			return true;
		} else {
			return false;
		}
	}

	public function numItems() {
		return count($this->items);
	}

	public function hasNext() {
		if($this->iterator < $this->numItems()) {
			return true;
		} else {
			return false;
		}
	}

	public function next() {
		$this->iterator++;
		return $this->items[$this->iterator-1];
	}

	public function rewind() {
		$this->iterator = 0;
	}

	public function removeItem($itemID) {
		$oldNum = count($this->items);
		array_splice($this->items, $itemID, 1);
		if(count($this->items) != $oldNum) {
			return true;
		} else {
			return false;
		}
	}

}

?>