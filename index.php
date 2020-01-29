<?php include 'header.php'; ?>

<?php

	if ( isset($_POST['login']) ){

		if ( empty($_POST['username']) || empty($_POST['password']) )
		{
			$message = '<div class="alert alert-danger">Username and Password Is Required.<br> Please Check Your Information.</div>';
		}
		else{

			$sql = "SELECT * FROM users WHERE username=:username AND password=:password";
			$statement = $connection->prepare($sql);
			$statement->execute(
				array(
					'username' => $_POST['username'],
					'password' => $_POST['password']
				)
			);

			$count = $statement->rowCount(); //Value = 1

			if ( $count > 0 ){
				$_SESSION['username'] = $_POST['username'];
				header("Location: dashboard.php");
			}
			else{
				$message = '<div class="alert alert-danger">Username and Password Does Not Match!!!</div>';					
			}



		}

	}
	
?>




<section class="login-section">
	<div class="container">
		<div class="row">
			<div class="col-md-6 offset-md-3">
				<h1>Administrator Login</h1>

				<?php

					if ( isset($message) ){
						echo $message;
					}

				?>
				<!-- Login Form Start -->
				<form action="" method="POST">
					<div class="form-group">
						<label>Username <span>*</span></label>
						<input type="text" name="username" class="form-control">
					</div>

					<div class="form-group">
						<label>Password <span>*</span></label>
						<input type="password" name="password" class="form-control">
					</div>

					<div class="form-group">
						<input type="submit" name="login" class="btn btn-primary">
					</div>
				</form>
				<!-- Login Form End -->
			</div>
		</div>
	</div>
</section>

<?php include 'footer.php'; ?>