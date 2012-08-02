<?php
mysql_connect("mysql.x90x.net", "u629617278_bus", "q1w2e3") or die(mysql_error());
echo "Connected to MySQL<br />";
mysql_select_db("test") or die(mysql_error());
echo "Connected to Database";

// Create a MySQL table in the selected database
mysql_query("CREATE TABLE example(
id INT NOT NULL AUTO_INCREMENT, 
PRIMARY KEY(id),
 name VARCHAR(30), 
 age INT)")
 or die(mysql_error());  

echo "Table Created!";

// Insert a row of information into the table "example"
mysql_query("INSERT INTO example 
(name, age) VALUES('Timmy Mellowman', '23' ) ") 
or die(mysql_error());  

mysql_query("INSERT INTO example 
(name, age) VALUES('Sandy Smith', '21' ) ") 
or die(mysql_error());  

mysql_query("INSERT INTO example 
(name, age) VALUES('Bobby Wallace', '15' ) ") 
or die(mysql_error());  

echo "Data Inserted!";
?>