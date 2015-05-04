<tr>
	<td>
		<div class="votebox">
			<a id="<? echo 'vote' . $ProjectID ?>" onclick="<? if(isset($_COOKIE["UserID"])) echo 'vote(' . $ProjectID . ')'; ?>" <? if($voted -> num_rows > 0) echo 'class="voted"'; ?>>
				<i class="fa fa-thumbs-o-up"></i>
				<span class="votecount"><? echo $votes ?></span>
			</a>
		</div>
	</td>
	<td>
		<a href=<? echo $_SERVER['REQUEST_URI'] . "project.php?id=" . $ProjectID ?>><h4><? echo $title ?></h4></a>
		<p class="hidden-xs"><? echo $description ?></p>
	</td> 
	<td class="text-right">
		by<h4><? echo $user ?></h4>
	</td>
</tr>