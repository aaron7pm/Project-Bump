<?
	include_once("connect.php");
	$title = "Project Bump - Post a New Project"; 
	if(!isset($_COOKIE["UserID"])) echo "<script>window.location = './index.php';</script>";
?>
<html>
	<? include_once("components/head.php") ?>
	<body>
		<? include_once("components/nav.php"); ?>
		<div class="container">
			<h1 class="text-center">New Project</h1>
			<br>
			<form id="project" class="form-horizontal">
				<h3 class="form_result text-center danger"></h3>
				<div class="form-group">
					<label for="inputName" class="col-sm-2 control-label">Name</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" id="inputName" name="inputName" placeholder="Username">
					</div>
				</div>
				<div class="form-group">
					<label for="inputWebsite" class="col-sm-2 control-label">Website</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" id="inputWebsite" name="inputWebsite" placeholder="Website or URL">
					</div>
				</div>
				<div class="form-group">
					<label for="inputDescription" class="col-sm-2 control-label">Description</label>
					<div class="col-sm-8">
						<textarea class="form-control" id="inputDescription" name="inputDescription" placeholder="Description"></textarea>
					</div>
				</div>
				<div class="form-group">
					<label for="inputImage" class="col-sm-2 control-label">Image</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" id="inputImage" name="inputImage" placeholder="Link to Image of Project">
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
			    $.ajax({type:'POST', url: 'submit/npsubmit.php', data:$('#project').serialize(), success: function(response) {
			        $('#project').find('.form_result').html(response);
			    }});
			    return false;
			}
		</script>
	</body>
</html>