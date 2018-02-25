<?php

include 'connect.php'; 
mysqli_select_db($dbconnect, $database)
   or die('Could not select database');
print 'Selected database successfully!<br>';

$photo_id = $_REQUEST['photo_id'];

// Check whether the primary key the user input has already been used
$checksql =  "SELECT * FROM PHOTO where photo_id = '$photo_id'";
$checkraw = mysqli_query($dbconnect,$checksql);
if(mysqli_num_rows($checkraw) <= 0) {
	print "No cover photo exists, no need to delete! ";
}

else {
// Insert the attributes of the user into the database
	$query = "DELETE FROM COVER_PHOTO
		WHERE photo_id = '$photo_id'";
	$result = mysqli_query($dbconnect, $query)
	  or die('Query failed: ' . mysqli_error($dbconnect));

	  $checksql =  "SELECT * FROM COVER_PHOTO
		WHERE photo_id = '$photo_id'";
	$checkraw = mysqli_query($dbconnect,$checksql);
	if(mysqli_num_rows($checkraw) <= 0) {
	print "Cover photo with ID $photo_id is deleted successfully! ";
	}
}



// Closing connection
mysqli_close($dbconnect);


?>
