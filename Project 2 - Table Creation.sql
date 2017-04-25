use project2;

drop table if exists StaffBelongs;
drop table if exists SecondarySport;
drop table if exists Committee;
drop table if exists Supports;
drop table if exists Majors;
drop table if exists Minors;
drop table if exists Department;
drop table if exists College;
drop table if exists Course;
drop table if exists Section;
drop table if exists Instructor_Researcher;
drop table if exists Faculty;
drop table if exists GradStudent;
drop table if exists Degrees;
drop table if exists Grants;
drop table if exists Sport;
drop table if exists Student;
drop table if exists NonAcademicStaff;
drop table if exists AcademicStaff;
drop table if exists Staff;
drop table if exists Person;
drop table if exists Belongs;



create table Person (
SSN char(20), 
Name char (20), 
Address char (40), 
Sex char (5), 
Birthday char (30),
Primary Key(SSN)
);

create table Staff(
SSN char(20),
primary key (SSN),
foreign key (SSN) references Person(SSN) #isA Person.
);



create table NonAcademicStaff 
(
SSN char(20), 
Primary Key (SSN),
Foreign Key (SSN) references Staff (SSN) #isA Staff.
);

create table AcademicStaff 
(
SSN char(20), 
Primary Key (SSN),
Foreign Key (SSN) references Staff (SSN) #isA Staff.
);

 create table Student (
 SSN char(20), 
 StudentNum int, 
 Class char(20), 
 Primary Key (SSN, StudentNum),
 Foreign Key (SSN) references Person(SSN)
 );

create table Sport (
Coach char(20), 
OfficeLocation char(20), 
Name char(20), 
CoachSSN char(20), #Coaches
StudentSSN char(20), #Primary Sport
Primary Key (Name),
Foreign Key (CoachSSN) references NonAcademicStaff(SSN), #refers to the non-academic staff which coaches it. 
Foreign Key (StudentSSN) references Student(SSN)  
); 

create table Grants(
Title char(20), 
Agency char(20), 
Number int, 
St_date date, 
Primary Key (Number)
);

create table Degrees (
University char(20), 
Year int, 
Major char(20),
Primary Key(Major)
);

create table GradStudent(
SSN char(20), 
StudentNum int, 
degreeEarned char(20), #refers to the undergraduate degree they earned.
Primary Key (SSN, StudentNum),
Foreign Key (SSN) references Student (SSN),
Foreign Key (degreeEarned) references Degrees(Major)
);

create table Faculty(
Fphone char(11), 
Rank char(20),
Foffice int, 
Salary float,  
SSN char(20),
grantNum int, #references grant which supports them.
studentAdvisedSSN char(20),  # references Grad Student Faculty Advises.
primary key(SSN),
foreign key (SSN) references Person(SSN),  # faculty isA person.
foreign key (grantNum) references Grants (Number),  
foreign key (studentAdvisedSSN) references GradStudent(SSN)
);

create table Instructor_Researcher(
SSN char(20),
StudentNum int,
primary key (SSN),
Foreign Key (SSN) references Faculty(SSN) #Instructor_Researcher isA Faculty.
#Foreign Key (SSN) references GradStudent(SSN)
);

create table Section(
SecNum int,
 Year int, 
 Semester char(10), 
 Instructor char(20), 
 InstructorSSN char(20),  #refers to the instructor who teachers course.
 Primary Key(SecNum),
 Foreign Key (InstructorSSN) references Instructor_Researcher(SSN)
 ); 


create table Course (
Cnum int, 
Cname char(20), 
Cdescription char(30), 
Level char(20), 
Credit int, 
Cdept char(20), 
SecNum int, # refers to the section of the course.
Primary Key (Cnum),
Foreign Key (SecNum) references Section(SecNum)
);
 
  create table Department(
 isAdmin char(20),
 Dname char(20), 
 Dcode char(20), 
 Doffice char(20), 
 Dphone char(11),  
 ChairFacultySSN char(20),
 NonAcademicStaffSSN char(20), #Refers to the non-academic staff member who leads leads the department.
 courseOffered int, #refers to the course offered by the department.
 chairSSN char(20), #refers to the chair of the department.
 Primary Key(Dname, Dcode),
 Foreign Key (NonAcademicStaffSSN) references NonAcademicStaff(SSN),
 Foreign Key (courseOffered) references course(cnum),
 Foreign Key (chairSSN) references Faculty (SSN)
 );

 create table College (
 Cname char(20), 
 Dean char(20), 
 Office char(20),
 Primary Key (Cname)
 #foreign Key (Dean) references Department(isAdmin)
 # We had an a foreign constraint error on this despite being the same data type, and making sure it was a primary key in the previously defined table.
 );









 
create table Belongs (
SSN char(20), 
Dname char(20), 
Dcode char(20),
Primary Key (SSN, Dname, Dcode) #Primary keys from faculty and department.
);



create table Majors (
SSN char(20),  
StudentNum int, 
Dname char(20), 
Dcode char(20),
Primary Key (SSN, StudentNum, Dname, Dcode) #Primary keys from student and dept.
);

create table Minors(
SSN char(20),  
StudentNum int, 
Dname char(20), 
Dcode char(20),
Primary Key (SSN, StudentNum, Dname, Dcode)#Primary keys from student and dept.
);





create table Supports (
GrantNumber int, 
InstructorSSN char(20),
primary key (GrantNumber, InstructorSSN) #primary keys from grant, and instructor_researcher.
);






create table Committee (
FacultySSN char(20), 
StudentNum int,
studentSSN char(20),
Primary Key (FacultySSN, studentSSN, StudentNum) # Primary keys from grad student and faculty.
);



create table SecondarySport (
SportName char(20), 
StudentNum int, 
SSN char(20),
Primary Key (SSN,SportName) #Primary keys from student and Sport.
);



create table StaffBelongs (
SSN char(20), 
Dname char(20),
Primary Key (Dname, SSN) # Primary keys from academic staff and dept.
);






