<?php
	
	include "header.php";

	$std_id = $_GET['std_id'];

	$sql = "DELETE FROM students WHERE std_id=:std_id";

	$statement=$connection->prepare($sql);

	if ( $statement->execute([':std_id' => $std_id]) ){
		header("Location: dashboard.php");
	}

	include "footer.php";

?>