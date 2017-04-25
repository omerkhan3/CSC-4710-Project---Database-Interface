<?php

function connectToDatabase(){
	//Default settings of easyphp
	$servername = "localhost";
	$username = "root";
	$password = ""; //default password

	// Create connection. Note taht we are using the OOP style here for PHP. $conn is now an object.
	$conn = new mysqli($servername, $username, $password);

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	//using some javascript here. Comment this out once you can verify your connections work.
	//echo "<script type='text/javascript'>alert('You have connected to your database successfully!')</script>";
	
	//Return the connection
	return $conn;
}

//It is assumed that connectToDatabase has already been called
function populateDatabase($conn){
	//Read in the query from the file to create the tables.
	$tableCreate = file_get_contents("Project 2 - Table Creation.sql");
	//Execute the file. More info at http://php.net/manual/en/mysqli.multi-query.php
	if ($conn->multi_query($tableCreate)) {
		clearStoredResults($conn); //Clean up after the query
	}
	else {//An error occurred
		die("Error creating tables for the database."  . $conn->error);		
	}
	//Read in the query from the file to populate the tables.
	$dataPop = file_get_contents("Project 2 - Insertion Statements.sql");
	//Execute the file. More info at http://php.net/manual/en/mysqli.multi-query.php
	if ($conn->multi_query($dataPop)) {
		clearStoredResults($conn); //Clean up after the query
	}
	else {//An error occurred
		die("Error populating tables for the database."  . $conn->error);		
	}
}

//Solution from http://stackoverflow.com/questions/614671/commands-out-of-sync-you-cant-run-this-command-now
//Used to clear up after the results of a query so that we can call something else.
function clearStoredResults($conn){
	do {
		if ($res = $conn->store_result()) {
			$res->free();
		}
	} while ($conn->more_results() && $conn->next_result());        
}

?>