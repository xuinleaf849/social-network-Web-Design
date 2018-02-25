

<?php

include 'connect.php'; 
mysqli_select_db($dbconnect, $database)
   or die('Could not select database');
print 'Selected database successfully!<br>';


$location_id = $_REQUEST['Loc_id'];
$current_country = $_REQUEST['current_country'];
$current_state = $_REQUEST['current_state'];
$current_city = $_REQUEST['current_city'];


// Check whether the primary key the user input has already been used
$checksql1 =  "SELECT * FROM LOCATION where Loc_ID = $location_id";
$checkraw1 = mysqli_query($dbconnect,$checksql);
if(mysqli_num_rows($checkraw) > 0) {
	print "current location $current_city alreay exists, no need to add again! ";
}

else {
// Insert the attributes of the user into the database
	$query = "INSERT INTO LOCATION(Loc_ID, city, state, country)
	              VALUES('$location_id','$current_city','$current_state','$current_country')";
	$result = mysqli_query($dbconnect, $query)
	  or die('Query failed: ' . mysqli_error($dbconnect));

	// $tuple_last = mysqli_fetch_assoc(mysqli_query($dbconnect,"SELECT * FROM LOCATION ORDER BY Loc_id DESC"));
	// if ($tuple_last != false) {
	//      print "City $tuple_last[city] is added into database!";
	//  }
	  $tuple_select = mysqli_fetch_assoc(mysqli_query($dbconnect,"SELECT * FROM LOCATION where city = '$current_city'"));
	if ($tuple_select != false) {
	     print "City $current_city is added into database!";
	 }
	}



// Closing connection
mysqli_close($dbconnect);


?>


<form action="final.html">
    <input type="submit" value="Go back to Main Page">
</form>
