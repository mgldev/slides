<!doctype html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Slides</title>
	<style type="text/css">
		input[type=submit] {
			font-size:80px;
			color:white;
			background: blue;
			display: black;
			width:100px;
			height:100px;
		}
	</style>
</head>

<body>

<?php if ($won) : ?>
<h3>Congrats, you have won!</h3>
<?php endif; ?>

<table>
	<?php foreach ($board->getCells() as $y => $cells) : ?>
	<tr>
		<?php foreach ($cells as $x => $cell) : ?>
		<?php $slide = $cell->getContent() ?>
		<?php $coordinates = $y . ',' . $x; ?>
			<td>
				<form method="post">
					<input type="hidden" name="position" value="<?php echo $coordinates ?>" />
					<input type="submit" name="submit" value="<?php echo $slide ?>" />
				</form>
			</td>
		<?php endforeach; ?>
	</tr>
	<?php endforeach ?>
</table>

</body>
</html>