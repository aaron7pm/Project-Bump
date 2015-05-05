<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="../js/main.js"></script>
<?
	include_once("../connect.php");
	$UserID = $_COOKIE["UserID"];
	$username = $_POST["inputUsername"];
	$email = $_POST["inputEmail"];
	$password = $_POST["inputPassword"];
	// $uexists = $mysqli->query("SELECT userExists(\"$username\") AS uexists")->fetch_assoc()["uexists"];
	// $eexists = $mysqli->query("SELECT userExists(\"$email\") AS eexists")->fetch_assoc()["eexists"];
	// if ($uexists == 0 && $eexists == 0) {
	$adduser = "CALL updateUser(". $UserID ." , \"" . $username . "\", \"" . $email . "\", \"" . $password . "\")";
	$result = $mysqli->query($adduser);
	if (!$result) {
		print_r($mysqli->error_list);
	} else {
		echo "<script>Cookies.set('Username', '" . $username . "'); Cookies.set('UserID', '" . $UserID . "'); window.location = './index.php';</script>";
	}
	// } else {
		// echo "User already exists";
	// }
?>