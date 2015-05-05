<? include_once("../connect.php") ?>
<?
	$cid = $_POST["cid"];
	$uid = $_POST["uid"];
	$pid = $_POST["pid"];
	$mysqli->query("CALL addToCollection(" . $cid . ", " . $uid . ", " . $pid . ")");
	echo "<script>window.location = 'collection.php?id=" .  $cid . "';</script>";
?>