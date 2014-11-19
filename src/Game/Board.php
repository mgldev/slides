<?php

namespace Game;
use Game\Board\Cell;

class Board {

	protected $cells = array();

	public function __construct($width, $height) {

		$this->build($width, $height);
	}

	public function build($width, $height) {

		for ($y = 0; $y < $height; $y++) {
			for ($x = 0; $x < $width; $x++) {
				$this->cells[$y][$x] = new Cell();
			}
		}
	}

	public function getCells() {

		return $this->cells;
	}

	/**
	 * @param $y
	 * @param $x
	 * @return	Cell|null
	 */
	public function getCell($y, $x) {

		$retval = null;

		if (isset($this->cells[$y][$x])) {
			$retval = $this->cells[$y][$x];
		}

		return $retval;
	}
}