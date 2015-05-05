<? include_once("connect.php") ?>
<? $title = "Project Bump - Home" ?>
<html>
	<? include_once("components/head.php") ?>
	<body>
		<? include_once("components/nav.php"); ?>
		<div class="container wrapper">
			<? 	for ($d = 0; $d < 5; $d++) { 
				date_default_timezone_set('America/Chicago'); // CDT
				$dd = new DateTime();
				$dd->sub(new DateInterval('P0' . $d . 'D'));
			?>
			<h2><? echo ($d == 0) ? "Today" : $dd->format('l'); ?></h2>
			<?
				$result = $mysqli->query("SELECT * FROM Project WHERE DATE(Date) = SUBDATE(CURRENT_DATE, " . $d . ")");
				if ($result -> num_rows > 0) {
					while ($row = $result->fetch_assoc()){
						$ProjectID = $row["ProjectID"];
						$UserID = $row["UserID"];
						$userquery = $mysqli->query("SELECT Username FROM User WHERE UserID = " . $UserID);
						$user = $userquery->fetch_assoc()["Username"];
						$title = $row["Name"];
						$votes = $mysqli->query("SELECT calculateVotes($ProjectID) AS vcount")->fetch_assoc()["vcount"];
						$voted = null;
						if (isset($_COOKIE["UserID"])){
							$voted = $mysqli->query("SELECT 1 FROM `Vote` WHERE ProjectID = " . $ProjectID . " AND UserID = " . $_COOKIE["UserID"]);
						} 
						$description = $row["Description"];
						include("components/projectrow.php");
					}
				}else {
					echo "<h4 class='text-center'>No projects have been submitted</h4>";
				}
			?>
			<? } ?>
		</div>
		<? include_once("components/footer.php"); ?>
	</body>
</html>