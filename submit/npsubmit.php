<?
	include_once("../connect.php");
	$name = $_POST["inputName"];
	$website = $_POST["inputWebsite"];
	$description = $_POST["inputDescription"];
	$image = $_POST["inputImage"];
	$UserID = $_COOKIE['UserID'];
	$qstring = "SELECT createProject($UserID, \"$name\", \"$description\", \"$image\", \"$website\")";
	$userquery = $mysqli->query($qstring);
	if ($userquery === TRUE) {
		echo "<script>window.location = './index.php';</script>";
	} else {
		print_r($mysqli->error_list);
	}
?>