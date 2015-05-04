<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="../js/main.js"></script>
<?
	include_once("../connect.php");
	$uore = $_POST["inputUsername"];
	$password = $_POST["inputPassword"];
	$userquery = $mysqli->query("SELECT * FROM User WHERE UPPER(Username) = \"" . strtoupper($uore) . "\" OR UPPER(Email) = \"" . strtoupper($uore) . "\"");
	if ($userquery -> num_rows > 0) {
		$user = $userquery->fetch_assoc();
		$Username = $user["Username"];
		$UserID = $user["UserID"];
		$userPassword = $user["Password"];
		if ($password !== $userPassword) {
			echo "Username/Email and/or Password incorrect.";
		} else {
			echo "<script>Cookies.set('Username', '" . $Username . "'); Cookies.set('UserID', '" . $UserID . "'); window.location = './index.php';</script>";
		}
	} else {
		echo "User with inputed Username/Email does not exist";
	}
?>