<? include_once("connect.php") ?>
<? 
	$CollectionID = $_GET["id"];
	$collection = $mysqli->query("SELECT * FROM Collection WHERE CollectionID = " . $CollectionID . " LIMIT 1")->fetch_assoc();
	$projects = $mysqli->query("SELECT * FROM Collection WHERE CollectionID = " . $CollectionID);
	$title = "Project Bump - " . $collection["Name"];
?>
<html>
	<? include_once("components/head.php") ?>
	<body>
		<? include_once("components/nav.php"); ?>
		<div class="container">
			<h1 class="text-center"><? echo $collection["Name"] ?><small> by <a href="user.php=<? echo $collection['UserID'] ?>"><? echo $mysqli->query("SELECT getUsername(" . $collection["UserID"] . ") AS username")->fetch_assoc()["username"] ?></a></small></h1>
			<?	if ($projects -> num_rows > 0) {
        			while($project = $projects->fetch_assoc()){
						$result = $mysqli->query("SELECT * FROM Project WHERE ProjectID = " . $project["ProjectID"]);
						if ($result -> num_rows > 0) {
							while ($row = $result->fetch_assoc()){
								$ProjectID = $row["ProjectID"];
								$uid = $row["UserID"];
								$user = $mysqli->query("SELECT getUsername(" . $uid . ") AS Username")->fetch_assoc()["Username"];
								$title = $row["Name"];
								$votes = $mysqli->query("SELECT calculateVotes($ProjectID) AS vcount")->fetch_assoc()["vcount"];
								$voted = null;
								if (isset($_COOKIE["UserID"]) && $_COOKIE["UserID"] !== ""){
									$voted = $mysqli->query("SELECT didVote(" . $ProjectID . ", " . $_COOKIE["UserID"] . ") AS didVote")->fetch_assoc()["didVote"];
								} 
								$description = $row["Description"];
								include("components/projectrow.php");
							}
						}else {
							echo "<h4 class='text-center'>No projects have been submitted</h4>";
						}
					}
				}
			?>
		</div>
		<? include_once("components/footer.php"); ?>
	</body>
</html>