<?
	include_once("../connect.php");
	$cid = $_POST["cid"];
	$userquery = $mysqli->query("CALL deleteCollection($cid)");
	echo "<script>window.location = 'index.php';</script>";
?>