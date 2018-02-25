<?php

include 'connect.php'; 
mysqli_select_db($dbconnect, $database)
   or die('Could not select database');
print 'Selected database successfully!<br>';

$theme = $_REQUEST['theme'];

// Check whether the primary key the user input has already been used
$checksql =  "SELECT * FROM PHOTO where photo_description = '$theme'";
$checkraw = mysqli_query($dbconnect,$checksql);
if(mysqli_num_rows($checkraw) <= 0) {
	print "No photo about $theme exists, no need to delete! ";
}

else {
// Insert the attributes of the user into the database
	$query = "DELETE FROM PHOTO
		WHERE photo_description = '$theme'";
	$result = mysqli_query($dbconnect, $query)
	  or die('Query failed: ' . mysqli_error($dbconnect));

	  $checksql =  "SELECT * FROM PHOTO where photo_description = '$theme'";
	$checkraw = mysqli_query($dbconnect,$checksql);
	if(mysqli_num_rows($checkraw) <= 0) {
	print "Photo about $theme is deleted successfully! ";
}
}



// Closing connection
mysqli_close($dbconnect);


?>

