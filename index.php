<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<?  require_once 'php/move_json_to_DB.php'; ?>
	<br>
	<form action="php/find_str.php" method="POST">
		<input type="text" name="str_in_comment" placeholder="Запись из комментария">
		<button class="btn_find" type="submit">Найти</button>
	</form>

</body>
</html>