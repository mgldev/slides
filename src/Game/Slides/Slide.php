<?php

namespace Game\Slides;

class Slide {

	protected $face;

	public function __construct($face) {

		$this->face = $face;
	}

	public function getFace() {

		return $this->face;
	}

	public function __toString() {

		$retval = $this->getFace();
		return $retval;
	}
}