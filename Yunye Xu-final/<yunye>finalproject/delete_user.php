<?php

include 'connect.php'; 
mysqli_select_db($dbconnect, $database)
   or die('Could not select database');
print 'Selected database successfully!<br>';

$user_id = $_REQUEST['user_id'];

// Check whether the primary key the user input has already been used
$checksql =  "SELECT * FROM USER where user_ID = '$user_id'";
$checkraw = mysqli_query($dbconnect,$checksql);
if(mysqli_num_rows($checkraw) <= 0) {
	print "No user '$user_id'exists, no need to delete! ";
}

else {
// Insert the attributes of the user into the database
	$query = "DELETE FROM USER
		WHERE user_ID = '$user_id'";
	$result = mysqli_query($dbconnect, $query)
	  or die('Query failed: ' . mysqli_error($dbconnect));

	  $checksql =  "SELECT * FROM USER
		WHERE user_ID = '$user_id'";
	$checkraw = mysqli_query($dbconnect,$checksql);
	if(mysqli_num_rows($checkraw) <= 0) {
	print "user info with ID $user_id is deleted successfully! ";
	}
}



// Closing connection
mysqli_close($dbconnect);


?>
