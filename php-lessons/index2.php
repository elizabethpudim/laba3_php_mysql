<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	
<?php 

	echo "<strong>_POST array: </strong> <br>";
	print_r($_POST);
	echo "<br><br><br>";



	
	if(!empty($_POST)){

		$message = "Вам пришло новое письмо \n" 
		. "Имя: ".$_POST['userName']
		. "Email :". $_POST['userEmail']
		. "Сообщение : \n". $_POST['message'];

		$resultMail = mail("elizaveta.pudim@gmail.com", "Сообщение с сайта", $message);
		if($resultMail) {
			echo "Sent";
		} else {
			"Not sent";
		}
	}

 ?>


 <form action="index.php" method="post">
 	<input type="text" name="userName" placeholder="name"><br>
 	<input type="text" name="userEmail" placeholder="email"><br>
	<textarea name="message" id="" cols="30" rows="10" placeholder="Message"></textarea> <br>
	<input type="submit" value="Submit">
</form>






</body>
</html>