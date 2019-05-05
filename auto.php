<!--You have add this form-->
<form action="auto.php" method="post">
	<input type="text" name="name" placeholder="name">
	<input type="text" name="surname" placeholder="surname">
	<input type="password" name="pass" placeholder="password">
	<input type="submit" name="sub" value="click!">
</form>

<!--PHP SCRIPT--->
<?php 
require_once "dataBase/db.php";

function auto() {
	if(isset($_POST['sub'])) {
		$name = $_POST['name'];
		$surname = $_POST['surname'];
		$pass = $_POST['pass'];
		
		$name = trim($name);
		$surname = trim($surname);
		$pass = trim($pass);
		
		$name = htmlspecialchars($name);		
		if(preg_match("^[а-яА-ЯёЁa-zA-Z0-9]+$", $name)) {
			if(preg_match("^[а-яА-ЯёЁa-zA-Z0-9]+$", $surname)) {
				$sqli = mysqli_query($mysql, "SELECT * FROM `sign` WHERE `name` = '$name' AND `password` = '$pass' ");
				$sql = mysqli_num_rows($sqli);
				$q = mysqli_fetch_array($sql);
				if(!empty($q)) {
					setcookie("Name",$name, time()+3600);
					echo 'Hello ' . $_COOKIE['name'];
					exit();
				} else {
					echo 'sorry man:(';
					exit();
				}
			}
		}
}


?>

