<?php
 
// Create connection
$con=mysqli_connect("localhost","pdcareon_admin","pdcareadmin","pdcareon_Users");
 
 
 $username = $_REQUEST['username'];
 $password = $_REQUEST['password'];
 $uname = $_REQUEST['uname'];
 $game = $_REQUEST['game'];
 
// Check connection
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


$selectsql = "select uid from profiles where uname='".$uname."';";

if ($result = mysqli_query($con, $selectsql))
{
    //print("there is a result");
    $row = $result->fetch_row();
	$uid = $row[0];
}else{
    echo "There is no user with that name";
    exit();
}

 
// This SQL statement selects ALL from the table 'Locations'
$sql = "SELECT * FROM scores where uid=".$uid." and game=".$game." order by date desc";
 
// Check if there are results
if ($result = mysqli_query($con, $sql))
{
 // If so, then create a results array and a temporary one
 // to hold the data
 $resultArray = array();
 $tempArray = array();
 
 // Loop through each row in the result set
 while($row = $result->fetch_object())
 {
 // Add each row into our results array
 $tempArray = $row;
     array_push($resultArray, $tempArray);
 }
 
 // Finally, encode the array to JSON and output the results
 echo json_encode($resultArray);
}
 
// Close connections
mysqli_close($con);
?>