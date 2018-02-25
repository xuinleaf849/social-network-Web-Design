<?php

include 'connect.php'; 

mysqli_select_db($dbconnect, $database)
   or die('Could not select database');
print 'Selected database successfully!<br>';

$degree = $_REQUEST['user_degree'];


$query = "select count(*)
from EDUCATION
where degree LIKE '%$degree%'";

$result = mysqli_query($dbconnect, $query)
  or die('Query failed: ' . mysqli_error($dbconnect));


$tuple = mysqli_fetch_array($result, MYSQLI_BOTH)
  or die("users with $degree degree not found!");

print "Number of users with $degree degree:";

print '<ul>';  
print '<li> number_of_users: '.$tuple[0];
print '</ul>';

// Free result
mysqli_free_result($result);

// Closing connection
mysqli_close($dbconnect);
?> 