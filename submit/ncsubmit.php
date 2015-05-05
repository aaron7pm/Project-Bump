<?
	include_once("../connect.php");
	$name = $_POST["inputName"];
	$UserID = $_COOKIE['UserID'];
	$ProjectID = $_POST["inputProject"];
	$userquery = $mysqli->query("SELECT createCollection($UserID, $ProjectID, \"$name\") AS cid");
	echo "<script>window.location = 'collection.php?id=" .  $userquery->fetch_assoc()["cid"] . "';</script>";
?>