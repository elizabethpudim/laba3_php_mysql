<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	
<?php 
	//Переменные

	$string = "<h2>Это строчная переменная</h2>";
	$integer = 50;
	$boolean = true;

	$null = null;

	$monday = "Понедельник";
	$tuesday = "Вторник";
	$wedne = "Среда";
	$thurs = "Четверг";

	echo "Дни недели: $monday, $tuesday, $wedne. <br>";
	echo "Дни недели: {$monday}X, {$tuesday}Y, $wedne. <br>";
	echo '$monday';//внутри одинарных кавычек не обр
?>

<?php 
	//POST отправка данных.
	echo "<strong>_POST array: </strong> <br>";
	print_r($_POST);
	echo "<br><br><br>";

 ?>

<!-- <form action="index.php" method="post">
	<input type="text" name="country"><br>
	<input type="text" name="product"><br>
	<input type="text" name="brand"><br>
	<input type="text" name="model"><br>
	<input type="text" name="color"><br>
	<input type="submit" value="Send Form">
	
</form> -->

<form action="index.php" method="post">
	<input type="text" name="login" placeholder="login"><br>
	<input type="password" name="password" placeholder="password"><br>
	<input type="submit" value="Send Form">
</form>

<?php 

	$userName = 'mike';
	$userPass = '12345';

	if(!empty($_POST)){
		if($_POST['login'] == $userName){
			echo "Login is correct...<br>";
			echo "Cheking pass....<br>";

			if($_POST['password'] == $userPass){
				echo "Pass is correct <br>";
				echo "HI :)";
			}

		} else{
			echo "Login is incorrect. <br>";
		}
	}

 ?>

</body>
</html>