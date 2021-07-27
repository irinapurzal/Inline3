<? 
	require_once 'connection.php'; 


	$str_in_comment = $_POST["str_in_comment"];
	echo"Строка обработки: ";
	echo strlen($str_in_comment);
	$str_in_comment = htmlentities(htmlspecialchars(strip_tags(stripslashes($str_in_comment))));
	$str_in_comment = trim($str_in_comment);

	if (strlen($str_in_comment)<3){
		echo"Строка менее 3х символов!";
		echo strlen($str_in_comment);

	}
	else
	{
		echo $str_in_comment;
		$query = "SELECT b.title, c.body FROM comments as c inner join blog as b on c.postId = b.id where c.body like '%$str_in_comment%' ";
		$result = mysqli_query($link,"$query") or die("Ошибка запроса " . mysqli_error($link)); 
	    $kolvorows = mysqli_num_rows($result); 
	    if ($kolvorows !== 0){ 
			for ($i = 0; $i < $kolvorows; ++$i) {
		     	$row = mysqli_fetch_assoc($result);
		    	?>
				<tr>
					<br>
					<td><?php print_r($row['title']); ?></td> <br>
					<td><?php print_r($row['body']); ?></td> <br> <br>
					
				</tr>
				<?
			}
		}
	}
	mysqli_close($link);
?>