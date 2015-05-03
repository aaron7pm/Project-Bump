<? include_once("connect.php") ?>
<? $title = "Project Bump - Home" ?>
<html>
	<head>
		<title><? echo $title; ?></title>
	</head>
	<body>
		<? include_once("components/nav.php"); ?>
		<div class="container">
			<? 	for ($d = 0; $d < 5; $d++) { 
				date_default_timezone_set('America/Chicago'); // CDT
				$dd = new DateTime();
				$dd->sub(new DateInterval('P0' . $d . 'D'));
			?>
			<h2><? echo ($d == 0) ? "Today" : $dd->format('l'); ?></h2>
			<table class="table">
				<?
					$result = $mysqli->query("SELECT * FROM Project WHERE DATE(Date) = SUBDATE(CURRENT_DATE, " . $d . ")");
					if ($result -> num_rows > 0) {
						while ($row = $result->fetch_assoc()){
							$ProjectID = $row["ProjectID"];
							$title = $row["Name"];
							$votes = 0;
							$description = $row["Description"];
							include("components/projectrow.php");
						}
					}else {
						echo "<h4 class='text-center'>No projects have been submitted</h4>";
					}
				?>
			</table>
			<? } ?>
		</div>
		<? include_once("components/footer.php"); ?>
	</body>
</html>