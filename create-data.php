<?php include('header.php'); ?>

    <div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<h1>Add New Student</h1>
			</div>
		</div>

		<?php

			// Default Success Message is Empty
			$successMessage = '';

			if ( isset($_POST['submit']) ){
				$fullname 	= $_POST['fullname'];
				$email 		= $_POST['email'];
				$phone 		= $_POST['phone'];

				if ( empty($fullname) || empty($email) || empty($phone) ){
					$successMessage = '<div class="alert alert-danger">Please Check Students Information Perfectly.</div>';
				}
				else{

					$sql = 'INSERT INTO students (std_name, std_emal, std_phone) VALUES (:std_name, :std_emal, :std_phone)';

					$statement = $connection->prepare($sql);
				

					if ( $statement->execute( [':std_name'=>$fullname, ':std_emal'=> $email, ':std_phone'=> $phone]) )
					{
						$successMessage = '<div class="alert alert-success">New Student Registered Successfully</div>';

					}
					else{
						$successMessage = '<div class="alert alert-danger">Registration Failed</div>';
					}

				}

				

				


			}

		?>

		<div class="row">
			<div class="col-md-6 offset-md-3">
				<form action="" method="POST">
					<div class="form-group">
						<label>Full Name</label>
						<input type="text" name="fullname" class="form-control" autocomplete="off" required="required">
					</div>

					<div class="form-group">
						<label>Email Address</label>
						<input type="email" name="email" class="form-control" autocomplete="off" required="required">
					</div>

					<div class="form-group">
						<label>Phone Number</label>
						<input type="text" name="phone" class="form-control" autocomplete="off" required="required">
					</div>

					<div class="form-group">
						<input type="submit" name="submit" class="btn btn-primary" value="Register">
					</div>

					<?php if (!empty($successMessage)) : ?>

						<?php echo $successMessage; ?>

					<?php endif; ?>

					
				</form>
			</div>
		</div>
    </div>

<?php include('footer.php'); ?>




    