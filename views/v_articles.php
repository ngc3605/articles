<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>All articles</title>
</head>
<body>
	<?php foreach ($articlesList as $item): ?>
	<h1><?=$item['title']?></h1>
	<p><?=$item['content']?></p>
	<p><?=$item['author']?></p>
	<p><?=$item['db_create']?></p>
	<?php endforeach; ?>

</body>
</html>
