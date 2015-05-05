<?
	include_once("../connect.php");
	$name = $_POST["inputName"];
	$UserID = $_COOKIE['UserID'];
	$ProjectID = $_POST["inputProject"];
	$qstring = "SELECT createCollection($UserID, $ProjectID, \"$name\") AS CollectionID";
	$userquery = $mysqli->query($qstring);
	echo "<script>window.location = './collection.php?id=" .  $userquery->fetch_assoc()["CollectionID"] . "';</script>";
?>