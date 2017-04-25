
use project2;


insert into Person(SSN, Name, Address, Sex, Birthday) values 
('123-456-7890', 'Jermaine', '123 Forest Hills Drive', 'Male', '01-01-1980'), 
('947-940-4920', 'Omer', 'West Bloomfield', 'Male', '01-30-1996'), 
('000-000-0000', 'Ridwan', 'Bloomfield Hills', 'Male', '11-19-1995'), 
('987-654-3210', 'SN', 'West Bloomfield', 'Male', '01-01-1980'), 
('000-000-0001', 'Bukhsh', 'South Beach', 'Male', '01-01-1111'),
('000-000-0002', 'Mike', 'NYC', 'Male', '01-01-1111'),
('000-000-0003', 'Rick', 'Chicago', 'Male', '01-01-1111'),
('000-000-0004', 'Bukhsh', 'San Francisco', 'Male', '01-01-1111');

insert into Staff(SSN) values ('987-654-3210'), ('000-000-0000');

insert into NonAcademicStaff(SSN) values ('987-654-3210'), ('000-000-0000');

insert into AcademicStaff(SSN) values ('987-654-3210'), ('000-000-0000');

 insert into Student (SSN, StudentNum, Class) values ('947-940-4920', 1, 'Junior'),
('000-000-0000', 2, 'Senior'),
  ('000-000-0001', 3, 'Senior'),
   ('000-000-0002', 5, 'Freshman'),
    ('000-000-0003', 4, 'Sophomore');
 

insert into Sport (Coach, OfficeLocation, Name, CoachSSN, StudentSSN) values 
('Ridwan', 'Detroit', 'Basketball', '000-000-0000', '947-940-4920'),
('SN', 'Detroit', 'Hockey', '987-654-3210', '000-000-0000'),
('Mike', 'Detroit', 'Rugby', '987-654-3210', '000-000-0001'),
('Rick', 'Detroit', 'Football', '987-654-3210', '000-000-0002'),
('Chaabi', 'Detroit', 'Soccer', '987-654-3210', '000-000-0003');

insert into Grants (Title, Agency, Number, St_date) values 
('Research Grant', 'EECS Department', 1, '2007-01-03'),
('Research Grant', 'Biology Department', 2, '1995-05-26');


insert into College ( Cname, Dean, Office) values ('Engineering', 'Schweibert', 'Woodward Avenue'), 
('Liberal Arts', 'Smith', 'Woodward'), 
('Education', 'Khan', 'Cass');

insert into Degrees (University, Year, Major) values ('Wayne State', 2018, 'Computer Science'),
('UMich', 2014, 'Biology'),
('Wayne State', 2012, 'Math'),
('Harvard', 2015, 'Physics');

insert into GradStudent (SSN, StudentNum, degreeEarned) values ( '947-940-4920', 1, 'Computer Science'),
( '000-000-0000', 2, 'Biology'),
( '000-000-0001', 1, 'Math'),
( '000-000-0002', 3, 'Physics');

insert into Faculty (Fphone, Rank, Foffice, Salary, SSN) values 
('123456789', 'Associate', '2', 102000, '000-000-0001'),
('123456789', 'Senior', '2', 175000, '123-456-7890'),
('123456789', 'Associate', '2', 65000, '000-000-0003');

insert into Faculty (Fphone, Rank, Foffice, Salary, SSN, grantNum, studentAdvisedSSN) values 
('123456789', 'Senior', '1', 95000,  '000-000-0002', 1, '000-000-0000');

insert into Instructor_Researcher(SSN, StudentNum) values ('000-000-0001', 1), ('123-456-7890', 2);

insert into Section (SecNum, Year, Semester, InstructorSSN) values (001, 2015, 'Spring', '000-000-0001'), 
(002, 2013, 'Fall', '123-456-7890'),
(003, 2014, 'Winter', '123-456-7890');

insert into Course (Cnum, Cname, cdescription, Level, Credit, Cdept, SecNum) values 
(2200, 'Data Structures', 'Computer Science course.', 'Junior', 4, 'Computer Science', 001),
(1100, 'Life Science', 'Biology Course', 'Freshman', 4, 'Biology', 002),
(3750, 'WebTech', 'Computer Science Course', 'Junior', 3, 'Computer Science', 001),
(1500, 'Cell Bio', 'Biology Course', 'Sophomore', 4, 'Biology',  002);

insert into Department (isAdmin, Dname, Dcode, Doffice, Dphone,  chairFacultySSN, NonAcademicStaffSSN, courseOffered) values 
(True, 'Computer Science', '1', 'Woodward', '1234567890',  '123-456-7890', '987-654-3210', 2200), 
(True, 'Elementary ', '2', 'Woodward', '1234567890',  '000-000-0001', '000-000-0000', 1100),
(True, 'Biology', '3', 'Woodward', '1234567890',  '000-000-0002', '000-000-0000', 1100); 

insert into Belongs (SSN, Dname, Dcode) values ('123-456-7890', 'Computer Science', '1'),
('000-000-0001', 'Biology', '2');

insert into Majors (SSN, StudentNum, Dname, Dcode) values ('000-000-0001', 1, 'Computer Science', '1'),
 ('000-000-0002', 2, 'Biology', '2');
 insert into Minors (SSN, StudentNum, Dname, Dcode) values ('000-000-0001', 1, 'Biology', '2'),
 ('000-000-0002', 2, 'Computer Science', '1');
 
insert into Supports(GrantNumber, InstructorSSN) values (2, '000-000-0001'), (1, '123-456-7890'); 

insert into Committee (FacultySSN, StudentSSN, StudentNum) values ('947-940-4920', '000-000-0000',1);

insert into SecondarySport (SportName, StudentNum, SSN) values ('Basketball', 1, 1);

insert into StaffBelongs (SSN, Dname) values ('987-654-3210', 'Computer Science');


