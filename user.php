<? include_once("connect.php") ?>
<? 
	$UserID = $_GET["id"];
	$Username = $mysqli->query("SELECT getUsername($UserID) AS username")->fetch_assoc()["username"];
	$title = "Project Bump - " . $Username;
?>
<html>
	<? include_once("components/head.php") ?>
	<body>
		<? include_once("components/nav.php"); ?>
		<div class="container project">
			<h1 class="text-center"><? echo $Username ?></h1>
			<div class="tabbable">
			    <ul class="nav nav-tabs">
			        <li class="active"><a href="#projecttab" data-toggle="tab">Projects</a></li>
			        <li><a href="#votetab" data-toggle="tab">Votes</a></li>
			        <li><a href="#collectiontab" data-toggle="tab">Collections</a></li>
			    </ul>
			    <div class="tab-content">
			        <div class="tab-pane active" id="projecttab">
						<?
							$result = $mysqli->query("SELECT * FROM Project WHERE UserID = " . $UserID);
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
						?>
			        </div>
			        <div class="tab-pane" id="votetab">
			        	<?	
			        		$vprojects = $mysqli->query("SELECT * FROM Vote WHERE UserID = " . $UserID);
			        		if ($vprojects -> num_rows > 0) {
			        			while($vproject = $vprojects->fetch_assoc()){
									$result = $mysqli->query("SELECT * FROM Project WHERE ProjectID = " . $vproject["ProjectID"]);
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
			        <div class="tab-pane" id="collectiontab">Thirdamuno, ipsum dolor sit amet, consectetur adipiscing elit. Duis pharetra varius quam sit amet vulputate. Quisque mauris augue, molestie tincidunt condimentum vitae.</div>
			    </div>
			</div>
		</div>
		<? include_once("components/footer.php"); ?>
		<script>
			function submitForm() {
				var data = '<? echo "ProjectID=" . $ProjectID . "&Content=" ?>' + $("#inputComment").val();
			    $.ajax({type:'POST', url: 'submit/comment.php', data: data, success: function(response) {
			        $("body").append(response);
			    }});
			    return false;
			}
		</script>
	</body>
</html>