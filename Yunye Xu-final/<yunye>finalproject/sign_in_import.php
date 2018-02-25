<?php
include 'connect.php'; 
mysqli_select_db($dbconnect, $database)
   or die('Could not select database');
print 'Selected database successfully!<br>';

$user_id = $_REQUEST['user_id'];
$first_name = $_REQUEST['first_name'];
$last_name = $_REQUEST['last_name'];
$birthday = $_REQUEST['birthday'];
$gender = $_REQUEST['gender'];

// Check whether the primary key the user input has already been used
$checksql =  "SELECT * FROM USER where User_id = '$user_id'";
$checkraw = mysqli_query($dbconnect,$checksql);
if(mysqli_num_rows($checkraw) > 0) {
	print "User ID $user_id has alreay been used! Please change one.";
}

else {
// Insert the attributes of the user into the database
	$query = "INSERT INTO USER(User_ID, Firstname, Lastname, Birthday, Gender)
	              VALUES('$user_id','$first_name','$last_name','$birthday','$gender')";
	$result = mysqli_query($dbconnect, $query)
	  or die('Query failed: ' . mysqli_error($dbconnect));
	$tuple_select = mysqli_fetch_assoc(mysqli_query($dbconnect,"SELECT * FROM USER where User_ID = '$user_id'"));
	if ($tuple_select != false) {
	     print "User $first_name has been created successfully!";
	 }
	}

// Closing connection
mysqli_close($dbconnect);
?> 
<!-- Discussed about the function with Zhenghong Zhang -->
<!-- <script type="text/javascript">
    function goBack() {
        window.history.back()
    }
</script> -->
<!-- <a href="final.html">Go back to Main Page -->
<form action="final.html">
    <input type="submit" value="Go back to Main Page">
</form>
