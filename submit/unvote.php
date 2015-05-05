<?
	include_once("../connect.php");
	$ProjectID = $_POST["ProjectID"];
	$UserID = $_COOKIE["UserID"];
	$voteresult = $mysqli->query("CALL deleteVote($ProjectID, $UserID)");
	if ($voteresult === FALSE) {
		print_r($mysqli->error_list);
	}
?>