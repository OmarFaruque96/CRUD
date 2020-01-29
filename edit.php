<?php include('header.php'); ?>

    <div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<h1>Update Student Data</h1>
			</div>
		</div>

		<?php

			$std_id = $_GET['std_id'];
			$sql = "SELECT * FROM students WHERE std_id=:std_id";
			$statement = $connection->prepare($sql);
			$statement->execute([':std_id' => $std_id]);
			$student = $statement->fetch(PDO::FETCH_OBJ);

			if ( isset($_POST['update']) ){
				$fullname 	= $_POST['fullname'];
				$email 		= $_POST['email'];
				$phone 		= $_POST['phone'];
				$sql = "UPDATE students SET std_name=?, std_emal=?, std_phone=? WHERE std_id=?";
				$statement = $connection->prepare($sql);
				if ( $statement->execute( [$fullname, $email, $phone, $std_id])){
					header("Location: dashboard.php");
				}	
			}
		?>
		<div class="row">
			<div class="col-md-6 offset-md-3">
				<form action="" method="POST">
					<div class="form-group">
						<label>Full Name</label>
						<input type="text" name="fullname" class="form-control" autocomplete="off" required="required" value="<?php echo $student->std_name; ?>">
					</div>

					<div class="form-group">
						<label>Email Address</label>
						<input type="email" name="email" class="form-control" autocomplete="off" required="required" value="<?php echo $student->std_emal; ?>">
					</div>

					<div class="form-group">
						<label>Phone Number</label>
						<input type="text" name="phone" class="form-control" autocomplete="off" required="required" value="<?php echo $student->std_phone; ?>">
					</div>

					<div class="form-group">
						<input type="submit" name="update" class="btn btn-primary" value="Update">
					</div>
				</form>
			</div>
		</div>
    </div>

<?php include('footer.php'); ?>