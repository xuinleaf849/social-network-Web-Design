<?php
//Connect to Database
$host = 'mpcs53001.cs.uchicago.edu';
$username = 'yunye';
$password = 'jqbjzqbx5xyy';
$database = $username.'DB';

//Create mysqli Object
$dbconnect = mysqli_connect($host, $username, $password, $database)
	or die('Could not connect: ' . mysqli_connect_error());
print 'Connected successfully!<br>';

?>