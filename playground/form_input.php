<?
//the example of inserting data with variable from HTML form
//input.php
mysql_connect("mysql.x90x.net","u629617278_bus","q1w2e3");//database connection
mysql_select_db("bus");

//inserting data order
$order = "INSERT INTO test
			(name, address)
			VALUES
			('$name',
			'$address')";

//declare in the order variable
$result = mysql_query($order);	//order executes
if($result){
	echo("<br>Input data is succeed");
} else{
	echo("<br>Input data is fail");
}
?>