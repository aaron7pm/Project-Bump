<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="../js/main.js"></script>
<?
	include_once("../connect.php");
	$ProjectID = $_POST["ProjectID"];
	$UserID = $_COOKIE["UserID"];
	$votequery = "DELETE FROM `Vote` WHERE ProjectID = " . $ProjectID . " AND UserID = " . $UserID;
	$voteresult = $mysqli->query($votequery);
	if ($voteresult === FALSE) {
		print_r($mysqli->error_list);
	}
?>