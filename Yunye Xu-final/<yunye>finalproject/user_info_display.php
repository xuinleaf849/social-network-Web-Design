<html>
<body>
<p>
    You can get detailed information of a user by entering the user's first name.

</p>
<form method=post action="">
    <p>
        Tell me who you want to learn about:'
    </p>
    <input type="text" name="first_name"><br>
    <input type="submit" value="Search!">
</form>

<br>
<?php
include 'connect.php'; 
mysqli_select_db($dbconnect, $database)
   or die('Could not select database');
print 'Selected database successfully!<br>';

// Getting the input parameter (user):
$user = $_REQUEST['first_name'];

// Get the attributes of the user with the given first name
$query = "SELECT * FROM USER WHERE Firstname = '$user'";
$result = mysqli_query($dbconnect, $query)
  or die('Query failed: ' . mysqli_error($dbconnect));

// Can also check that there is only one tuple in the result
$tuple = mysqli_fetch_array($result, MYSQLI_ASSOC)
  or die("User $user not found!");

print "User $user's information:";

// Printing user attributes in HTML
print '<ul>';  
print '<li> user_ID: '.$tuple['User_ID'];
print '<li> first_name: '.$tuple['Firstname'];
print '<li> last_name: '.$tuple['Lastname'];
print '<li> birthday: '.$tuple['Birthday'];
print '<li> gender: '.$tuple['Gender'];
print '</ul>';

// Free result
mysqli_free_result($result);

// Closing connection
mysqli_close($dbconnect);
?> 
<!-- Discussed about the function with Zhenghong Zhang -->
<script type="text/javascript">
    function goBack() {
        window.history.back()
    }
</script>
<!-- <a href="final.html">Go back to Main Page -->
<form action="final.html">
    <input type="submit" value="Go back to Main Page">
</form>
</a>
</body>
</html>