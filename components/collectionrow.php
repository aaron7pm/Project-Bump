<div class="rowwrapper">
	<div class="row">
		<div class="col-xs-10">
			<a href="collection.php?id=<? echo $CollectionID ?>"><h2 class="nopadding" style="margin: 1rem auto;"><? echo $collection["Name"] ?></h2></a>
		</div>
		<? 	$liu = null;
			if (isset($_COOKIE["UserID"])) $liu = $_COOKIE["UserID"];
			if ($collection["UserID"] === $liu) echo  
			'<div class="col-xs-2">
				<a onclick="deleteCollection('.$CollectionID.')"><h2 class="pull-right" style="margin: 1rem;"><i class="fa fa-trash-o"></i></h2></a>
			</div>';
		?>
	</div>
</div>