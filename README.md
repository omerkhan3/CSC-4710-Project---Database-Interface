# CSC-4710-Project---Database-Interface
A webpage created with the WAMP (Windows, Apache, MySQL, PHP) stack designed to act as a web interface to manage a MySQL database.  Allows users to view existing relations, use existing queries, or make queries of their choosing with an Ad-Hoc form.  Created as final project for CSC 4710 - Database Design.   Database was created based on requirements provided by instructor.


Instructions to Set Up/Test:

1.  Install EasyPHP..
2.  Start HTTP Server and Database Server from Dashboard.  Make sure local MySQL service is not running.
3.  Make sure the directory in the dashboard points to our folder.  For us, we simply used the eds-www folder.
4.  Under databases, create one called project2.  
5.  Once configured, go to 127.0.0.1 to access index.php.  We made all of our changes via the local files in our text editor. 
6.  Ad-hoc queries correspond to 'runQuery.php', relations correspond to 'Relations.php', the queries correspond 'Queries.php', and Populate/Clear database correspond to "populationButtons.php".  Each of those PHP files handle the POST requests of the respective buttons.
7.  'project4.css' corresponds to the style changes.
8.  To test, you can run the any of the buttons or the ad-hoc queries and the proper results will display on a new tab.  Each heading will also contain the data type of the column.
9. You can also test the Clear/Populate database, and can run the queries again to observe the results to be empty/showing respectively.
