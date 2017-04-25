<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">


<script src = "javascriptfunctions.js"></script>



<?php
	//Make available a list of functions in phpfunctions
	include("phpfunctions.php");
	//Call the connect to database function
	$conn = connectToDatabase();
	//Populate the database
	populateDatabase($conn);
?>

<head>
  <link rel="stylesheet" type="text/css" href="project4.css">
  <title>Project 4 by Omer Khan & Ridwan Khan </title>
</head>

<body>
<div id = "heading">
	<h1 class = "projectTitle"> Project 4 </h1>
	<h1> By: Omer Khan & Ridwan Khan </h1>
	<hr>



</div>
 
 	<div id = "populateButton" class = "section">

	<form method = "POST" action = "populationButtons.php" target = "_blank" >
	<input type = "submit"  class = "populationButton" name = "populationButton" value = "Populate Database">  
	<input type = "submit"  class = "populationButton" name = "populationButton" value = "Clear Database" >

	</form>

	</div> 

	<hr>

	<div id = "relations" class = "section"> 
	<h2> Relations </h2>
	<form method = "POST" action = "Relations.php" target = "_blank">
		<input type = "submit" class = "relationButton" name = "relationButton" value ="Person"/> 
		<input type = "submit" class = "relationButton" name = "relationButton" value ="Staff"/> 
		<input type = "submit" class = "relationButton" name = "relationButton" value ="NonAcademicStaff"/> 
		<input type = "submit" class = "relationButton" name = "relationButton" value ="AcademicStaff"/> 
		<input type = "submit" class = "relationButton" name = "relationButton" value ="Student"/>  <br> 
		<input type = "submit" class = "relationButton" name = "relationButton" value ="Sport"/> 
		<input type = "submit" class = "relationButton" name = "relationButton" value ="Degrees"/> 
		<input type = "submit" class = "relationButton" name = "relationButton" value ="GradStudent"/> 
		<input type = "submit" class = "relationButton" name = "relationButton" value ="Instructor_Researcher"/> 
		<input type = "submit" class = "relationButton" name = "relationButton" value ="Section"/>  <br>
		<input type = "submit" class = "relationButton" name = "relationButton" value ="Course"/> 
		<input type = "submit" class = "relationButton" name = "relationButton" value ="Department"/> 
		<input type = "submit" class = "relationButton" name = "relationButton" value ="College"/> 
		<input type = "submit" class = "relationButton" name = "relationButton" value ="Belongs"/> 
		<input type = "submit" class = "relationButton" name = "relationButton" value ="Majors"/> <br>
		<input type = "submit" class = "relationButton" name = "relationButton" value ="Minors"/> 
		<input type = "submit" class = "relationButton" name = "relationButton" value ="Supports"/> 
		<input type = "submit" class = "relationButton" name = "relationButton" value ="Committee"/> 
		<input type = "submit" class = "relationButton" name = "relationButton" value ="SecondarySport"/> 
		<input type = "submit" class = "relationButton" name = "relationButton" value ="StaffBelongs"/> 
	</form>
	</div>

<hr>


	<div id = "Queries" class = "section">

	<h2> Queries </h2>


	<form method = "POST" action = "Queries.php" target = "_blank">
		<input type = "submit" class = "queryButton" name = "queryButton" value ="Return student names and their respective majors and minors."/> <br>
		<input type = "submit" class = "queryButton" name = "queryButton" value ="Return information about faculty and their asssociated department."/> <br>
		<input type = "submit" class = "queryButton" name = "queryButton" value ="Return average graduation year of degree holding graduate students."/> <br>
		<input type = "submit"  class = "queryButton" name = "queryButton" value ="Select the maximum salary of each rank of faculty."/> <br>
		<input type = "submit" class = "queryButton" name = "queryButton" value ="Select all students except those who are seniors."/> <br>
		<input type = "submit" class = "queryButton" name = "queryButton" value ="Return the number of credit courses that have 3 courses offered."/> <br>
		<input type = "submit" class = "queryButton" name = "queryButton" value ="Return the name of instructors who teach multiple sections."/> <br>
		<input type = "submit" class = "queryButton" name = "queryButton" value ="Return the SSN of faculty that taught more than 7 credits."/> <br>
		<input type = "submit" class = "queryButton" name = "queryButton" value ="Return the name of faculty members who chair the computer science department and advise a Grad Student named Ridwan."/> <br>
		<input type = "submit"  class = "queryButton" name = "queryButton" value ="Return professor names in alphabetical order and the number of courses they taught."/> <br> 
	</form>



	</div>
	
	<hr>

	<div id = AdHocSection class = "section">
	<h2 id = "AdHocTitle" class = "title"> Ad-Hoc Query </h2>
	<form action = "runQuery.php" method="post" target = "_blank">
		<strong>Please enter your query below: </strong> <br/> 
		<textarea name="queryBox" rows="20" cols="100" id = "queryBox"></textarea><br/>
		<button class = "textBoxButton" type = "button" onClick="clearTextArea();">Clear</button>
		<input class = "textBoxButton" type = "submit">
	</form>
	</div>

	<hr>





</body>

</html>
