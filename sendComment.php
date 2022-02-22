<?php include("connect.php");
header("Content-type: text/html; charset=UTF-8");


if(empty($_POST['js'])){ 
	if($_POST['comment'] != '' && $_POST['author'] != ''){

		$author = @iconv("UTF-8", "windows-1251", $_POST['author']);
		$author = addslashes($author);
		$author = htmlspecialchars($author);
		$author = stripslashes($author);		

		$comment = @iconv("UTF-8", "windows-1251", $_POST['comment']);
		$comment = addslashes($comment);
		$comment = htmlspecialchars($comment);
		$comment = stripslashes($comment);

		$date = date("d-m-Y в H:i:s");
		$result = $mysql->query("INSERT INTO `comment` (`author`, `comment`, `date`) VALUES ('$author', '$comment', '$date')");
		if($result == true){
			echo 0;
		}else{
			echo 1;
		}
	}else{
		echo 2;
	}
}


if($_POST['js'] == 'no'){
	if($_POST['comment'] != '' && $_POST['author'] != ''){

		$author = $_POST['author'];
		$author = addslashes($author);
		$author = htmlspecialchars($author);
		$author = stripslashes($author);

		$comment = $_POST['comment'];
		$comment = addslashes($comment);
		$comment = htmlspecialchars($comment);
		$comment = stripslashes($comment);

		$date = date("d-m-Y в H:i:s");
		$result = $mysql->query("INSERT INTO `comment` (`author`, `comment`, `date`) VALUES ('$author', '$comment', '$date')");
		if($result == true){
			echo "Ваше сообшение успешно отправлено";
		}else{
			echo "Сообщение не отправлено. Ошибка базы данных";
		}
	}else{
		echo "Нельзя отправлять пустые сообщения";
	}
}
?>