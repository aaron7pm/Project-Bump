<?
	include_once("connect.php");
	$title = "Project Bump - Create a New Collection"; 
	if(!isset($_COOKIE["UserID"])) echo "<script>window.location = './index.php';</script>";
?>
<html>
	<? include_once("components/head.php") ?>
	<body>
		<? include_once("components/nav.php"); ?>
		<div class="container">
			<h1 class="text-center">New Collection</h1>
			<br>
			<form id="collection" class="form-horizontal">
				<h3 class="form_result text-center danger"></h3>
				<div class="form-group">
					<label for="inputName" class="col-sm-2 control-label">Name</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" id="inputName" name="inputName" placeholder="Name">
					</div>
				</div>
				<div class="form-group">
					<label for="inputProject" class="col-sm-2 control-label">ProjectID</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" id="inputProject" name="inputProject" placeholder="Enter a Project ID">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-8">
						<button type="button" class="btn btn-default" onclick="submitForm()">Submit</button>
					</div>
				</div>
			</form>
		</div>
		<? include_once("components/footer.php"); ?>
		<script>
			function submitForm() {
			    $.ajax({type:'POST', url: 'submit/ncsubmit.php', data:$('#collection').serialize(), success: function(response) {
			        $('#collection').find('.form_result').html(response);
			    }});
			    return false;
			}
		</script>
	</body>
</html>