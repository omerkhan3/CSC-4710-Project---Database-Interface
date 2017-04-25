<?php
//We need the connect to database function.
include("phpfunctions.php");

//Get a connection to the database. The way we are calling it recycles already existing connections.
$conn = connectToDatabase();

//Get the query entered by the user in the query box. Extract it from the form data of the HTTP POST Method.


$queryRelation =  "select * from Project2.". $_POST['relationButton'] . ";";



if ($conn->multi_query($queryRelation)) {
	//Some style information. See https://www.w3schools.com/html/html_tables.asp
	echo "<style>" . "table, th, td {" . "border: 1px solid black;" . "border-collapse: collapse;" . "th, td {" . 
		"padding: 15px;" . "}" . "</style>";
	do {
		//See https://www.w3schools.com/html/html_tables.asp about creating tables
		echo "<table style=\"width:100%\">"; //Open an html table
		/* store first result set See http://php.net/manual/en/class.mysqli-result.php and http://php.net/manual/en/mysqli.store-result.php*/
		if ($result = $conn->store_result()) {
			//Fetch all of the fields (corresponds to "columns") objects as an array
			$fields = $result->fetch_fields();
			echo "<tr>"; //Begin creating a row for the column headers
			//Iterate over the fields array. See http://php.net/manual/en/control-structures.foreach.php
			foreach ($fields as &$field){
				//<th> is for table header. Period is for concatentation. name gets the name of the field (column).

				switch($field->type){
					case '254':
						$fieldtype = 'char';
						break;
					case '3':
						$fieldtype ='int';
						break;
					case '10':
						$fieldtype = 'date';
						break;
					case '4':
						$fieldtype = 'float';
						break;
				}

				echo "<th>" . $field->name . " (" . $fieldtype. ")</th>";
			}
			echo "</tr>"; //Done creating table columns row

			//Print out the actual table data. Fetch each table row.
			while ($row = $result->fetch_row()) {
				echo "<tr>"; //Begin creating a row for table data as opposed to header.
				foreach ($row as &$rowData){
					//<td> is for table data. Period is for concatentation. $rowData would be one data value in a row.
					echo "<td>" . $rowData ."</td>";
				}
				echo "</tr>"; //Finished a row
			}
			$result->free(); //Clean up after ourselves
		}
		echo "</table>"; //Close the html table	
		/* print divider */
		if ($conn->more_results()) {
			echo "<br /> <br />"; //Print new lines after this query result
		}
		else{
			break; //Done looping
		}
	} while ($conn -> next_result());
}
else {//An error occurred
	die("Error running your query."  . $conn->error);		
}
?>