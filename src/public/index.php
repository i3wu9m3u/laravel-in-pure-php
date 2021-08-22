<html>
	<head>
	</head>
	<body>
		<?php foreach(["既存" => "edit.php", "Illuminate/Validation" => "edit2.php"] as $h => $path): ?>
		<h2><?= $h ?></h2>
		<form action="<?= $path ?>" method="POST">
			<ul>
				<li>名前:<input type="text" name="name"></li>
			</ul>
			<ul>
				<li>数量:<input type="text" name="amount">
			</ul>
			<ul>
				<li>参考URL:<input type="text" name="ref_url">
			</ul>
			<ul>
				<li><input type="submit" value="登録"></li>
			</ul>
		</form>
	<?php endforeach; ?>
	</body>
</html>
