<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<!-- коннект с бд -->
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>
<?php 
// Initialize variables to null.
$nameError ="";
$emailError ="";
$usernameError = "";
$passwordError = "";
$confirm_passwordError = "";

// On submitting form below function will execute.
if(isset($_POST['submit'])){
	//name
	if (empty($_POST["name"])) {
	$nameError = "Name is required";
	} 
	else {
		$name = test_input($_POST["name"]);
		// check name only contains latin letters, spaces and ' or -
		if (!preg_match("/[a-zA-Z][^#&<>\"~;$^%{}?]{1,20}$/",$name)) {
		$nameError = "Only latin letters and white space allowed";
		}

	}
	//email
	if (empty($_POST["email"])) {
	$emailError = "Email is required";
	} 
	else{
		$email = test_input($_POST["email"]);
		// check if e-mail address syntax is valid or not
		if (!preg_match("/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/",$email)) {
		$emailError = "Invalid email format";
		}
	}
	//username
	if (empty($_POST["username"])) {
	$usernameError = "Username is empty";
	}
	else{
		$username = test_input($_POST["username"]);
		if (!preg_match("/[a-zA-Z0-9][^#&<>\"~;$^%{}?]{1,20}$/",$username)){
		$usernameError = "Invalid username format";	
		}
	}
	//password
	if (empty($_POST["password"])) {
	$passwordError = "password is empty";
	}
	else{
		$password = test_input($_POST["password"]);
		
	}	
	//confirm_password
	if (empty($_POST["confirm_password"])) {
	$confirm_passwordError = "confirm_password is empty";
	}
	else{
		$confirm_password = test_input($_POST["confirm_password"]);
		if (!($confirm_password == $password)){
			$confirm_passwordError = "Passwords don't match";
		}
		
	}
	$correctform = "Correct";	

	$sql = "INSERT INTO Users (fullName, email, username, password)
	VALUES ('".$name."', '".$email."', '".$username."', '".$password."')";

	if ($conn->query($sql) === TRUE) {
    echo "New record created successfully <br>";
	} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();

	//ALTER TABLE Users
	//ADD BDay varchar(255);
	//UPDATE Users
	//SET BDay = '21/11/1997'
	//SELECT * FROM `users` ORDER BY fullName ASC LIMIT 3
	//ALTER TABLE Users
	//ALTER BDay SET DEFAULT '21/11/1997';


}

function test_input($data) {
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}

// When we use the htmlspecialchars() function; then if a user tries to submit the following in a text field:

// <script>location.href('http://www.hacked.com')</script>

// - this would not be executed, because it would be saved as HTML escaped code, like this:

// &lt;script&gt;location.href('http://www.hacked.com')&lt;/script&gt;

// Strip unnecessary characters (extra space, tab, newline) from the user input data (with the PHP trim() function)
// Remove backslashes (\) from the user input data (with the PHP stripslashes() function)

print_r($_POST);

?>
<?php include 'sql_command.php';?> 


	<div class="wrap-form" >
		<h2>Sign Up Here</h2>
		<form class='tooltip' method="post" action="index.php">
			<input type="text" name="name" placeholder="Full Name" >
			<span class="error"> <?php echo $nameError; ?></span>
			<input type="text" name="email" placeholder="Email" >
			<span class="error"> <?php echo $emailError; ?></span>
			<input type="text" name="username" placeholder="Username" >
			<span class="error"> <?php echo $usernameError; ?></span>
			<input type="password" name="password" placeholder="Password" >
			<span class="error"> <?php echo $passwordError; ?></span>
			<input type="password" name="confirm_password" placeholder="Password confirm" >
			<span class="error"> <?php echo $confirm_passwordError; ?></span>
			<input type="submit" name="submit" value="Submit">
			<span class="error"> <?php echo $correctform; ?></span>
		</form>
	</div>


</body>
</html>