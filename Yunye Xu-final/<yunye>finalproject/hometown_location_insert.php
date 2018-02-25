

<?php

include 'connect.php'; 
mysqli_select_db($dbconnect, $database)
   or die('Could not select database');
print 'Selected database successfully!<br>';


$location_id = $_REQUEST['Loc_id'];
$hometown_country = $_REQUEST['hometown_country'];
$hometown_state = $_REQUEST['hometown_state'];
$hometown_city = $_REQUEST['hometown_city'];


// Check whether the primary key the user input has already been used
$checksql1 =  "SELECT * FROM LOCATION where Loc_ID = $location_id";
$checkraw1 = mysqli_query($dbconnect,$checksql);
if(mysqli_num_rows($checkraw) > 0) {
	print "hometown location $hometown_city alreay exists, no need to add again! ";
}

else {
// Insert the attributes of the user into the database
	$query = "INSERT INTO LOCATION(Loc_ID, city, state, country)
	              VALUES('$location_id','$hometown_city','$hometown_state','$hometown_country')";
	$result = mysqli_query($dbconnect, $query)
	  or die('Query failed: ' . mysqli_error($dbconnect));

	// $tuple_last = mysqli_fetch_assoc(mysqli_query($dbconnect,"SELECT * FROM LOCATION ORDER BY Loc_id DESC"));
	// if ($tuple_last != false) {
	//      print "City $tuple_last[city] is added into database!";
	//  }
	  $tuple_select = mysqli_fetch_assoc(mysqli_query($dbconnect,"SELECT * FROM LOCATION where city = '$hometown_city'"));
	if ($tuple_select != false) {
	     print "City $hometown_city is added into database!";
	 }
	}


// Get the attributes of the user with the given first name
// $query = "SELECT Firstname,lastname
// FROM HOMETOWN_LOC h
// INNER JOIN USER u
// ON u.user_id = h.user_id
// INNER JOIN LOCATION l
// ON country Like '%$countryName%'
// WHERE h.loc_id = l.loc_id";

// $result = mysqli_query($dbconnect, $query)
//   or die('Query failed: ' . mysqli_error($dbconnect));

// if(empty($result['firstname'])) {
// 	print "No users from $countryName!";
// }

// // while($row = mysqli_fetch_array($result, MYSQLI_BOTH)){
// // 	printf("Firstname: %s  Lastname: %s", $row[0], $row[1]);
// // }
// else {
	// print "Users who come from Country $countryName:<br>";

	// while($tuple = mysqli_fetch_array($result)){
	// 	printf("first_name: [%s]  last_name: [%s] <br>",
	// 	 $tuple['Firstname'], $tuple['Lastname']);
	// }
// $rowcount=mysqli_num_rows($result);
// if($rowcount > 0) {
// 	print "Users who come from Country $countryName:<br>"; 
// 	while($tuple = mysqli_fetch_array($result)) {
// 		print '<li> first_name: '.$tuple['Firstname'];
// 	}
// }
// else {
// 	print "No users coming from country $countryName!<br>";
// }
// // }

// Free result
// mysqli_free_result($result);

// Closing connection
mysqli_close($dbconnect);


?>


<form action="final.html">
    <input type="submit" value="Go back to Main Page">
</form>
