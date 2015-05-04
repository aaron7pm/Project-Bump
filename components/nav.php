<nav class="navbar navbar-default">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed"
				data-toggle="collapse"
				data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="index.php"><i class="fa fa-hand-o-up"></i> Project Bump</a>
		</div>

		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav navbar-right">
				<form class="navbar-form navbar-nav" role="search">
					<div class="form-group">
						<input type="text" class="form-control"
							placeholder="Search">
					</div>
				</form>
				<li><a id="loginbtn" href="login.php" class="hidden">Login</a></li>
				<li><a id="registerbtn" href="register.php" class="hidden">Register</a></li>
				<li id="user" class="dropdown hidden">
					<a id="username" href="#" class="dropdown-toggle" data-toggle="dropdown"
						role="button" aria-expanded="false">
						My Account <span class="caret"></span>
					</a>
					<ul class="dropdown-menu" role="menu">
						<li><a id="profile" href="#">My Profile</a></li>
						<li><a href="#">Settings</a></li>
						<li class="divider"></li>
						<li><a id="logout" href="#" onclick="logout()">Logout</a></li>
					</ul>
				</li>
				<li id="add" class="dropdown hidden">
					<a id="username" href="#" class="dropdown-toggle" data-toggle="dropdown"
						role="button" aria-expanded="false">
						<i class="fa fa-plus"></i>&nbsp; <span class="caret"></span>
					</a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="newproject.php">New Project</a></li>
						<li><a href="newcollection.php">New Collection</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</nav>