<? 
	$projectquery = "SELECT * FROM Project WHERE ProjectID = " . $ProjectID . " LIMIT 1";
	$project = $mysqli->query($projectquery)->fetch_assoc();
?>
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
			<a href="project.php?id=<? echo $ProjectID ?>"><h3 class="nomargin nopadding"><? echo $project["Name"] . " <small>by " . $user . "</small>"?></h1></a>
			<p><? echo $project["Description"] ?></p>
		</div>
		<? 	$liu = null;
			if (isset($_COOKIE["UserID"])) $liu = $_COOKIE["UserID"];
			if ($project["UserID"] === $liu) echo  
			'<div class="col-xs-2">
				<a onclick="deleteFromCollection('.$CollectionID . ", " .$ProjectID.')"><h2 class="pull-right" style="margin: 1rem;"><i class="fa fa-trash-o"></i></h2></a>
			</div>';
		?>
	</div>
</div>