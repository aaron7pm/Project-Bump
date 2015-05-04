<? include_once("connect.php") ?>
<? $title = "Project Bump - Register" ?>
<html>
	<head>
		<title><? echo $title; ?></title>
	</head>
	<body>
		<? include_once("components/nav.php"); ?>
		<div class="container">
			<h1 class="text-center">Register</h1>
			<br>
			<form id="register" class="form-horizontal">
				<h3 class="form_result text-center danger"></h3>
				<div class="form-group">
					<label for="inputUsername" class="col-sm-2 control-label">Username</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" id="inputUsername" name="inputUsername" placeholder="Username">
					</div>
				</div>
				<div class="form-group">
					<label for="inputEmail" class="col-sm-2 control-label">Email</label>
					<div class="col-sm-8">
						<input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="Email">
					</div>
				</div>
				<div class="form-group">
					<label for="inputPassword" class="col-sm-2 control-label">Password</label>
					<div class="col-sm-8">
						<input type="password" class="form-control" id="inputPassword" name="inputPassword" placeholder="Password">
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
			if (Cookies.get('UserID')) window.location = './index.php';
			function submitForm() {
			    $.ajax({type:'POST', url: 'submit/rsubmit.php', data:$('#register').serialize(), success: function(response) {
			        $('#register').find('.form_result').html(response);
			    }});
			    return false;
			}
		</script>
	</body>
</html>