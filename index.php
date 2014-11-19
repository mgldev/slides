<?php

require_once 'vendor/autoload.php';

use Game\Slides as SlideGame;

$game = new SlideGame();
$game->build();

session_start();

$game = null;

if (!isset($_SESSION['game'])) {
	$game = new SlideGame();
	$_SESSION['game'] = serialize($game);
} else {
	$game = unserialize($_SESSION['game']);
}

$won = false;

if (isset($_POST['position'])) {

	list($y, $x) = explode(',', $_POST['position']);
	$game->move($y, $x);
	$_SESSION['game'] = serialize($game);
	$won = $game->isComplete();

}

$board = $game->getBoard();

require_once 'view.php';