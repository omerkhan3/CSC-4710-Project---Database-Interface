<?php
//We need the connect to database function.
include("phpfunctions.php");

//Get a connection to the database. The way we are calling it recycles already existing connections.
$conn = connectToDatabase();

//Get the query entered by the user in the query box. Extract it from the form data of the HTTP POST Method.

if ($_POST['queryButton'] == "Return student names and their respective majors and minors.") 
{
	$query =  "select Person.Name, Majors.Dname, Minors.Dname from Project2.Majors, project2.Minors, project2.Person
where Majors.SSN = Minors.SSN and Minors.SSN = Person.SSN;";
}
else if ($_POST['queryButton'] == "Return information about faculty and their asssociated department.")
{
	$query =  "select Faculty.SSN, Faculty.Rank, Department.Dname  
from project2.Faculty, project2.Department where Department.ChairFacultySSN = Faculty.SSN;";
}

else if ($_POST['queryButton'] == "Return average graduation year of degree holding graduate students.")
{
	$query =  "select AVG(Degrees.Year) from project2.GradStudent, project2.Degrees
where GradStudent.degreeEarned = Degrees.Major";
}

else if ($_POST['queryButton'] == "Select the maximum salary of each rank of faculty.")
{
	$query =  "select max(salary), SSN, rank from project2.faculty group by rank;";
}


else if ($_POST['queryButton'] == "Select all students except those who are seniors.")
{
	$query =  "select S1.SSN, S1.Class from project2.Student S1 where s1.SSN NOT IN ( select S2.SSN from project2.Student S2 where S2.class = 'Senior');";
}

else if ($_POST['queryButton'] == "Return the number of credit courses that have 3 courses offered.")
{
	$query =  "select C.Credit from project2.Course C GROUP BY C.Credit HAVING COUNT(*) = 3;";
}

else if ($_POST['queryButton'] == "Return the name of instructors who teach multiple sections.")
{
	$query =  "select P.Name
from project2.Person P
Where SSN IN(
		select InstructorSSN
		from project2.Section
		GROUP BY InstructorSSN
		HAVING COUNT(distinct SecNum) > 1
		);
        ";
}

else if ($_POST['queryButton'] == "Return the SSN of faculty that taught more than 7 credits.")
{
	$query =  	"select S.InstructorSSN
	from project2.Course C, project2.Section S
	where C.SecNum = S.SecNum
	GROUP BY S.InstructorSSN
	HAVING SUM(C.Credit) > 7";
}


else if ($_POST['queryButton'] == "Return the name of faculty members who chair the computer science department and advise a Grad Student named Ridwan.")
{
	$query =  	"select P1.Name
from project2.Person P1, project2.Person P2, project2.Department D, project2.Faculty F, project2.GradStudent G
Where P1.SSN = F.SSN AND D.ChairFacultySSN = F.SSN AND D.Dname = 'Biology' AND 
F.studentAdvisedSSN = G.SSN AND G.SSN = P2.SSN AND P2.Name = 'Ridwan';";
}

else if ($_POST['queryButton'] == "Return professor names in alphabetical order and the number of courses they taught.")
{
	$query =  	"select P.Name, COUNT(*) AS 'CoursesTaught'
from project2.Faculty F, project2.Section S, project2.Person P
where F.SSN = S.InstructorSSN AND P.SSN = F.SSN
GROUP BY F.SSN, P.Name
ORDER BY P.Name ASC;";
}














if ($conn->multi_query($query)) {
	echo "<style>" . "table, th, td {" . "border: 1px solid black;" . "border-collapse: collapse;" . "th, td {" . 
		"padding: 15px;" . "}" . "</style>";
	do {
		echo "<table style=\"width:100%\">"; //Open an html table
		if ($result = $conn->store_result()) {
			//Fetch all of the fields (corresponds to "columns") objects as an array
			$fields = $result->fetch_fields();
			echo "<tr>"; //Begin creating a row for the column headers
			//Iterate over the fields array. 
			foreach ($fields as &$field){
				
			
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
			echo "</tr>"; 
			//Print out the actual table data. Fetch each table row.
			while ($row = $result->fetch_row()) {
				echo "<tr>"; //Begin creating a row for table data as opposed to header.
				foreach ($row as &$rowData){
					echo "<td>" . $rowData ."</td>";
				}
				echo "</tr>"; //Finished a row
			}
			$result->free(); 
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
