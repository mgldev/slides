<?php

namespace Game\Slides;

use Game\Board as GameBoard;
use Game\Board\Cell;
use Game\Slides\Slide\Hidden as HiddenSlide;
use Game\Slides\Slide;

class Board extends GameBoard {

	public function populate(array $slides) {

		foreach ($slides as $y => $faces) {

			foreach ($faces as $x => $face) {

				$cell = $this->getCell($y, $x);

				$slide = null;

				if (is_null($face)) {
					$slide = new HiddenSlide($face);
				} else {
					$slide = new Slide($face);
				}

				$cell->setContent($slide);
			}
		}
	}

	public function setCell($y, $x, Cell $cell) {

		if (!isset($this->cells[$y][$x])) {
			throw new \Exception('Cell position does not exist');
		}

		$this->cells[$y][$x] = $cell;
		return $this;
	}

	public function randomise() {

		foreach ($this->cells as $index => $row) {
			shuffle($row);
			$this->cells[$index] = $row;
		}

		shuffle($this->cells);
	}

	public function move($y, $x) {

		$y = (int) $y;
		$x = (int) $x;

		$cell = $this->getCell($y, $x);
		$slide = $cell->getContent();

		if ($slide instanceof HiddenSlide) {
			return false;
		}

		$freeSpace = false;

		$posX = null;
		$posY = null;
		$checkCell = null;

		foreach (array('n', 'e', 's', 'w') as $point) {

			$posY = $y;
			$posX = $x;

			switch ($point) {
				case 'n': $posY--;
					break;
				case 'e': $posX++;
					break;
				case 's': $posY++;
					break;
				case 'w': $posX--;
					break;
			}

			$checkCell = $this->getCell($posY, $posX);

			if (!is_null($checkCell) && $checkCell->getContent() instanceof HiddenSlide) {
				$freeSpace = true;
				break;
			}
		}

		if ($freeSpace) {
			$this->setCell($posY, $posX, $cell);
			$this->setCell($y, $x, $checkCell);
		}

		return true;
	}
}