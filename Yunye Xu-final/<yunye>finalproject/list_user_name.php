<?php include 'connect.php'; 

// Selecting a database
//   Unnecessary in this case because we have already selected 
//   the right database with the connect statement.  
mysqli_select_db($dbconnect, $database)
   or die('Could not select database');
print 'Selected database successfully!<br>';

// Listing tables in your database
$query = "SELECT firstname, lastname FROM USER";
$result = mysqli_query($dbconnect, $query)
  or die('Show tables failed: ' . mysqli_error());

print "The first name of all the users in $database database are:<br>";

// Printing table names in HTML

while ($tuple = mysqli_fetch_row($result)) {
   print '<li>'.$tuple[0].'</li>';
}


// Free result
mysqli_free_result($result);

// Closing connection
mysqli_close($dbconnect);
?>