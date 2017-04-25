use project2;


# THIS QUERY RETURNS STUDENT NAMES AND THEIR MAJORS / MINORS 

select Person.Name, Majors.Dname, Minors.Dname from Majors, Minors, Person
where Majors.SSN = Minors.SSN and Minors.SSN = Person.SSN;



# ** THIS QUERY RETURNS INFORMATION ABOUT FACULTY AND THEIR ASSOCIATED DEPARTMENT **
select Faculty.SSN, Faculty.Rank, Department.Dname  
from Faculty, Department 
where Department.ChairFacultySSN = Faculty.SSN;  


# ** THIS QUERY RETURNS AVERAGE GRADUATION YEAR OF DEGREE HOLDING GRADUATE STUDENTS. **
select AVG(Degrees.Year) from GradStudent, Degrees
where GradStudent.degreeEarned = Degrees.Major;



#**Selects the maximum salary of each rank of faculty. ** 
select max(salary), SSN, rank from faculty 
group by rank;
 
 
 
 # **Select All Students Except Those Who Are Seniors **
select S1.SSN, S1.Class from Student S1
where s1.SSN NOT IN (
select S2.SSN from Student S2
where S2.class = 'Senior'
);



# ** Return Number of Credit Courses that have 3 courses offered. ##
select C.Credit
from Course C
GROUP BY C.Credit
HAVING COUNT(*) = 3;



# ** Return Instructor Names who teach multiple sections. **

select P.Name
from Person P
Where SSN IN(
		select InstructorSSN
		from Section
		GROUP BY InstructorSSN
		HAVING COUNT(distinct SecNum) > 1
		);
        
       
       
#return SSN of faculty that taught more than 7 credits.
Select Name
From Person P
where SSN IN
(
	select S.InstructorSSN
	from Course C, Section S
	where C.SecNum = S.SecNum
	GROUP BY S.InstructorSSN
	HAVING SUM(C.Credit) > 7
);



# ** Returns the name of the faculty member who is the chair of the computer science department and advices a Grad Student named Ridwan. **
select P1.Name
from Person P1, Person P2, Department D, Faculty F, GradStudent G
Where P1.SSN = F.SSN AND D.ChairFacultySSN = F.SSN AND D.Dname = 'Biology' AND 
F.studentAdvisedSSN = G.SSN AND G.SSN = P2.SSN AND P2.Name = 'Ridwan';



# ** Returns the Name of Professor in alphabetical order and the number of courses they taught. **
select P.Name, COUNT(*) AS 'CoursesTaught'
from Faculty F, Section S, Person P
where F.SSN = S.InstructorSSN AND P.SSN = F.SSN
GROUP BY F.SSN, P.Name
ORDER BY P.Name ASC;

