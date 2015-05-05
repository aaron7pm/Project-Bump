<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="../js/main.js"></script>
<?
	include_once("../connect.php");
	$username = $_POST["inputUsername"];
	$email = $_POST["inputEmail"];
	$password = $_POST["inputPassword"];
	$usercount = $mysqli->query("SELECT COUNT(1) FROM `User`")->fetch_assoc()["COUNT(1)"];
	while ($mysqli->query("SELECT 1 FROM User WHERE UserID = " . $usercount)->num_rows > 0) {
		$usercount += 1;
	}
	$uexists = $mysqli->query("SELECT userExists(\"$username\") AS uexists")->fetch_assoc()["uexists"];
	$eexists = $mysqli->query("SELECT userExists(\"$email\") AS eexists")->fetch_assoc()["eexists"];
	if ($uexists == 0 && $eexists == 0) {
		$adduser = "INSERT INTO `User` (`UserID`, `Username`, `Email`, `Password`, `IsAdmin`)
				VALUES (" . $usercount . ", \"" . $username . "\", \"" . $email . "\", \"" . $password . "\", " . 0 .  ")";
		$result = $mysqli->query($adduser);
		if (!$result) {
			echo "Failed! Please check to see if your entries are valid";
		} else {
			echo "<script>Cookies.set('Username', '" . $username . "'); Cookies.set('UserID', '" . $usercount . "'); window.location = './index.php';</script>";
		}
	} else {
		echo "User already exists";
	}
?>