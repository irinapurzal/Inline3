<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<? 
		 require_once 'php/connection.php'; // подключаемся к серверу 
		
		$request = "https://jsonplaceholder.typicode.com/posts";
		$response = file_get_contents($request);
		$results = json_decode($response, TRUE);
		$count_records = 0;
		foreach ($results as $key ){
			$userId = $key["userId"];
			$userId = htmlentities(htmlspecialchars(strip_tags(stripslashes($userId))));
			$id = $key["id"];
			$id = htmlentities(htmlspecialchars(strip_tags(stripslashes($id))));
			$title = $key["title"];
			$title = htmlentities(htmlspecialchars(strip_tags(stripslashes($title))));
			$body = $key["body"];
			$body = htmlentities(htmlspecialchars(strip_tags(stripslashes($body))));
			
			$query = "INSERT INTO blog (userId, id, title, body) VALUES ($userId,$id,'$title','$body')";
	    	$result = mysqli_query($link,"$query") or die("Ошибка запроса " . mysqli_error($link)); 
	    	++$count_records;

		}
	  
	    $request = "https://jsonplaceholder.typicode.com/comments";
		$response = file_get_contents($request);
		$results = json_decode($response, TRUE);
		$count_comments = 0;

		foreach ($results as $key ){			
			$postId = $key["postId"];
			$postId = htmlentities(htmlspecialchars(strip_tags(stripslashes($postId))));
			$id = $key["id"];
			$id = htmlentities(htmlspecialchars(strip_tags(stripslashes($id))));
			$name = $key["name"];
			$name = htmlentities(htmlspecialchars(strip_tags(stripslashes($name))));
			$email = $key["email"];
			$email = htmlentities(htmlspecialchars(strip_tags(stripslashes($email))));
			$body = $key["body"];
			$body = htmlentities(htmlspecialchars(strip_tags(stripslashes($body))));
			
			$query = "INSERT INTO comments (postId, id, name, email,body) VALUES ($postId, $id,'$name','$email','$body')";
	    	$result = mysqli_query($link,"$query") or die("Ошибка запроса " . mysqli_error($link));
	    	++$count_comments; 
		}
		echo "Загружено ".$count_records." записей и ".$count_comments." комментариев";
		
		mysqli_free_result($result);
		mysqli_close($link);
	?>
</body>
</html>