<?php 

	include('header.php'); 

	
	

	if( isset($_SESSION['username']) ){
		?>

		<section class="welcome-note">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<?php 
							echo "<h2>Welcome " . $_SESSION['username'] . "</h2>";
						?>
					</div>
					<div class="col-md-6 logout-btn">
						<a href="logout.php" class="btn btn-primary">Logout</a>
					</div>

				</div>
			</div>
		</section>
	
	<?php }
	else{
		header("Location: index.php");
	}


	$sql = "SELECT * FROM students";
	$statement = $connection->prepare($sql);
	$statement->execute();

	// Store all the info into the $students Array
	$students = $statement->fetchAll(PDO::FETCH_OBJ);

?>

    <div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>All the Students Data are Here</h1>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<!-- Student Data Table Start -->
				<table class="table table-dark">
				  
				  <thead>
				    <tr>
				      <th scope="col">ID</th>
				      <th scope="col">Full Name</th>
				      <th scope="col">Email Address</th>
				      <th scope="col">Phone Number</th>
				      <th>Action</th>
				    </tr>
				  </thead>
				  
				  	<tbody>
				  		<?php foreach( $students as $human ): ?>
					    <tr>
					      <th scope="row"><?php echo $human->std_id; ?></th>
					      <td><?php echo $human->std_name; ?></td>
					      <td><?php echo $human->std_emal; ?></td>
					      <td><?php echo $human->std_phone; ?></td>
					     <td> 
					     	<a href="edit.php?std_id=<?php echo $human->std_id; ?>" class="btn btn-success">Update</a>
				      		<a href="delete.php?std_id=<?php echo $human->std_id; ?>" class="btn btn-danger">Delete</a></td>
					    </tr>
					<?php endforeach; ?>
					</tbody>

				</table>
				<!-- Student Data Table Start -->
			</div>
		</div>
    </div>

<?php include('footer.php'); ?>

    