<? include_once("connect.php") ?>
<? 
	$ProjectID = $_GET["id"];
	$projectquery = "SELECT * FROM Project WHERE ProjectID = " . $ProjectID . " LIMIT 1";
	$project = $mysqli->query($projectquery)->fetch_assoc();
	$votes = $mysqli->query("SELECT calculateVotes($ProjectID) AS vcount")->fetch_assoc()["vcount"];
	$voted = null;
	if (isset($_COOKIE["UserID"]) && $_COOKIE["UserID"] !== ""){
		$voted = $mysqli->query("SELECT didVote(" . $ProjectID . ", " . $_COOKIE["UserID"] . ") AS didVote")->fetch_assoc()["didVote"];
	} 
	$username = $mysqli->query("SELECT getUsername(" . $project["UserID"] . ") AS Username")->fetch_assoc()["Username"];
	$title = "Project Bump - " . $project["Name"];
?>
<html>
	<? include_once("components/head.php") ?>
	<body>
		<? include_once("components/nav.php"); ?>
		<div class="container project">
			<div class="dropdown">
				<? $liu = null;
			    	if (isset($_COOKIE["UserID"])) $liu = $_COOKIE["UserID"];
			    ?>
			    <button class="btn btn-default dropdown-toggle <? if ($project["UserID"] !== $liu) echo  'hidden' ?>" type="button" id="addcollection" data-toggle="dropdown" aria-expanded="true">
			        Add to Collection
			        <span class="caret"></span>
			    </button>
			    <ul class="dropdown-menu" role="menu" aria-labelledby="addcollection">
			    	<?	$collections = $mysqli->query("SELECT DISTINCT CollectionID, Name FROM Collection WHERE UserID = " . $_COOKIE["UserID"]);
			    		if ($collections -> num_rows > 0) {
			    			while ($collection = $collections -> fetch_assoc()) {
			    				if ($collection["Name"] !== NULL)
			    				echo '<li role="presentation"><a role="menuitem" tabindex="-1"
			    						onclick="addToCollection(' . $collection["CollectionID"] . ", " . $_COOKIE["UserID"] . ", " . $ProjectID . ")\">"
			    						 . $collection["Name"] . "</a></li>";
			    			}
			    		}
				    ?>
				    <li><a href="newcollection.php?id=<? echo $ProjectID ?>">New Collection</a></li>
			    </ul>
			</div>
			<div class="rowwrapper">
				<? 	if ($project['Image'] !== NULL) {
					echo
						"<div class=\"row\">
							<div class=\"headerImage\" style=\"background-image: url(" . $project['Image'] . ")\">
							</div>
						</div>";
					} 
				?>
				<div class="row pdetail">
					<div class="votebox col-xs-2 col-md-1">
						<a id="<? echo 'vote' . $ProjectID ?>" onclick="<? if(isset($_COOKIE["UserID"]) && $project['UserID'] !== $_COOKIE['UserID']) echo 'vote(' . $ProjectID . ')'; ?>" <? if($voted !== null && $voted == 1) echo 'class="voted"'; ?>>
							<i class="fa fa-thumbs-o-up"></i>
							<span class="votecount"><? echo $votes ?></span>
						</a>
					</div>
					<div class="col-xs-8 col-md-9">
						<h1 class="nomargin nopadding"><? echo $project["Name"] . ' <small>- <a href="' . $project["Website"] . '">' . $project["Website"] . "</a></small>" ?></h1>
						<h4>by <a href="user.php?id=<? echo $project['UserID'] ?>"><? echo $username ?></a></h4>
						<br>
						<h5><? echo $project["Description"] ?></h5>
					</div>
					<? 	$liu = null;
						if (isset($_COOKIE["UserID"])) $liu = $_COOKIE["UserID"];
						if ($project["UserID"] === $liu) echo  
						'<div class="col-xs-2">
							<a onclick="deleteProject('.$ProjectID.')"><h2 class="pull-right" style="margin: 1rem;"><i class="fa fa-trash-o"></i></h2></a>
						</div>';
					?>
				</div>
			</div>
		</div>
		<div class="container">
			<hr>
			<div class="row">
				<div class="col-xs-12">
					<h3>Comments</h3>
					<? if (isset($_COOKIE["UserID"])) echo '
						<form id="comment" class="form-horizontal">
							<h3 class="form_result text-center danger"></h3>
							<div class="form-group">
								<div class="col-xs-12 col-md-6">
									<textarea type="text" class="form-control" id="inputComment" name="inputComment" placeholder="Enter a new comment..."></textarea>
									<br>
									<button type="button" class="btn btn-default" onclick="submitForm()">Submit</button>
								</div>
							</div>
						</form>';
					?>
					<? 
						$comments = $mysqli->query("SELECT * FROM Comment WHERE ProjectID = " . $ProjectID);
						if ($comments -> num_rows > 0) {
							while ($row = $comments->fetch_assoc()){
								$userquery = $mysqli->query("SELECT Username FROM User WHERE UserID = " . $row['UserID']);
								$user = $userquery->fetch_assoc()["Username"];
								echo "<hr>" . "<div class=\"row\"><div class=\"col-xs-12 col-md-2\"><a href=\"user.php?id=" . $row['UserID'] . "\"><b>" . $user . "</b></a>: </div><div class=\"col-xs-12 col-md-10\">" . $row["Content"] . "</div></div><br>";
							}
						}
					?>
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