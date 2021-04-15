In this repository, you can find my solutions for Tasks 1, 2, 3.
Each solution has its folder with all the necessary files in it.


To run each solution locally :
	1.	download the repository (Magebit_Rinards);
	2.	add the repository to the root folder of the local server (htdocs or www);
After doing so start your local server and enter the following URL:

For task 1: http://localhost:PORT*/Magebit_Rinards/TASK_1/
For task 2: http://localhost:PORT*/Magebit_Rinards/TASK_2/
For task 3: http://localhost:PORT*/Magebit_Rinards/TASK_3/ and http://localhost:PORT*/Magebit_Rinards/TASK_3/table.php to view database table.

*After "localhost" you should also include the port number that is used by the local server e.g. http://localhost:8888/Magebit_Rinards/TASK_1/ 

To run 3rd solution:
	1.	Create a new database in phpMyAdmin.

	2.	Create table with the following SQL query:
		CREATE TABLE `<database name>`.`Emails` ( `ID` INT NOT NULL AUTO_INCREMENT , `Email` VARCHAR(100) NOT NULL , `Provider` VARCHAR(100)NOT NULL , `Date` DATETIME NOT NULL , PRIMARY KEY (`ID`));

	3.	In the file "TASK_3/php/classes/dbh.class.php" if necessary change user ($user), password ($pwd), and database name ($dbName) parameters. Make sure that the user has permissions to insert, select and delete.



Hope you like my solutions!
In any case I would love to hear your feedback to improve.
Thank you for your time!
Rinards Košaks
