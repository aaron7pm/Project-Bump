<? include_once("connect.php") ?>
<? 
	$ProjectID = $_GET["id"];
	$projectquery = "SELECT * FROM Project WHERE ProjectID = " . $ProjectID . " LIMIT 1";
	$project = $mysqli->query($projectquery)->fetch_assoc();
	$votes = $mysqli->query("SELECT COUNT(1) FROM `Vote` WHERE ProjectID = " . $ProjectID)->fetch_assoc()["COUNT(1)"];
	$voted = null;
	if (isset($_COOKIE["UserID"])){
		$voted = $mysqli->query("SELECT 1 FROM `Vote` WHERE ProjectID = " . $ProjectID . " AND UserID = " . $_COOKIE["UserID"]);
	} 
	$title = "Project Bump - " . $project["Name"];
?>
<html>
	<? include_once("components/head.php") ?>
	<body>
		<? include_once("components/nav.php"); ?>
		<div class="container project">
			<? 	if ($project['Image'] !== NULL) {
				echo
					"<div class=\"row\">
						<div class=\"headerImage\" style=\"background-image: url(" . $project['Image'] . ")\">
						</div>
					</div>";
				} 
			?>
			<div class="row">
				<div class="votebox col-xs-2 col-md-1">
					<a id="<? echo 'vote' . $ProjectID ?>" onclick="<? if(isset($_COOKIE["UserID"])) echo 'vote(' . $ProjectID . ')'; ?>" <? if($voted !== null && $voted -> num_rows > 0) echo 'class="voted"'; ?>>
						<i class="fa fa-thumbs-o-up"></i>
						<span class="votecount"><? echo $votes ?></span>
					</a>
				</div>
				<div class="col-xs-10 col-md-11">
					<h1 class="nomargin nopadding"><? echo $project["Name"] . ' <small>- <a href="' . $project["Website"] . '">' . $project["Website"] . "</a></small>" ?></h1>
					<h4><? echo $project["Description"] ?></h4>
				</div>
			</div>
		</div>
		<? include_once("components/footer.php"); ?>
	</body>
</html>