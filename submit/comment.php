<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="../js/main.js"></script>
<?
	include_once("../connect.php");
	$UserID = $_COOKIE["UserID"];
	$ProjectID = $_POST["ProjectID"];
	$Content = $_POST["Content"];
	$commentcount = $mysqli->query("SELECT COUNT(1) FROM `Comment`")->fetch_assoc()["COUNT(1)"];
	while ($mysqli->query("SELECT 1 FROM Comment WHERE CommentID = " . $commentcount)->num_rows > 0) {
		$commentcount += 1;
	}
	$qstring = "INSERT INTO `Comment` (`CommentID`, `ProjectID`, `UserID`, `Content`, `Date`)
							VALUES (" . $commentcount . ", " . $ProjectID . ", " . $UserID . ", \"" . $Content . "\", CURRENT_DATE )";
	$userquery = $mysqli->query($qstring);
	if ($userquery === TRUE) {
		echo "<script>location.reload();;</script>";
	} else {
		print_r($mysqli->error_list);
	}
?>