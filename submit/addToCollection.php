<? include_once("../connect.php") ?>
<?
	$cid = $_POST["cid"];
	$uid = $_POST["uid"];
	$pid = $_POST["pid"];
	$exists = $mysqli->query("SELECT COUNT(1) AS ex FROM Collection 
		WHERE CollectionID = " . $cid . " AND ProjectID = ". $pid)->fetch_assoc()["ex"];
	if ($exists = 0) $mysqli->query("CALL addToCollection(" . $cid . ", " . $uid . ", " . $pid . ")");
	echo "<script>window.location = 'collection.php?id=" .  $cid . "';</script>";
?>