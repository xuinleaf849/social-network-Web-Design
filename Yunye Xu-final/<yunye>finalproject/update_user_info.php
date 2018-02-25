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
if(mysqli_num_rows($checkraw) <= 0) {
	print "User $user_id not found! Please sign in and create one.";
}

else {
// Insert the attributes of the user into the database
	$query = "UPDATE USER SET Firstname='$first_name', Lastname='$last_name', Birthday='$birthday', Gender='$gender' WHERE User_ID = '$user_id'";
	$result = mysqli_query($dbconnect, $query)
	  or die('Query failed: ' . mysqli_error($dbconnect));
	print "User info updated successfully!";
	 }


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
