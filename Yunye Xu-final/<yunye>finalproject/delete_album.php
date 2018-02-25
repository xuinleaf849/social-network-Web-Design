<?php

include 'connect.php'; 
mysqli_select_db($dbconnect, $database)
   or die('Could not select database');
print 'Selected database successfully!<br>';

$album_id = $_REQUEST['album_id'];

// Check whether the primary key the user input has already been used
$checksql =  "SELECT * FROM ALBUM where Album_ID = '$album_id'";
$checkraw = mysqli_query($dbconnect,$checksql);
if(mysqli_num_rows($checkraw) <= 0) {
	print "No album exists, no need to delete! ";
}

else {
// Insert the attributes of the user into the database
	$query = "DELETE FROM ALBUM
		WHERE Album_ID = '$album_id'";
	$result = mysqli_query($dbconnect, $query)
	  or die('Query failed: ' . mysqli_error($dbconnect));

	  $checksql =  "SELECT * FROM COVER_album
		WHERE Album_ID = '$album_id'";
	$checkraw = mysqli_query($dbconnect,$checksql);
	if(mysqli_num_rows($checkraw) <= 0) {
	print "Album with ID $album_id is deleted successfully! ";
	}
}



// Closing connection
mysqli_close($dbconnect);


?>
