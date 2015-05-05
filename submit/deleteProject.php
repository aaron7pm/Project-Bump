<?
	include_once("../connect.php");
	$pid = $_POST["pid"];
	$mysqli->query("DELETE FROM Comment WHERE ProjectID = " . $pid);
	$mysqli->query("DELETE FROM Vote WHERE ProjectID = " . $pid);
	$mysqli->query("DELETE FROM Collection WHERE ProjectID = " . $pid);
	$userquery = $mysqli->query("CALL deleteProject($pid)");
	echo "<script>window.location = 'index.php';</script>";
	print_r($mysqli->error_list);
?>