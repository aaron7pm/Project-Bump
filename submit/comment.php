<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="../js/main.js"></script>
<?
	include_once("../connect.php");
	$UserID = $_COOKIE["UserID"];
	$ProjectID = $_POST["ProjectID"];
	$Content = $_POST["Content"];
	$userquery = $mysqli->query("CALL createComment(" . $ProjectID . ", " . $UserID . ", \"" . $Content . "\")");
	echo "<script>location.reload();</script>";
?>