<? include_once("../connect.php") ?>
<?
	$cid = $_POST["cid"];
	$pid = $_POST["pid"];
	$mysqli->query("CALL deleteFromCollection(" . $cid . ", " . $pid . ")");
	echo "<script>location.reload();</script>";
?>