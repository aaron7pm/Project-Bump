<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="../js/main.js"></script>
<?
	include_once("../connect.php");
	$votecount = $mysqli->query("SELECT COUNT(1) FROM `Vote`")->fetch_assoc()["COUNT(1)"];
	while ($mysqli->query("SELECT 1 FROM Vote WHERE VoteID = " . $votecount)->num_rows > 0) {
		$votecount += 1;
	}
	$ProjectID = $_POST["ProjectID"];
	$UserID = $_COOKIE["UserID"];
	$votequery = "INSERT INTO `Vote` (`VoteID`, `ProjectID`, `UserID`) VALUES (" . $votecount . ", " . $ProjectID . ", " . $UserID . ")";
	$voteresult = $mysqli->query($votequery);
	if ($voteresult === FALSE) {
		print_r($mysqli->error_list);
	}
?>