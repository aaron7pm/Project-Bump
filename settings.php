<? 	include_once("connect.php");
	$UserID = $_GET["id"];
	$user = $mysqli->query("SELECT * FROM User WHERE UserID = " . $UserID)->fetch_assoc();
	$title = "Project Bump - " . $user["Username"] ?>
<html>
	<? include_once("components/head.php") ?>
	<body>
		<? include_once("components/nav.php"); ?>
		<div class="container">
			<h1 class="text-center"><? echo $user["Username"] ?></h1>
			<br>
			<form id="update" class="form-horizontal">
				<h3 class="form_result text-center danger"></h3>
				<div class="form-group">
					<label for="inputUsername" class="col-sm-2 control-label">Username</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" id="inputUsername" name="inputUsername" placeholder="Username" value="<? echo $user['Username'] ?>">
					</div>
				</div>
				<div class="form-group">
					<label for="inputEmail" class="col-sm-2 control-label">Email</label>
					<div class="col-sm-8">
						<input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="Email" value="<? echo $user['Email'] ?>">
					</div>
				</div>
				<div class="form-group">
					<label for="inputPassword" class="col-sm-2 control-label">Password</label>
					<div class="col-sm-8">
						<input type="password" class="form-control" id="inputPassword" name="inputPassword" placeholder="Password" value="<? echo $user['Password'] ?>">
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
			    $.ajax({type:'POST', url: 'submit/updateUser.php', data:$('#update').serialize(), success: function(response) {
			        $('#update').find('.form_result').html(response);
			    }});
			}
		</script>
	</body>
</html>