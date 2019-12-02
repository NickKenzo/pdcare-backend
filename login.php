<?php
 
 //Read in post conditions
 $username = $_REQUEST['username'];
 $password = $_REQUEST['password'];
 //$name = $_REQUEST['name'];
 //$email = $_REQUEST['email'];
 $uname = $_REQUEST['uname'];
 $upwd = $_REQUEST['upwd'];
 
 //var_dump($_REQUEST);
// Create connection
$con=mysqli_connect("localhost",$username,$password,"pdcareon_Users");
 
// Check connection
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$sql = "SELECT * from profiles where uname='".$uname."' and upwd='".$upwd."'";
//print $sql;
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
}else{
	echo "Login Failed";
}

// Close connections
mysqli_close($con);



?>