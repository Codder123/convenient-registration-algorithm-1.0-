<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<!---Enter this strings-->
<form action="index.php" method="post">
	<input type="text" name="name" placeholder="name">
	<input type="text" name="surname" placeholder="surname">
	<input type="password" name="pass" placeholder="password">
	<input type="submit" name="sub" value="click!">
</form>


<!--PHP SCRIPT-->
<?php 

require_once "dataBase/db.php";

function reg() {
	if(isset($_POST['sub'])) {
		$name = $_POST['name'];
		$surname = $_POST['surname'];
		$pass = $_POST['pass'];
		
		$name = trim($name);
		$surname = trim($surname);
		$pass = trim($pass);
		
		$name = htmlspecialchars($name);
		$surname = htmlspecialchars($surname);
		
		
		if(preg_match("^[а-яА-ЯёЁa-zA-Z0-9]+$", $name)) {
			if(preg_match("^[а-яА-ЯёЁa-zA-Z0-9]+$", $surname)) {
				$sql = mysqli_query($mysql, "INSERT INTO `sign` (`id`, `name`, `surname`, `password`) VALUES (NULL, '$name', '$surname', '$pass')");
				setcookie("Name",$name, time()+3600);
				setcookie("Surname", $surname, time()+3600);
				exit();
				echo $_COOKIE['Name'] . '<br>' . $_COOKIE['Surname'];
			}
		} else {
			echo 'sorry man';
		}
	} else {  /* ... */  }
}




?>