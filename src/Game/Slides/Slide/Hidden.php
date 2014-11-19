<?php

namespace Game\Slides\Slide;

use Game\Slides\Slide;

/**
 * Created by PhpStorm.
 * User: michael
 * Date: 19/11/14
 * Time: 10:04
 */
class Hidden extends Slide {

	protected $visible = false;

	public function __construct($face) {

		parent::__construct($face);
	}

	public function setVisible($value = true) {

		$this->visible = $value;
		return $this;
	}

	public function isVisible() {

		return $this->visible;
	}

	public function getFace() {

		$retval = $this->face;

		if (!$this->isVisible()) {
			$retval = '';
		}

		return $retval;
	}
}