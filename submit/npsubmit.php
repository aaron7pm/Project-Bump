<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="../js/main.js"></script>
<?
	include_once("../connect.php");
	$name = $_POST["inputName"];
	$website = $_POST["inputWebsite"];
	$description = $_POST["inputDescription"];
	$image = $_POST["inputImage"];
	$projectcount = $mysqli->query("SELECT COUNT(1) FROM `Project`")->fetch_assoc()["COUNT(1)"];
	while ($mysqli->query("SELECT 1 FROM Project WHERE ProjectID = " . $projectcount)->num_rows > 0) {
		$projectcount += 1;
	}
	$qstring = "INSERT INTO `Project` (`ProjectID`, `UserID`, `Name`, `Description`, `Image`, `Website`, `Date`)
								VALUES (" . $projectcount . ", " . $_COOKIE["UserID"] . ", \"" . $name . "\", \"" . $description . "\", \"" . $image . "\", \"" . $website . "\", CURRENT_DATE)";
	$userquery = $mysqli->query($qstring);
	if ($userquery === TRUE) {
		echo "<script>window.location = './index.php';</script>";
	} else {
		print_r($mysqli->error_list);
	}
?>