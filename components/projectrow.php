<tr>
	<td>
		<div class="votebox">
			<i class="fa fa-thumbs-o-up"></i>
			<? echo $votes ?>
		</div>
	</td>
	<td>
		<a href=<? echo $_SERVER['REQUEST_URI'] . "project.php?id=" . $ProjectID ?>><h4><? echo $title ?></h4></a>
		<p><? echo $description ?></p>
	</td> 
	<td class="text-right">
		by<h4><? echo $user ?></h4>
	</td>
</tr>