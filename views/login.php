<?php

session_start();
if(isset($_SESSION['login'])) {
	header('Location: index.php');
}

require_once '../controller/auth.php';
if(isset($_POST['login'])) {
	login($_POST);
}

$title = 'Login';
require_once __DIR__ . '/layouts/header.php';

?>

<div class="container">
	<div class="row d-flex justify-content-center pt-5 mt-5">
		<div class="col-5">
			<div class="card">
				<div class="card-header bg-info">
					<h5 class="text-center">Login</h5>
				</div>
				<div class="card-body">
					<form method="POST">
						<div class="mb-3">
							<label for="usernae" class="form-label">Username</label>
							<input type="text" name="username" id="username" class="form-control" placeholder="Username">
						</div>
						<div class="mb-3">
							<label for="password" class="form-label">Password</label>
							<input type="password" name="password" id="password" class="form-control" placeholder="********">
						</div>
						<button name="login" type="submit" class="btn btn-primary rounded form-control">Login</button>
					</form>
				</div>
				<div class="card-footer bg-warning">
					<span class="text-white text-center">
						<h4>Username: admin</h4>
						<h4>Password: admin123</h4>
					</span>
				</div>
			</div>
		</div>
	</div>
</div>



<?php

require_once __DIR__ . '/layouts/footer.php';