<?php

namespace Game;

use Game\Slides\Board as SlideBoard;

class Slides {

	/**
	 * @var	SlideBoard
	 */
	protected $winningBoard;

	/**
	 * @var	SlideBoard
	 */
	protected $board;

	public function __construct() {

		$this->build();
	}

	public function build() {

		$winningBoardConfig = [
			0 => ['a', 'b', 'c'],
			1 => ['d', 'e', 'f'],
			2 => ['g', 'h', null]
		];

		$winningBoard = new SlideBoard(3, 3);
		$winningBoard->populate($winningBoardConfig);

		$board = clone $winningBoard;
		$board->randomise();

		$this->winningBoard = $winningBoard;
		$this->board = $board;
	}

	public function isComplete() {

		return $this->board == $this->winningBoard;
	}

	public function getBoard() {

		return $this->board;
	}

	public function move($y, $x) {

		$this->getBoard()->move($y, $x);
	}
}