<?php
	
	session_start();
	$dns 		= 'mysql:host=localhost;dbname=crud';
	$username 	= 'root';
	$password  	= '';
	$message 	= "";

	try{
		$connection = new PDO($dns, $username, $password);
		$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		//echo "We are Connected";
	}
	catch(PDOException $error){
		$message = $error->getMessage();
	}

?>