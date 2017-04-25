<?php
//We need the connect to database function.
include("phpfunctions.php");

//Get a connection to the database. The way we are calling it recycles already existing connections.
$conn = connectToDatabase();



//Get the query entered by the user in the query box. Extract it from the form data of the HTTP POST Method.


if ( $_POST['populationButton'] == "Clear Database")
{

$tables = array("project2.StaffBelongs",   "project2.SecondarySport", "project2.Committee", "project2.Supports", "project2.Majors", "project2.Minors", "project2.Department", "project2.College", "project2.Course", "project2.Section", "project2.Instructor_Researcher", "project2.Faculty", "project2.GradStudent", "project2.Degrees", "project2.Grants", "project2.Sport", "project2.Student", "project2.NonAcademicStaff", "project2.AcademicStaff", "project2.Staff", "project2.Person", "project2.Belongs");
foreach($tables as $table) {
  $sql = "DELETE FROM $table";
 
 


if ($conn->query($sql) === TRUE) {
    echo "Record " . $table. " deleted successfully. <br>";
} else {
    echo "Error deleting record: " . $conn->error;
}
}
}

if ( $_POST['populationButton'] == "Populate Database")
{
populateDatabase($conn);

echo "Database Populated.";



}




?>