<?php

namespace Game\Board;

class Cell {

	protected $content = null;

	public function setContent($content) {

		$this->content = $content;
		return $this;
	}

	public function getContent() {

		return $this->content;
	}
}